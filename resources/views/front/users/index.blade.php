@extends('front.base.index')

@section('filter')

@endsection


@section('column')
    <script>
        let column = [
            {
                field: 'name',
                title: 'الاسم',
            },
            {
                field: 'mobile',
                title: 'رقم الجوال',
            },
            {
                field: 'active_at',
                template: function (row) {

                    return row.active_at ? "مفعل" : "بانتظار التفعيل";
                    // return 'asd';
                },
                title: 'حالة المستخدم',
            },
            {
                field: 'email',
                title: 'البريد الإلكتروني',
            },
        ]
    </script>
@endsection