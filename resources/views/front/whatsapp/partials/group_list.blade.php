<!--begin::Body-->
<div class="card-body p-0">
    <!--begin::Responsive container-->
    <div class="table-responsive">
        <!--begin::Items-->
        <h2>المجموعات
            <div style="width: 100px;float: left;font-size: 16px;font-weight: normal">
                <span class="managed" data-init="{{$managedGroups->count()}}">{{$managedGroups->count()}}</span>
                /
                <span class="max-group"
                      data-max="{{$user->getMaxGroupsManage()}}">{{$user->getMaxGroupsManage()}}</span>
            </div>
        </h2>

        <div class="list list-hover" data-inbox="list" style="height: 60vh;overflow-y: scroll">
            <!--begin::Item-->

            @php($groupIdsManaged=$managedGroups->pluck('id')->toArray())
            @foreach($groups as $group)
                <label for="recipients_id-{{$group->id}}" class="d-block w-100">
                    <div class="d-flex align-items-start list-item card-spacer-x py-4" data-inbox="message">
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center mr-3" data-inbox="actions">
                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
                                    <input type="checkbox" name="groups_id[]"
                                           {{in_array($group->id,$groupIdsManaged)?"checked disabled":"class=recipients_id"}}
                                           value="{{$group->id}}" id="recipients_id-{{$group->id}}"/>
                                    <span></span>
                                </label>

                                <!--end::Checkbox-->
                                <div class="symbol symbol-circle symbol-50 mr-3">
                                    <img alt="{{$group->status}}" src="{{$group->getImage()}}">
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Info-->
                        <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                            <!--begin::Title-->
                            <div class="font-weight-bolder mr-2">{{$group->subject}}</div>
                            <!--end::Title-->

                        </div>
                        <!--end::Info-->

                    </div>
                </label>
                <!--end::Item-->
        @endforeach

        <!--end::Items-->
        </div>
        <!--end::Responsive container-->

    </div>
</div>
<!--end::Body-->