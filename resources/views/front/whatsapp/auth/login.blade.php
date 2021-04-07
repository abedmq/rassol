@extends('layout.front.app')

@section('css')
    <link href="front/css/pages/wizard/wizard-4.rtl.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <!--begin::Card-->
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin::Wizard-->

            <div class="card card-custom card-shadowless rounded-top-0">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-10">
                            <!--begin::Wizard Form-->
                            <form class="form" id="login_whatsapp_form">
                                <div class="row justify-content-center">
                                    <div class="col-xl-9">
                                        <!--begin::Wizard Step 1-->
                                        <div class="my-5 step" data-wizard-type="step-content"
                                             data-wizard-state="current">
                                            <!--begin::Group-->
                                            <div class="row">

                                                <div class="qrcode-wrapper col-md-4">
                                                    <h5 class="text-dark font-weight-bold mb-10">تسجيل دخول
                                                        واتساب</h5>

                                                    <div class="qrcode" style="height: 200px">
                                                        <img src="front/media/loader.gif"
                                                             style="    width: 200px;    height: auto;    animation: none;"
                                                             class="login-loader"
                                                             alt="">
                                                        <img class="qrcode-img" width="100%" alt=""
                                                             style="    width: 200px;    height: auto;    animation: none;display:none;">
                                                        <p style="display: none;" class="login-error">
                                                            حصل خطأ اثناء
                                                            الربط مع الواتساب الرجاء المحاولة مرة اخرى او
                                                            التواصل مع الدعم الفني</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="text-dark font-weight-bold mt-20">
                                                        لاستخدام الواتساب على تطبيق رسول
                                                    </h5>
                                                    <ol class="_2yDOs"
                                                        style="font-size: 14px;line-height: 30px;margin-top: 20px;">
                                                        <li class="ZJ0wv">افتح واتساب على هاتفك</li>
                                                        <li class="ZJ0wv">
                                                                <span dir="ltr" class="_3-8er">انقر <strong><span
                                                                                dir="ltr" class="_3-8er">على قائمة <span
                                                                                    class="_2zr6K"><svg height="24px"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        width="24px"><rect
                                                                                            fill="#f2f2f2" height="24"
                                                                                            rx="3" width="24"></rect><path
                                                                                            d="m12 15.5c.825 0 1.5.675 1.5 1.5s-.675 1.5-1.5 1.5-1.5-.675-1.5-1.5.675-1.5 1.5-1.5zm0-2c-.825 0-1.5-.675-1.5-1.5s.675-1.5 1.5-1.5 1.5.675 1.5 1.5-.675 1.5-1.5 1.5zm0-5c-.825 0-1.5-.675-1.5-1.5s.675-1.5 1.5-1.5 1.5.675 1.5 1.5-.675 1.5-1.5 1.5z"
                                                                                            fill="#818b90"></path></svg></span></span></strong> او <strong><span
                                                                                dir="ltr" class="_3-8er">الاعدادات <span
                                                                                    class="_2zr6K"><svg width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24"><rect
                                                                                            fill="#F2F2F2" width="24"
                                                                                            height="24" rx="3"></rect><path
                                                                                            d="M12 18.69c-1.08 0-2.1-.25-2.99-.71L11.43 14c.24.06.4.08.56.08.92 0 1.67-.59 1.99-1.59h4.62c-.26 3.49-3.05 6.2-6.6 6.2zm-1.04-6.67c0-.57.48-1.02 1.03-1.02.57 0 1.05.45 1.05 1.02 0 .57-.47 1.03-1.05 1.03-.54.01-1.03-.46-1.03-1.03zM5.4 12c0-2.29 1.08-4.28 2.78-5.49l2.39 4.08c-.42.42-.64.91-.64 1.44 0 .52.21 1 .65 1.44l-2.44 4C6.47 16.26 5.4 14.27 5.4 12zm8.57-.49c-.33-.97-1.08-1.54-1.99-1.54-.16 0-.32.02-.57.08L9.04 5.99c.89-.44 1.89-.69 2.96-.69 3.56 0 6.36 2.72 6.59 6.21h-4.62zM12 19.8c.22 0 .42-.02.65-.04l.44.84c.08.18.25.27.47.24.21-.03.33-.17.36-.38l.14-.93c.41-.11.82-.27 1.21-.44l.69.61c.15.15.33.17.54.07.17-.1.24-.27.2-.48l-.2-.92c.35-.24.69-.52.99-.82l.86.36c.2.08.37.05.53-.14.14-.15.15-.34.03-.52l-.5-.8c.25-.35.45-.73.63-1.12l.95.05c.21.01.37-.09.44-.29.07-.2.01-.38-.16-.51l-.73-.58c.1-.4.19-.83.22-1.27l.89-.28c.2-.07.31-.22.31-.43s-.11-.35-.31-.42l-.89-.28c-.03-.44-.12-.86-.22-1.27l.73-.59c.16-.12.22-.29.16-.5-.07-.2-.23-.31-.44-.29l-.95.04c-.18-.4-.39-.77-.63-1.12l.5-.8c.12-.17.1-.36-.03-.51-.16-.18-.33-.22-.53-.14l-.86.35c-.31-.3-.65-.58-.99-.82l.2-.91c.03-.22-.03-.4-.2-.49-.18-.1-.34-.09-.48.01l-.74.66c-.39-.18-.8-.32-1.21-.43l-.14-.93a.426.426 0 00-.36-.39c-.22-.03-.39.05-.47.22l-.44.84-.43-.02h-.22c-.22 0-.42.01-.65.03l-.44-.84c-.08-.17-.25-.25-.48-.22-.2.03-.33.17-.36.39l-.13.88c-.42.12-.83.26-1.22.44l-.69-.61c-.15-.15-.33-.17-.53-.06-.18.09-.24.26-.2.49l.2.91c-.36.24-.7.52-1 .82l-.86-.35c-.19-.09-.37-.05-.52.13-.14.15-.16.34-.04.51l.5.8c-.25.35-.45.72-.64 1.12l-.94-.04c-.21-.01-.37.1-.44.3-.07.2-.02.38.16.5l.73.59c-.1.41-.19.83-.22 1.27l-.89.29c-.21.07-.31.21-.31.42 0 .22.1.36.31.43l.89.28c.03.44.1.87.22 1.27l-.73.58c-.17.12-.22.31-.16.51.07.2.23.31.44.29l.94-.05c.18.39.39.77.63 1.12l-.5.8c-.12.18-.1.37.04.52.16.18.33.22.52.14l.86-.36c.3.31.64.58.99.82l-.2.92c-.04.22.03.39.2.49.2.1.38.08.54-.07l.69-.61c.39.17.8.33 1.21.44l.13.93c.03.21.16.35.37.39.22.03.39-.06.47-.24l.44-.84c.23.02.44.04.66.04z"
                                                                                            fill="#818b90"></path></svg></span></span></strong> واختر <strong>واتساب ويب</strong></span>
                                                        </li>
                                                        <li class="ZJ0wv">
                                                            استخدم هاتفك لمسح الرمز المربع على جهاز الحاسوب
                                                        </li>
                                                    </ol>
                                                </div>

                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <p>
                                                    بدخولك فأنت توافق على
                                                    <a href="{{url("terms")}}" target="_blank">الشروط والأحكام</a>
                                                    و
                                                    <a href="{{url('policy')}}" target="_blank">سياسة الخصوصية</a>

                                                </p>
                                            </div>
                                            <div class="col-md-12" style="text-align: center;">
                                                <br>
                                                <iframe width="100%" height="400"
                                                        src="https://www.youtube.com/embed/jdXwzneFBBU"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <!--end::Wizard Step 1-->


                                    </div>
                                </div>
                            </form>
                            <!--end::Wizard Form-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Card-->
