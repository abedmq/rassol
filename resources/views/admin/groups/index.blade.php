@extends('admin.base.index',['options'=>false])

@section('filter')

@endsection


@section('column')
    <script>
        let column = [
            {
                field: 'subject',
                title: 'الاسم',
            },
            {
                title: 'عدد الاعضاء',
                field:'contacts_count'
            },
        ]
    </script>
@endsection