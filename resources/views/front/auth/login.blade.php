@extends('layout.front.auth')

@section('content')
    <!--begin::Signin-->
    <div class="login-form">
        <!--begin::Form-->
        <form class="form" id="kt_login_signin_form"
              action="{{route('login')}}" method="post">
        @csrf            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">تسجيل الدخول</h3>
            </div>
            <!--begin::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">البريد الإلكتروني</label>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="email" name="email"
                       autocomplete="off"/>
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">كلمة السر</label>
{{--                    <a href="#"--}}
{{--                       class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">--}}
{{--                        نسيت كلمة المرور؟</a>--}}
                </div>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password"
                       name="password" autocomplete="off"/>
            </div>
            <!--end::Form group-->
            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_singin_form_submit_button"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    تسجيل الدخول
                    <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                </button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
@endsection



@push('scripts')
    <script>
        var validation = FormValidation.formValidation(KTUtil.getById('kt_login_signin_form'), {
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'البريد الألكتروني مطلوب'
                        },
                        emailAddress: {
                            message: 'يجب ان يكون بريد الكتروني'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'كلمة المرور مطلوبة',
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                // submitButton: new FormValidation.plugins.SubmitButton(),
                // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        });


        $('#kt_login_signin_form').on('submit', function (e) {
            e.preventDefault();
            obj = this
            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    ajaxForm(obj);

                } else {
                    // swal.fire({
                    //     text: "Sorry, looks like there are some errors detected, please try again.",
                    //     icon: "error",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn font-weight-bold btn-light-primary"
                    //     }
                    // }).then(function () {
                    // });
                    KTUtil.scrollTop();
                }
            });
        });
    </script>
@endpush