
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('sweetalert');
require('jquery-pjax');
let Dropzone = require('dropzone');

Dropzone.autoDiscover = false;
if ($("#addPhoto").length) {
    Dropzone.options.addPhoto = {
        maxFilesize: 2,
        paramName: "file",
        acceptedFiles: '.jpg, .jpeg, .png',
        uploadMultiple: false
    };
    let addPhoto = new Dropzone("#addPhoto");

    addPhoto.on("success", function(file) {
        $.pjax.reload('#photos-container');
    });
}

if ($('#pjax-container').length) {
    $(document).on('submit', 'form[data-pjax]', function (event) {
        event.preventDefault();
        $.pjax.submit(event, '#pjax-container', {
            scrollTo: false,
            push: false,
        });
    });
}