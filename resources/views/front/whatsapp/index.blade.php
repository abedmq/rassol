@extends('layout.front.app',['title'=>'المحادثات'])

@section('css')
    <style>
        .msg-groups {
            margin-top: 5px;
        }

        .msg-groups .group-image {
            width: 35px;
            height: 35px;
            border-radius: 20px;
            overflow: hidden;
            float: right;
        }

        #messages {
            max-height: 428px !important;
        }

        #messages .scroll {
            height: 400px !important;
        }

        .inline-msg-item {
            position: relative;
        }

        .inline-msg-item .dropdown {
            position: absolute;
            right: -42px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s;
            z-index: -5;
            opacity: 0;
            visibility: hidden;
        }

        .inline-msg-item .dropdown > button {
            border-radius: 100%;
            background: #f9f9f9;
        }

        .inline-msg-item-wrap:hover .dropdown {
            z-index: 2;
            visibility: visible;
            opacity: 1;
        }

        .inline-msg-item.msg-right .dropdown {
            left: -42px;
            right: auto;
        }


    </style>
@endsection
@section('content')
    <!--begin::Chat-->
    @include('layout.admin.errors')
    <form action="{{route('whatsapp.send')}}" method="post" id="send-form">
        @csrf
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body">
                    @if($groups->count())
                        <!--begin:Search-->
                            <div class="input-group input-group-solid">

                                <div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                              fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                </div>
                                <input type="text" class="form-control py-4 h-auto " id="search" placeholder="بحث"/>
                            </div>
                            <div class="mt-5">
                                <label class="checkbox checkbox-lg checkbox-inline">
                                    <input type="checkbox" class="choose-all-groups" name="asd" value="all"/>
                                    <span></span>
                                    <b class="d-inline-block ml-4">اختيار الكل</b>
                                </label>
                                <hr>

                            </div>
                            <!--end:Search-->
                            <!--begin:Users-->
                            <div class="mt-2 scroll scroll-pull">
                            @foreach($groups as $group)
                                <!--begin:User-->
                                    <div class="group-wrapper">
                                        <div class="d-flex align-items-center justify-content-between mb-5 ">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-circle symbol-50 mr-3">
                                                    <label class="checkbox checkbox-lg checkbox-inline">
                                                        <input type="checkbox" name="groups_id[]" class="groups_id"
                                                               value="{{$group->id}}"/>
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="symbol symbol-circle symbol-50 mr-3">
                                                    <img alt="{{$group->subject}}" src="{{$group->getImage()}}">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="javascript:;"
                                                       class="text-dark-75 group-subject text-hover-primary font-weight-bold font-size-lg">
                                                        {{$group->subject}}
                                                    </a>
                                                    <span class="text-muted font-weight-bold font-size-sm">{{$group->getCreation()->format('Y-m-d')}}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column align-items-end">
                                                <span class="label label-sm label-success">{{$group->contacts->count()}}</span>
                                                {{--                                    <span class="text-muted font-weight-bold font-size-sm">35 mins</span>--}}
                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                            </div>
                        @else
                            <p class="text text-muted">
                                لا يوجد لديك مجموعات لاداراتها قم بالتواصل مع المدير الخاص بك لاضافتك على المجموعات
                            </p>

                        @endif
                        @if(auth()->user()->canCreateNewGroup())
                        <!--end:Users-->
                            <div class="input-group input-group-solid">
                                <a href="javascript:;" class="btn btn-success w-100 add-new-group">اضافة مجموعة
                                    <i class="fa fa-spinner fa-spin loadera" style="display: none;"></i>
                                </a>
                            </div>
                            <br>
                            <div class="input-group input-group-solid">
                                <a href="javascript:;" class="btn btn-success w-100 create-new-groups"
                                   data-toggle="modal" data-target="#createGroupsModal"
                                >انشاء مجموعات
                                </a>
                            </div>
                        @else
                            <div class="input-group input-group-solid">
                                <a href="{{route('whatsapp.refresh')}}" class="btn btn-info w-100 ">تحديث
                                    <i class="fa fa-spinner fa-spin loadera" style="display: none;"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                <!--begin::Card-->
                <div class="card card-custom h-100">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                            <!--begin::Aside Mobile Toggle-->
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none"
                                    id="kt_app_chat_toggle">
														<span class="svg-icon svg-icon-lg">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg-->
															<svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                                          fill="#000000" opacity="0.3"/>
																	<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                                          fill="#000000"/>
																</g>
															</svg>
                                                            <!--end::Svg Icon-->
														</span>
                            </button>
                            <!--end::Aside Mobile Toggle-->

                        </div>
                        <div class="text-center text-center">
                            <div class="symbol-group symbol-hover justify-content-center">
                                @if(isset($groupSelected)&&$groupSelected)
                                    @foreach($groupSelected->contacts->take(5)??[] as $contact)
                                        <div class="symbol symbol-35 symbol-circle" data-toggle="tooltip"
                                             title="{{$contact->getMobile()}}">
                                            <img alt="Pic" src="{{$contact->getImage()}}"/>
                                        </div>
                                    @endforeach
                                    @if(($remainCount=($groups[0]->contacts->count() - 5))>0)
                                        <div class="symbol symbol-35 symbol-circle symbol-light-success"
                                             data-toggle="tooltip"
                                             title="Invite someone">
                                            <span class="symbol-label font-weight-bold">+{{$remainCount}}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="text-right flex-grow-1">
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"/>
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                              fill="#000000" fill-rule="nonzero"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                                </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        @if($groupSelected)

                                            <li class="navi-item">
                                                <a href="javascript:;" data-toggle="modal" data-target="#add-member"
                                                   class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
                                                    <span class="navi-text">اضافة عضو</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body" id="messages">

                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">اسحب الصور لرفعها</h3>
                                        <span class="dropzone-msg-desc">ارفع 5 صور كحد أقصى</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <textarea class="form-control border-0 p-0" rows="2" placeholder="نص الرسالة" name="msg"--}}
                        {{--                                  id="msg"--}}
                        {{--                                  required style="    width: 80%;display: inline-block;"></textarea>--}}
                        <div id="whatsapp-editor-container">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                {{--                                <label for="profile_avatar">--}}
                                {{--                                    <i class="flaticon2-photograph icon-lg"></i>--}}
                                {{--                                </label>--}}
                            </div>
                            <div>
                                <button type="submit"
                                        class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6">
                                    ارسال
                                    <i class="fas fa-spinner fa-spin loadera" style="display: none;"></i>
                                </button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
    </form>
    <!--end::Chat-->
