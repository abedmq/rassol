@extends('admin.base.index',['options'=>false])

@section('filter')

@endsection


@section('column')
    <script>
        let column = [
            {
                field: 'mobile',
                title: 'رقم الجوال',
            },
            {
                title: "عدد المستخدمين",
                field: "users_count"
            },
            {
                title: "عدد المجموعات",
                field: "groups_count"
            }
        ]
    </script>
@endsection