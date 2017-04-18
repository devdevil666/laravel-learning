
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('sweetalert');
require('dropzone');
require('jquery-pjax');

if ($('.dropzone').length) {
    Dropzone.options.addPhoto = {
        maxFilesize: 2,
        acceptedFiles: '.jpg, .jpeg, .png'
    };
}

if ($('#pjax-container').length) {
    $(document).on('submit', 'form[data-pjax]', function (event) {
        event.preventDefault();
        $.pjax.submit(event, '#pjax-container', {
            scrollTo: false
        });
    });
}