@endsection

@push('scripts')
    <link rel="stylesheet" href="front/plugins/whatsapp-editor/css/whatsapp-editor.css">
    <script src="front/plugins/whatsapp-editor/js/whatsapp-editor.js"></script>


    <div class="modal fade" id="contacts-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">مجموعة جديدة</h5>
                    <a href="javascript:;" class="add-new-group btn btn-primary" data-update="1">
                        <i class="fas fa-sync"></i>
                    </a>
                </div>
                <form method="post" action="{{route('whatsapp.groups.select')}}" class="ajax-form">
                    @csrf
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">
                            اضافة
                            <i class="fa fa-spinner fa-spin loader-al" style="display: none;"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    @if(auth()->user()->canCreateNewGroup())
        <div class="modal fade" id="createGroupsModal" tabindex="-1" role="dialog"
             aria-labelledby="createGroupsModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">انشاء مجموعات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('whatsapp.groups.create_new_groups')}}" method="post" id="create-new-groups">
                        @csrf

                        <div class="modal-body">


                            <div class="form-group m-form__group {{$errors->has('count')?"has-danger":""}}">
                                <label>اسم المجموعة :</label>
                                <input id="name" class="form-control" name="name"
                                       type="name" required placeholder="ادخل اسم المجموعة" value="{{old('name')}}"/>
                            </div>

                            <div class="form-group m-form__group {{$errors->has('count')?"has-danger":""}}">
                                <label>رقم البداية :</label>
                                <input id="start_count" class="form-control" name="start_count"
                                       type="number" placeholder="ادخل رقم البداية" value="{{old('start_count',1)}}"/>
                                <label for="">هذا الرقم يضاف بعد اسم المجموعة</label>
                            </div>


                            <div class="form-group  {{$errors->has('country')?"has-danger":""}}">
                                <label>الدولة :</label>
                                <select id="country" class="form-control  select2" name="countries_id[]"
                                        multiple="multiple"
                                >
                                    @foreach(\App\Models\Contact::groupBy('country_code')->selectRaw('country_code,count(*) as count')->get() as $country)
                                        <option value="{{$country->country_code}}">
                                            {{__('countries.'.$country->country_code)}}
                                            ( {{$country->count}} عضو)
                                        </option>
                                    @endforeach
                                </select>
                                <label for=""><strong>*</strong>لاختيار جميع الدول اترك الحقل فارغا </label>
                            </div>

                            <div class="form-group  {{$errors->has('country')?"has-danger":""}}">
                                <label>المشرفين :</label>
                                <select id="users_id" class="form-control  select2" name="users_id[]"
                                        multiple="multiple"
                                >
                                    @foreach(auth()->user()->users()->active()->get() as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for=""><strong>*</strong>لاختيار جميع المشرفين اترك الحقل فارغا </label>
                            </div>

                            <div class="form-group m-form__group {{$errors->has('count')?"has-danger":""}}">
                                <label>عدد المجموعات :</label>
                                <small style="color:red">متبقي لديك {{auth()->user()->getRemainGroupCount()}}
                                    مجموعة</small>

                                <input id="count" class="form-control" name="count"
                                       type="number" max="{{auth()->user()->getRemainGroupCount()}}" min="1"
                                       required placeholder="ادخل عدد المجموعات" value="{{old('count')}}"/>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary">انشاء</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endif


    @if($groupSelected)
        <div class="modal fade" id="add-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة عضو</h5>
                        <a href="javascript:;" class="add-new-group btn btn-primary" data-update="1">
                            <i class="fas fa-sync"></i>
                        </a>
                    </div>
                    <form method="post" action="{{route('whatsapp.groups.update',$groupSelected->id)}}"
                          class="ajax-form">
                        @csrf
                        @method('put')
                        <input type="hidden" name="operation" value="add_member">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">الرقم</label>
                                <input type="text" name="mobile" required minlength="10" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-primary">
                                اضافة
                                <i class="fa fa-spinner fa-spin loader-al" style="display: none;"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif

    <script src="front/js/chat.js"></script>
    <script src="front/js/dropzonejs.js"></script>
    {{--    <script src="front/plugins/ckeditor5/ckeditor.js?"></script>--}}

    <script>
        var table = KTUtil.getById("kt_advance_table_widget_1");

        // CKEDITOR.timestamp = '8';
        // CKEDITOR.config.toolbar='Basic';

        // CKEDITOR.replace('msg', {
        //     language: 'ar',
        //
        // });
        var editor = $("#whatsapp-editor-container").whatsappEditor();

        KTUtil.on(table, 'thead th .checkbox > input', 'change', function (e) {
            var checkboxes = KTUtil.findAll(table, 'tbody td .checkbox > input');

            for (var i = 0, len = checkboxes.length; i < len; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
        $('body').on('click', '.add-new-group', function (e) {
            e.preventDefault();

            obj = $(this);
            obj.find('.fa-sync').addClass("fa-spin");
            let update = 0;
            if (obj.data('update'))
                update = 1;
            obj.find('.loadera').show();
            obj.find('[type=submit]').attr('disabled', true);
            $.get('{{route('whatsapp.groups.index')}}?update=' + update).done(function (data) {
                if (data.status == 'success') {
                    $('#contacts-modal .modal-body').html(data.view);
                    $('#contacts-modal').modal('show');
                } else {
                    toastr.error(data.msg);
                }
            }).fail(function (data) {
                ajaxFail(data);
            }).always(function (data) {
                obj.find('.loadera').hide();
                obj.find('[type=submit]').attr('disabled', false);
                obj.find('.fa-sync').removeClass("fa-spin");
            });
        });
        $('body').on('submit', '#send-form', function (e) {
            e.preventDefault();

            // alert(editor.getFormattedContent());
            if (KTDropzoneDemo.imagesInProcess() > 0) {
                toastr.error('الرجاء انتظار رفع الصور');
                return false;
            }

            if (!$(this).find('.groups_id:checked').length) {
                toastr.error('الرجاء اختيار مجموعة واحدة على الاقل');
                return false;
            }
            $('#msg').val(editor.getFormattedContent());
            var fd = new FormData(this);
            var obj = $(this);
            obj.find('[type=submit] .loadera').show();
            obj.find('[type=submit]').attr('disabled', true);
            var content = editor.getFormattedContent(); // Formatted WhatsApp content

            fd.append('msg', content);
            $.ajax({
                url: obj.attr('action'),
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
            }).done(function (data) {
                if (data.redirect) {
                    window.location = data.redirect;
                } else {
                    if (data.status == 'success') {
                        $('#msg').val('');
                        KTDropzoneDemo.dropzoneChat().removeAllFiles(true);
                        editor.find(".whatsapp-editor").html('');
                        loadMsgs();
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                }
            }).fail(function (data) {
                ajaxFail(data)

            }).always(function () {

                obj.find('[type=submit] .loadera').hide();
                obj.find('[type=submit]').attr('disabled', false);
            });
        });
        // KTUtil.on(KTUtil.getById('kt_chat_content'), '.card-footer textarea', 'keydown', function(e) {
        //     if (e.keyCode == 13) {
        //         $('#send-form').submit();
        //         e.preventDefault();
        //
        //         return false;
        //     }
        // });

        loadMsgs();

        function loadMsgs() {
            $('#messages').html("<i class='fa fa-spinner fa-spin'></i>");

            $.ajax({
                url: "{{route('whatsapp.messages')}}/{{$groupSelected->id??""}}",
            }).done(function (data) {
                $('#messages').html(data.html);
                KTAppChat.init();
                const container = $('#messages .scroll');
                container.scrollTop(container.prop('scrollHeight'));


            }).fail(function (data) {
                ajaxFail(data);
            })
        }

        $('body').on('change', '.groups_id', function () {
            if ($('.groups_id').not('.hidden').length == $('.groups_id:checked').not('.hidden').length)
                $('.choose-all-groups').attr('checked', true);
            else
                $('.choose-all-groups').attr('checked', false);
        });

        $('body').on('change', '.choose-all-groups', function () {
            $('.groups_id').not('.hidden').attr('checked', $(this).is(":checked")).change();
        });
        $('body').on('change', '.recipients_id', function () {
            let init_count = parseInt($('.managed').data('init'));
            let max = parseInt($('.max-group').data('max'));
            if (init_count + $('.recipients_id:checked').length > max) {
                $(this).attr('checked', false);
                toastr.error('لقد وصلت للحد الاقصى من المجموعات التي تستطيع ادارتها');
            } else {
                let current_count = init_count + $('.recipients_id:checked').length;
                $('.managed').text(current_count);
            }
        });
        $('#search').keyup(function () {
            let query = $(this).val();

            $('.group-subject').closest('.group-wrapper').show();
            $(this).closest('.group-wrapper').find('.groups_id').addClass('hidden');
            if (query) {
                $('.group-subject').each(function () {
                    let subject = $(this).text();
                    // console.log(subject);
                    if (subject.search(query) == -1) {
                        $(this).closest('.group-wrapper').hide();
                        $(this).closest('.group-wrapper').find('.groups_id').addClass('hidden');
                    }
                });
            }
        });

        //
        $('#profile_avatar').change(function () {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#kt_image_5').css('background-image', 'url(' + e.target.result + ')');
                $('#kt_image_5').show();
            }
            if (input.files[0])
                reader.readAsDataURL(input.files[0]);
            else
                $('#kt_image_5').hide();
        });
        $('#remove-image').click(function () {
            // $('#kt_image_5').hide();
            document.getElementById('profile_avatar').value = "";
            $('#kt_image_5').hide();
            // $('#profile_avatar').change();
        });
        $('body').on('click', '.delete-msg', function (e) {
            e.preventDefault();
            let href = $(this).attr('href');
            Swal.fire({
                title: 'سيتم حذف الرسالة من جميع المجموعات',
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: `تأكيد`,
                denyButtonText: `إلغاء`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    ajaxRequest($(this));
                }
            })
        });


        $('#whatsapp-editor-container').click(function () {
            $('.whatsapp-editor').click();
        });
        // multi select
        $('#country').select2({
            placeholder: "اختر الدولة",
        });
        // multi select
        $('#users_id').select2({
            placeholder: "اختر المشرفين",
        });


        $('#createGroupsModal').on('shown.bs.modal', function () {
            $('#create-new-groups').validate();
        })
    </script>
@endpush