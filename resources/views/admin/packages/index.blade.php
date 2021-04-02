@extends('admin.base.index')

@section('filter')
  
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
                field: 'price',
                title: 'السعر',
            },
            {
                field: 'max_group_manage',
                title: 'عدد المجموعات',
            },
            {
                field: 'max_monthly_messages',
                title: 'عدد الرسائل الشهري',
            },
            {
                field: 'max_added_contact',
                title: 'عدد الرسائل الشهري',
            },
        ]
    </script>
@endsection