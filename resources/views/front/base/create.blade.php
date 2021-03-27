@extends('layout.front.app')

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{route($route.'.index')}}">{{$title}}</a>
            </h3>
        </div>
        <!--begin::Form-->
        <form action="{{route($route.'.store')}}" method="post" class="form-validate ajax-form">
            @csrf
            <div class="card-body">
                @yield('fields')
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

