"use strict";

// Class Definition
var KTAddUser = function () {
    // Private Variables
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _avatar;
    window._isGroupGet = false;
    var _validations = [];

    // Private Functions
    var _initWizard = function () {
        // Initialize form wizard
        window._wizardObj = _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false  // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function (wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            if (wizard.getStep() == 1) {
                if (!window.isLogin) {
                    toastr.success("الرجاء التأكد من تسجيل الدخول");
                    return false;
                }
            }
            if (wizard.getStep() == 2) {


            }
            if (wizard.getStep() == 3) {
                $.get('whatsapp/get-user-info').done(function (data) {
                    if (data.status == 'success') {
                        $('#account-details').html(data.html);
                    }
                    $(_formEl).find('#action-submit').attr('disabled', false);
                }).fail(function () {
                    toastr.error('حصل خطأ اثناء جلب المجموعات');
                })
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // field step
                        if (wizard.getStep() == 2) {
                            $.ajax({
                                url: "whatsapp/set-info",
                                method: "post",
                                type: "json",
                                data: {field_id: $('#field_id').val(), tags_id: $('#tags_id').val()}
                            }).done(function (data) {
                                if (data.status == 'success')
                                    toastr.success('تم حفظ البيانات بنحاح');
                                else {
                                    toastr.error('حصل خطأ اثناء حفظ البيانات');
                                    wizard.goTo(1);
                                }
                            });
                            if (!window._isGroupGet) {
                                $(_formEl).find('#next-step').attr('disabled', true);
                            }
                        } else if (wizard.getStep() == 3) {
                            var data = [];
                            $(".group-checkbox:checked").each(function () {
                                data.push($(this).val());
                            });
                            $.ajax({
                                url: "whatsapp/add-groups",
                                method: "post",
                                type: "json",
                                data: {"groups_id[]": data}
                            }).done(function (data) {
                                if (data.status == 'success')
                                    toastr.success('تم حفظ البيانات بنحاح');
                                else {
                                    toastr.error(data.msg ? data.msg : 'حصل خطأ اثناء حفظ البيانات');
                                    wizard.goTo(3);
                                    KTUtil.scrollTop();

                                }
                            });
                        }
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        toastr.error('الرجاء التأكد من الحقول  المدخلة');
                        KTUtil.scrollTop();
                    }
                });
            }

            return false;  // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on('changed', function (wizard) {
            KTUtil.scrollTop();
        });

        // Submit event
        _wizardObj.on('submit', function (wizard) {
            window.location = "whatsapp";
        });
    }

    var _initValidations = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

        // Validation Rules For Step 1
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {},
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    // Step 2
                    field_id: {
                        validators: {
                            notEmpty: {
                                message: 'الرجاء اختر المجال الخاص بك'
                            }
                        }
                    },
                    "tags_id[]": {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'الرجاء اختر اهتمام واحد على الاقل'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    address1: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            }
                        }
                    },
                    postcode: {
                        validators: {
                            notEmpty: {
                                message: 'Postcode is required'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
                            }
                        }
                    },
                    state: {
                        validators: {
                            notEmpty: {
                                message: 'state is required'
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: 'Country is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));
    }

    var _initAvatar = function () {
        _avatar = new KTImageInput('kt_user_add_avatar');
    }

    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('kt_wizard');
            _formEl = KTUtil.getById('login_whatsapp_form');
            _initWizard();
            _initValidations();
            _initAvatar();
        },
        _formEl: KTUtil.getById('login_whatsapp_form')
    };
}();

jQuery(document).ready(function () {
    KTAddUser.init();
});
