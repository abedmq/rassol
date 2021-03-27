@extends('front.base.create')

@section('fields')
    <div class="form-group">
        <label>الاسم <span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="ادخل الاسم" required name="name"
               value="{{old('name')}}"/>
        @include('front.partials.input-error',['e_name'=>"name"])
    </div>
    <div class="form-group">
        <label>البريد الإلكتروني <span class="text-danger">*</span></label>
        <input type="email" class="form-control" placeholder="ادخل البريد الإلكتروني" required
               value="{{old('email')}}"
               name="email"/>
        @include('front.partials.input-error',['e_name'=>"email"])

    </div>

    <div class="form-group">
        <label for="password">كلمة المرور <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور"
               required/>
        @include('front.partials.input-error',['e_name'=>"password"])

    </div>
    <div class="form-group">
        <label for="password_confirmation">تأكيد كلمة المرور <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
               placeholder="تأكيد كلمة المرور"
               required/>
    </div>
@endsection

@push('scripts')
@endpush

