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
});