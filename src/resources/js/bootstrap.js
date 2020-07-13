// jQuery (required for: Cropper)
window.$ = window.jQuery = require('jquery');

// Image Cropper
require('cropperjs');
require('jquery-cropper');
require('cropperjs/dist/cropper.min.css');

// Date
window.flatpickr = require('flatpickr');
// window.flatpickrSerbian = require("flatpickr/dist/l10n/sr.js").default.sr;
// flatpickr.localize(flatpickrSerbian);
flatpickr.l10ns.default.firstDayOfWeek = 1;
require('flatpickr/dist/flatpickr.css');

// Select
window.selectize = require('selectize');
require('selectize/dist/css/selectize.css');

// Textarea
window.tinymce = require('tinymce/tinymce.js');
require('tinymce/themes/silver/theme.js');
require('tinymce/plugins/autoresize/plugin.js');
require('tinymce/plugins/advlist/plugin.js');
require('tinymce/plugins/hr/plugin.js');
require('tinymce/plugins/charmap/plugin.js');
require('tinymce/plugins/fullscreen/plugin.js');
require('tinymce/plugins/insertdatetime/plugin.js');
require('tinymce/plugins/image/plugin.js');
require('tinymce/plugins/link/plugin.js');
require('tinymce/plugins/preview/plugin.js');
require('tinymce/plugins/searchreplace/plugin.js');
require('tinymce/plugins/visualblocks/plugin.js');
require('tinymce/plugins/wordcount/plugin.js');
require('tinymce/plugins/help/plugin.js');
require('tinymce/plugins/lists/plugin.js');
require('tinymce/plugins/code/plugin.js');

// Timepicker
window.timepicker = require('timepicker');
require('timepicker/jquery.timepicker.min.css');

// Uppy
window.Uppy = require('@uppy/core');
window.XHRUpload = require('@uppy/xhr-upload');
window.Dashboard = require('@uppy/dashboard');
require('@uppy/core/dist/style.css');
require('@uppy/dashboard/dist/style.css');

// Bootstrap Toggle
require('bootstrap4-toggle');
require('bootstrap4-toggle/css/bootstrap4-toggle.min.css');