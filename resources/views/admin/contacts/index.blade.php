@extends('admin.base.index',['options'=>false])

@section('filter')
    <div class="col-md-4 my-2 my-md-0">
        <select name="group_id[]" class="form-control " style="width:100%;height: 50px" multiple id="group_id">
            @foreach(\App\Models\Group::whereNotNull('subject')->get() as $group)
                <option value="{{$group->id}}">{{$group->subject}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 my-2 my-md-0">
        <select name="tag_id[]" class="form-control " style="width:100%;height: 50px" multiple id="tag_id">
            @foreach(\App\Models\Tag::get() as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
    </div>
@endsection


@section('column')
    <script>

        let column = [
            {
                field: 'mobile',
                title: 'جهة الاتصال',
                sortable: false,
                width: 250,
                template: function (data) {

                    var output = '';
                    output = '<div class="d-flex align-items-center">\
								<div class="symbol symbol-40 symbol-sm flex-shrink-0">\
									<img class="" src="media/users/100_12.jpg" alt="photo">\
								</div>\
								<div class="ml-4">\
									<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + data.username + '</div>\
									<a href="#" class="text-muted font-weight-bold text-hover-primary">' + data.mobile + '</a>\
								</div>\
							</div>';

                    return output;
                }
            }, {
                field: 'country',
                sortable: false,
                title: 'الدولة',
                template: function (row) {
                    var output = '';

                    output += '<div class="font-weight-bolder font-size-lg mb-0">' + row.country + '</div>';
                    output += '<div class="font-weight-bold text-muted"> +' + row.country_code + '</div>';

                    return output;
                }
            }, {
                field: 'users_count',
                title: 'الاهتمامات',
                template: function (row) {
                    var output = '';

                    tags = '';
                    for (tag of row.tags) {
                        tags += ',' + tag.title;
                    }
                    output += '<div class="font-weight-bold text-muted">' + tags + '</div>';

                    return output;
                }
            }, {
                field: 'groups_count',
                title: 'عدد المجموعات',

            },
        ]
    </script>
@endsection
@push('scripts')
    <script>
        $('#group_id').select2({
            placeholder: "اختر المجموعة"
        });
        $('#tag_id').select2({
            placeholder: "اختر الاهتمام"
        });

        $('#group_id').on('change', function () {
            datatableTable.search($(this).val(), 'group_id');
        });
        $('#tag_id').on('change', function () {
            datatableTable.search($(this).val(), 'tag_id');
        });
    </script>
@endpush