@endsection

@push('scripts')
    <script>
        var ws;
        var _interval;
        var id = '{{auth()->user()->getGoAuth()}}'
        window.isLogin = false;

        function openWs() {
            if (ws) {
                showErrorLogin();
                return false;
            }
            if (false) {
                new_uri = "wss:";
            } else {
                new_uri = "ws:";
            }
            new_uri += "//" + '{{config('services.GO_URL')}}/';
            new_uri += "ws";
            ws = new WebSocket(new_uri);
            ws.onopen = function (evt) {
                ws.send("login://" + id);
            }
            ws.onclose = function (evt) {
                showErrorLogin();
                toastr.error("حصل خطأ فني الرجاء النواصل مع الادارة");

                ws = null;
            }
            ws.onmessage = function (evt) {
                let resp = evt.data;
                console.log(resp)
                let command = resp.split('://');
                if (typeof command[0] != 'undefined') {
                    switch (command[0]) {
                        case "reloadImg":
                            $('.qrcode .login-loader').hide();
                            var dt = new Date();

                            $('.qrcode .qrcode-img').attr('src', 'http://{{config('services.GO_URL')}}/' + command[1] + "?time=" + dt.getTime());
                            $('.qrcode .qrcode-img').fadeIn();
                            break;
                        case "status":
                            window.isLogin = true;
                            $.get("whatsapp/login-success").done(function (data) {
                                if (data.status == 'success') {
                                    toastr.success("تم تسجيل الدخول بنجاح");
                                    window.location = "{{route("whatsapp.chats")}}";
                                } else {
                                    toastr.success(data.msg);
                                    id = data.id;
                                    ws.send("login://" + data.id);

                                }

                            });
                            break;
                        case "whatsappNotConnected":
                            toastr.error("الرجاء التأكد من اتصال الواتساب على الجوال");
                            showErrorLogin();

                    }
                }
                print("RESPONSE: " + evt.data);
            }
            ws.onerror = function (evt) {
                print("ERROR: " + evt.data);
            }
            return false;
        }

        var isSending = false


        $('body').on('click', '#retry-login', function () {
            $('.login-error').hide();
            $('.login-loader').show();
            ws.send("login://" + id);
        });

        function print(msg) {
            console.log(msg)
        }

        openWs()

        function showErrorLogin(msg) {
            if (typeof msg == 'undefined') {
                msg = 'حصل خطأ اثناء الربط مع الواتس اب الرجاء المحاولة مرة اخرى او التواصل مع الدعم الفني' +
                    ' <a href="javascript:;" id="retry-login">المحاولة مرة اخرى</a>';
            }
            $('.login-error').html(msg);
            $('.login-error').show();
            $('.login-loader').hide();
        }


    </script>
@endpush