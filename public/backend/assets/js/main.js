$.noConflict();

jQuery(document).ready(function ($) {
    "use strict";

    [].slice
        .call(document.querySelectorAll("select.cs-select"))
        .forEach(function (el) {
            new SelectFx(el);
        });

    jQuery(".selectpicker").selectpicker;

    $("#menuToggle").on("click", function (event) {
        $("body").toggleClass("open");
    });

    $(".search-trigger").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(".search-trigger").parent(".header-left").addClass("open");
    });

    $(".search-close").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(".search-trigger").parent(".header-left").removeClass("open");
    });

    // $('.user-area> a').on('click', function(event) {
    // 	event.preventDefault();
    // 	event.stopPropagation();
    // 	$('.user-menu').parent().removeClass('open');
    // 	$('.user-menu').parent().toggleClass('open');
    // });
    $("#select-all").click(function () {
        // Get the current state of the "Select All" checkbox
        const selectAllChecked = $(this).prop("checked");

        // Set all other checkboxes to the same state as the "Select All" checkbox
        $(".checkbox-item").prop("checked", selectAllChecked);
    });

    // When any other checkbox is clicked
    $(".checkbox-item").click(function () {
        // Check if all checkboxes are checked and update the "Select All" checkbox accordingly
        const allCheckboxesChecked =
            $(".checkbox-item").length === $(".checkbox-item:checked").length;
        $("#select-all").prop("checked", allCheckboxesChecked);
    });
});

function permissionShow(param, id) {
    var permission = document.getElementById("permission" + id);
    var showPerIcon = document.getElementById("showPerIcon" + id);
    var hidePerIcon = document.getElementById("hidePerIcon" + id);
    if (param === "show") {
        //console.log("#permission" + id);
        permission.classList.remove("hidden");
        showPerIcon.classList.add("hidden");
        hidePerIcon.classList.remove("hidden");
    } else {
        permission.classList.add("hidden");
        showPerIcon.classList.remove("hidden");
        hidePerIcon.classList.add("hidden");
    }
}


$("#chooseFile").on("change", function() {
    var filename = this.value.split("\\").pop();
    $(".file-upload").toggleClass("active", !!filename);
    $("#noFile").text(filename || "No file chosen...");
});


$("#favicon").on("change", function() {
    var filename = this.value.split("\\").pop();
    $(".favicon-upload").toggleClass("active", !!filename);
    $("#noFiles").text(filename || "No file chosen...");
});


var close = document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".alert-dismissible").style.display = "none";
});



