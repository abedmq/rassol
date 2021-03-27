@extends('admin.base.index')

@section('filter')
    <div class="col-md-4 my-2 my-md-0">
        <div class="d-flex align-items-center">
            <label class="mr-3 mb-0 d-none d-md-block">الحالة:</label>
            <select class="form-control" id="kt_datatable_search_status">
                <option value="">All</option>
                <option value="1">Pending</option>
                <option value="2">Delivered</option>
                <option value="3">Canceled</option>
                <option value="4">Success</option>
                <option value="5">Info</option>
                <option value="6">Danger</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 my-2 my-md-0">
        <div class="d-flex align-items-center">
            <label class="mr-3 mb-0 d-none d-md-block">النوع:</label>
            <select class="form-control" id="kt_datatable_search_type">
                <option value="">All</option>
                <option value="1">Online</option>
                <option value="2">Retail</option>
                <option value="3">Direct</option>
            </select>
        </div>
    </div>
@endsection


@php($options=['edit'=>true,'destroy'=>true])
@section('column')
    <script>
        let column = [
            {
                field: 'name',
                title: 'الاسم',
            },
            {
                field: 'email',
                title: 'البريد الإلكتروني',
            },
            // {
            //     title:'الحالة',
            //
            // }
        ]
    </script>
@endsection