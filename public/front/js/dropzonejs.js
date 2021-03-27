"use strict";
// Class definition

var KTDropzoneDemo = function () {
    // Private functions
    var imagesInProcess = 0;
    var dropzoneChat = null;
    var demo1 = function () {
        // single file upload
        // multiple file upload
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "اسحب الصور لرفعها";
        Dropzone.prototype.defaultOptions.dictFallbackMessage = "Your browser does not support drag'n'drop file uploads.";
        Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
        Dropzone.prototype.defaultOptions.dictFileTooBig = "حجم الملف  ({{filesize}}MiB). اكبر من الحد الاقصى لرفع الصور: {{maxFilesize}}MiB.";
        Dropzone.prototype.defaultOptions.dictInvalidFileType = "هذا الملف غير مسموح برفعه";
        Dropzone.prototype.defaultOptions.dictResponseError = "حصل خطأ في السيرفر";
        Dropzone.prototype.defaultOptions.dictCancelUpload = "الغاء التحميل";
        Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "هل انت متأكد من الغاء التحميل";
        Dropzone.prototype.defaultOptions.dictRemoveFile = "حذف";
        Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "لا يمكنك تحميل ملفات اخرى";
        dropzoneChat = new Dropzone('#kt_dropzone_2', {
            url: window.imageUploadUrl, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 4,
            maxFilesize: 10, // MB
            addRemoveLinks: true,

            acceptedFiles: "image/*,application/pdf",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // accept: function (file, done) {
            //     // alert($('meta[name="csrf-token"]').attr('content'))
            //     done();
            // },
            init: function () {
                this.on("addedfile", function (file) {
                    imagesInProcess++;
                });
                this.on("removedfile", function (file) {
                    // imagesInProcess--;
                });
                this.on("success", function (file, data) {
                    var x = document.createElement("input");
                    x.setAttribute("type", "hidden");
                    x.setAttribute("name", "images[]");
                    x.setAttribute("value", data.name);
                    // file.previewElement.find('.dz-remove').append('<i class="fa fa-times"></i>')
                    file.previewElement.append(x);
                });
                this.on("complete", function (file) {
                    imagesInProcess--;
                });
            }
        });

    }

    return {
        // public functions
        init: function () {
            demo1();
        },
        imagesInProcess: function () {
            return imagesInProcess
        },
        dropzoneChat: function () {
            return dropzoneChat;
        },
    };
}();

KTUtil.ready(function () {
    KTDropzoneDemo.init();
});
