@extends('layout.admin.default')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route('admin.'.$route.'.index')}}">{{$title}}</a>
            </h3>
        </div>
        <!--begin::Form-->
        <form action="{{route('admin.users.store')}}" method="post" class="form-validate ajax-form">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label>الاسم <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="ادخل الاسم" required name="name" value="{{old('name')}}"/>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" placeholder="ادخل البريد الإلكتروني" required
                           value="{{old('email')}}"
                           name="email"/>
                </div>
                <div class="form-group">
                    <label for="password">كلمة المرور <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="كلمة المرور" required/>
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

