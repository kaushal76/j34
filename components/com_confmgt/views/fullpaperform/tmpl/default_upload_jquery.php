<?php
/**
 * @version     2.5.7
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// no direct access
defined('_JEXEC') or die;
?>

<!-- Generic page styles -->
<link rel="stylesheet" href="components/com_confmgt/assets/uploader/css/style.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="components/com_confmgt/assets/uploader/css/jquery.fileupload.css">

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="components/com_confmgt/assets/uploader/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="components/com_confmgt/assets/uploader/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="components/com_confmgt/assets/uploader/js/jquery.fileupload-validate.js"></script>
<script>
    /*jslint unparam: true, regexp: true */

    /*global window, $ */

    jQuery.noConflict();

    (function ($) {
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = window.location.hostname === 'blueimp.github.io' ?
                    '//jquery-file-upload.appspot.com/' : 'http://localhost/j38/components/com_confmgt/assets/uploader/server/php/',
                uploadButton = $('<button/>')
                    .addClass('btn btn-primary')
                    .prop('disabled', true)
                    .text('Processing...')
                    .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        $this
                            .off('click')
                            .text('Abort')
                            .on('click', function () {
                                $this.remove();
                                data.abort();
                            });
                        data.submit().always(function () {
                            $this.remove();
                        });
                    });
            console.log(url, "Hello, world!");
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                autoUpload: false,
                acceptFileTypes: /(\.|\/)(doc|docx|pdf)$/i,
                maxFileSize: 999000,
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true
            }).on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').appendTo('#files');
                $.each(data.files, function (index, file) {
                    var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                    if (!index) {
                        node
                            .append('<br>')
                            .append(uploadButton.clone(true).data(data));
                    }
                    node.appendTo(data.context);
                });
            }).on('fileuploadprocessalways', function (e, data) {
                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);
                if (file.preview) {
                    node
                        .prepend('<br>')
                        .prepend(file.preview);
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append($('<span class="text-danger"/>').text(file.error));
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            }).on('fileuploadprogressall', function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }).on('fileuploaddone', function (e, data) {
                $.each(data.result.files, function (index, file) {
                    if (file.url) {
                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        $(data.context.children()[index])
                            .wrap(link);
                    } else if (file.error) {
                        var error = $('<span class="text-danger"/>').text(file.error);
                        $(data.context.children()[index])
                            .append('<br>')
                            .append(error);
                    }
                });
            }).on('fileuploadfail', function (e, data) {
                $.each(data.files, function (index) {
                    var error = $('<span class="text-danger"/>').text('File upload failed.');
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                });
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    })(jQuery);
</script>

<div class="container">
    <h1>jQuery File Upload Demo</h1>
    <h2 class="lead">Basic Plus version</h2>
    <ul class="nav nav-tabs">
        <li><a href="basic.html">Basic</a></li>
        <li class="active"><a href="basic-plus.html">Basic Plus</a></li>
        <li><a href="index.html">Basic Plus UI</a></li>
        <li><a href="angularjs.html">AngularJS</a></li>
        <li><a href="jquery-ui.html">jQuery UI</a></li>
    </ul>
    <br>
    <blockquote>
        <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bar, validation and preview
            images, audio and video for jQuery.<br>
            Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
            Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports
            standard HTML form file uploads.</p>
    </blockquote>
    <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Demo Notes</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is
                    unlimited).
                </li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no
                    file type restriction).
                </li>
                <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files
                    are stored in memory).
                </li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a
                        href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).
                </li>
                <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and
                    <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.
                </li>
                <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a
                        href="http://glyphicons.com/">Glyphicons</a>.
                </li>
            </ul>
        </div>
    </div>
</div>
