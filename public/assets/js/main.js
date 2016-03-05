$(document).ready(function () {

    /**
     * Utilities for using in various methods
     * Modal
     */

    //Show Modal form
    function showModal (classname,msg) {
        var elem = $(classname);
        elem.find(".modal-body p").remove();
        elem.find(".modal-body").append(
            "<p>"+msg+"</p>"
        )
    }

    /**----------------------------------
     * Tabs Switching
     */
    $(".nav-tabs a").click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    /**
     * Filter results by country
     * Count the number of rows displayed
     */
    function displayRowsCount (value) {
        if (value != "0") {
            var visible_rows = $("#results-body").find("tr").filter(':visible').length;
            $("p span").remove();
            $(".total-count p").append("<span class='label label-primary'>"+visible_rows+"</span>");
        } else {
            var all_rows = $("#results-body").find("tr").length;
            $("p span").remove();
            $(".total-count p").append("<span class='label label-primary'>"+all_rows+"</span>");
        }
    }

    //Displaying Rows Count
    displayRowsCount();

    $("#country").change(function () {
        var $this = $(this);
        var value = $this.val();
        var rows = $("#results-body").find("tr");

        //Show Rows If Value is 0
        if (value === "0" || value === "") {
            rows.fadeIn();
            displayRowsCount("0");
            return;
        }

        //Hide All Rows
        rows.hide();

        //Filter recursively to check if the value of the select dropdown exists in any table
        //And display those that contains.
        rows.filter(function () {
            var t = $(this);
            return t.text().indexOf(value) > -1;
        }).fadeIn();

        displayRowsCount();

    });

    /*-------------------------------------------------------
     *  Admin Menu
     */
    var projectid,status,country;

    projectid = $(".projectid select").val();
    status = $(".status select").val();
    country = $(".country select").val();

    $('.admin-panel .projectid').change(function (){
        var $this = $(this);
        projectid = $this.find('select').val();
    });

    $('.admin-panel .status').change(function (){
        var $this = $(this);
        status = $this.find('select').val();
    });

    $('.admin-panel .country').change(function (){
        var $this = $(this);
        country = $this.find('select').val();
    });

    /**-------------------
     * REPL time for respondents list and data
     */

    // Make URL to send request through
    function makeUrl () {
        var url;
        if (projectid !== "null" && status !== "null" && country !== "null") {
            url = "http://"+location.host+"/adminpanel/projects/"+projectid+'/'+status+'/'+country;
        } else {
            if (projectid === "null") {
                alert("Please select project id !")
            } else if (country === "null") {
                alert("Please select country !")
            } else if (status === "null") {
                alert("Please select status !")
            }
        }
        return url;
    }

    //Populate HTML table
    function populateHtml(data) {
        $(".resp-data-lists").remove();
        $(".empty-data").remove();
        for (var i = 0; i < data.length; i++) {
            $(".resp-data table tbody").append(
                "<tr class='resp-data-lists'>" +
                "<td><input type='checkbox' class='checkbox' value='" + data[i].respid + "'></td>" +
                "<td>" + data[i].respid + "</td>" +
                "<td>" + data[i].projectid + "</td>" +
                "<td>" + data[i].Languageid + "</td>" +
                "<td>" + data[i].status + "</td>" +
                "<td>" + data[i].enddate + "</td>" +
                "</tr>"
            )
        }
    }

    $("#submitlink").click(function () {
        //Empty the check value data
        check_value = [];
        makeDeleteButton(check_value);
        //Get URL
        var url = makeUrl();
        //Send the database query via Ajax and get JSON results
        $.ajax(url,{
            dataType: 'json'
        }).done(function (data) {
            if (data.length > 0) {
                $("#misentry").remove();
                populateHtml(data);
            } else {
                $(".resp-data-lists").remove();
                $(".empty-data").remove();
                $("#misentry").remove();
                $(".resp-data table").after(
                    "<div class='alert alert-danger fade in' id='misentry' data-dismiss='alert'>Hey yo!! Somethings wrong, either the data is empty or you have selected the wrong query</div>"
                )
            }
        })
    });

    /**---------------------------------------------------
     * Delete Items from database
     */

    //Create a array to hold the array of items
    var check_value = [];
    //Add/Remove items from the array on click
    $(document).on("click", ".checkbox", function () {
        var $this = $(this);
        var val = $this.val();
        if ($this.prop("checked")) {
            $this.parents(".resp-data-lists").css("background","#ff9999");
            if ($.inArray(val,check_value) === -1) {
                check_value.push(val);
            }
        } else {
            $this.parents(".resp-data-lists").css("background","transparent");
            if ($.inArray(val,check_value) > -1) {
                var index = $.inArray(val,check_value);
                check_value.splice(index,1);
            }
        }
        //Make the Delete Button
        makeDeleteButton(check_value);
    });

    //Hide the button by default on load
    $(".delete").hide();
    //The make delete button function
    function makeDeleteButton (check_value) {
        var elem = $(".delete");
        if (check_value.length > 0) {
            var count = check_value.length;
            elem.show();
            $(".badge").remove();
            elem.prepend(
                "<span class='badge'>" + count + "</span>"
            );
        } else {
            elem.hide();
        }
    }


    //Delete the list/lists on click
    $(document).on("click", ".delete", deleteItem);

    function deleteItem () {
        //Message for modal
        var msg = "You are about to delete "+check_value.length+" items.";
        showModal(".delete-modal",msg);
    }

    $(document).on('click', '.delete-modal .yes', function () {
        //
        var url = "http://"+location.host+"/adminpanel/projects/delete";
        //Get the CSRF token for POST method authentication
        var token = $("meta[name='token']").attr("content");
        //JSONify the data
        var data = JSON.stringify(check_value);
        console.log(data);
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': token
            }
        }).done(function (data) {
            console.log(data);
            if (data > 0) {
                $(".resp-data").before(function () {
                    //Check and remove alert element if any is there
                    $('.alert').remove();
                    //Re-add the alert element with new data
                    return "<div class='alert alert-success fade in' role='alert' data-dismiss='alert'><i class='iapac iapac-info-circle'></i> Selected record successfully deleted.</div>";
                });
                //Get the URL back
                var url = makeUrl();
                //AJAX through the respondent data
                $.ajax({
                    url: url,
                    dataType: 'json'
                }).done(function (data) {
                    //Populate HTML table
                    populateHtml(data);
                })
            } else {
                $(".resp-data").before(function () {
                    //Check and remove alert element if any is there
                    $('.alert').remove();
                    //Re-add the alert element with new data
                    return "<div class='alert alert-danger fade in' role='alert' data-dismiss='alert'><i class='iapac iapac-times-circle'></i> Something is wrong. Nothing deleted</div>";
                })
            }
        });
        check_value = [];
        makeDeleteButton(check_value);
    })
});