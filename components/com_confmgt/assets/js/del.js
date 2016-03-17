
jQuery(document).on("click", "[data-toggle=\"confirm\"]", function (e) {
    e.preventDefault();
    var lHref = jQuery(this).attr('href');
    var lText = this.attributes.getNamedItem("data-title") ? this.attributes.getNamedItem("data-title").value : "Are you sure?"; // If data-title is not set use default text
    bootbox.confirm(lText, function (confirmed) {
        if (confirmed) {
            //window.location.replace(lHref); // similar behavior as an HTTP redirect (DOESN'T increment browser history)
            window.location.href = lHref; // similar behavior as clicking on a link (Increments browser history)
        }
    });
});