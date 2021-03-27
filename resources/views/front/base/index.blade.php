@extends('layout.front.app')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{$title}}
                    <span class="d-block text-muted pt-2 font-size-sm">عرض وترتيب وترقيم الصفحات</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">

                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="{{route($route.'.create')}}" @if(isset($isOneField)&&$isOneField)
                id="one-field-button"
                   @endif
                   class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                              fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>إضافة</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="بحث"
                                           id="kt_datatable_search_query"/>
                                    <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                </div>
                            </div>
                            @yield('filter')
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">بحث</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


    @if(isset($isOneField)&&$isOneField)
        <!-- Modal-->
        <div class="modal fade" id="one-field-modal" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">اضافة/تعديل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form action="" method="post" id="one-field-form">

                        <div class="modal-body">
                            @csrf
                            <input type="hidden" value="" name="id" id="id">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">العنوان</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="title" id="input"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                                اغلاق
                                <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                            </button>
                            <button type="submit" class="btn btn-primary font-weight-bold">حفظ</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif
@endsection
@include('layout.admin.ktdatatable')
@yield('column')
@push('scripts')
    <script>
        datatable(column)
        @if(isset($isOneField)&&$isOneField)
        $('#one-field-button').click(function (e) {
            e.preventDefault();
            $('#one-field-form').attr('action', '{{route('admin.'.$route.'.store')}}');
            $('#one-field-form #id').val('');
            $('#one-field-modal #modal-title').text('اضافة');
            $('#one-field-modal').modal('show');
        });

        $('body').on('click', '.one-field-edit', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let title = $(this).data('title');
            $('#one-field-form').attr('action', '{{route('admin.'.$route.'.store')}}');
            $('#one-field-form #id').val(id);
            $('#one-field-form #input').val(title);
            $('#one-field-modal #modal-title').text('تعديل');
            $('#one-field-modal').modal('show');
        });


        @endif
    </script>
@endpush