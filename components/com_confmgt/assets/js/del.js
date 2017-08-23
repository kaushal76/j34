
jQuery(document).on("click", "[data-toggle=\"confirm\"]", function (e) {
    e.preventDefault();
    var lHref = jQuery(this).attr('href');
    var lText = this.attributes.getNamedItem("data-title") ? this.attributes.getNamedItem("data-title").value : "Are you sure?"; // If data-title is not set use default text
    var lHeader = this.attributes.getNamedItem("data-header").value;
    bootbox.dialog(lText, [{
        "label" : "Cancel",
        "class" : "btn-success",
        "callback": function() {
        }
    }, {
        "label" : "Delete",
        "class" : "btn-danger",
        "callback": function() {
            redirect(lHref);
        }
    }],{"header":lHeader});

    function redirect (url) {
        var ua        = navigator.userAgent.toLowerCase(),
            isIE      = ua.indexOf('msie') !== -1,
            version   = parseInt(ua.substr(4, 2), 10);

        // Internet Explorer 8 and lower
        if (isIE && version < 9) {
            var link = document.createElement('a');
            link.href = url;
            document.body.appendChild(link);
            link.click();
        }

        // All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like Internet Explorer 8 & lower does)
        else {
            window.location.href = url;
        }
    }
});
