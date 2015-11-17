$(document).ready(function () {
    var windowHeight = $(window).height() - 200;
    function resizeTop () {
        $(".top-banner").css({
            "height": windowHeight
        });
        $(".top-banner h3").css({
            "position": "relative",
            "top": (windowHeight-200)/2
        })
    }
    $(window).resize(function () {
        resizeTop();
    });
    resizeTop();

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
            console.log(projectid)
        });

        $('.admin-panel .status').change(function (){
            var $this = $(this);
            status = $this.find('select').val();
            console.log(status);
        });

        $('.admin-panel .country').change(function (){
            var $this = $(this);
            country = $this.find('select').val();
            console.log(country);
        });

    /**
     * Query Respondents Data
     */
    $("#submitlink").click(function () {
        var url;
        if (projectid !== "null" && status !== "null" && country !== "null") {
            url = "http://dashboard.i-apaconline.com/adminpanel/projects/"+projectid+'/'+status+'/'+country;
            console.log(url);
        } else {
            if (projectid === "null") {
                alert("Please select project id !")
            } else if (country === "null") {
                alert("Please select country !")
            } else if (status === "null") {
                alert("Please select status !")
            }
            return;
        }

        /**
         * Send the database query via Ajax and get JSON results
         */

        $.ajax(url,{
            dataType: 'json'
        }).done(function (data) {
            console.log(data);
            $(".resp-data-lists").remove();
            for (var i = 0; i < data.length; i++) {
                $(".resp-data table tbody").append(
                    "<tr class='resp-data-lists'>" +
                    "<td><input type='checkbox' value='"+ data[i].respid +"'></td>" +
                    "<td>"+data[i].respid+"</td>" +
                    "<td>"+data[i].projectid+"</td>" +
                    "<td>"+data[i].Languageid+"</td>" +
                    "<td>"+data[i].status+"</td>" +
                    "<td>"+data[i].enddate+"</td>" +
                    "</tr>"
                )
            }
        })
    })

});