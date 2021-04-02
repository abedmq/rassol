@extends('layout.admin.default')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('admin.'.$route.'.index')}}">{{$title}}</a>
            </h3>
        </div>
        <!--begin::Form-->
        <form action="{{route('admin.'.$route.'.store')}}" method="post" class="form-validate ajax-form">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>الاسم <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="ادخل الاسم" required name="name"
                           value="{{old('name')}}"/>
                </div>
                <div class="form-group">
                    <label>السعر <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="ادخل السعر" required
                           value="{{old('price')}}"
                           name="price"/>
                </div>
                <div class="form-group">
                    <label>عدد المجموعات الأقصى <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="ادخل عدد المجموعات الأقصى" required
                           value="{{old('max_group_manage')}}"
                           name="max_group_manage"/>
                </div>
                <div class="form-group">
                    <label>عدد الرسائل الشهري <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="ادخل عدد الرسائل الشهري"
                           value="{{old('max_monthly_messages')}}"
                           name="max_monthly_messages"/>
                    <small>اذا اردت عدد غير محدود من الرسائل اتركه فارغا</small>
                </div>

                <div class="form-group">
                    <label>عدد الأرقام التي يستطيع اضافتها <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="ادخل عدد الأرقام التي يستطيع اضافتها"
                           value="{{old('max_added_contact')}}"
                           name="max_added_contact"/>
                    <small>اذا اردت عدد غير محدود من الأرقام اتركه فارغا</small>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ
                    <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                </button>
                <button type="reset" class="btn btn-secondary">الغاء</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
@endsection

@push('scripts')
@endpush

