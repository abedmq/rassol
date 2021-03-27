<!--begin::Body-->
<div class="card-body p-0">
    <!--begin::Responsive container-->
    <div class="table-responsive" >
        <!--begin::Items-->
        <div class=" form-group">
            <label for="">اسم المجموعة</label>
            <input type="text" required name="subject" class="form-control " placeholder="اسم المجموعة"/>
        </div>
        <h2>اعضاء المجموعة</h2>

        <div class="list list-hover" data-inbox="list" style="height: 60vh;overflow-y: scroll">
            <!--begin::Item-->

            @foreach($contacts as $contact)
                <label for="recipients_id-{{$contact->id}}" class="d-block w-100">
                    <div class="d-flex align-items-start list-item card-spacer-x py-4" data-inbox="message">
                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center">
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center mr-3" data-inbox="actions">
                                <!--begin::Checkbox-->
                                <label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
                                    <input type="checkbox" name="recipients_id[]" class="recipients_id"
                                           value="{{$contact->id}}" id="recipients_id-{{$contact->id}}"/>
                                    <span></span>
                                </label>
                                <!--end::Checkbox-->
                                <div class="symbol symbol-circle symbol-50 mr-3">
                                    <img alt="{{$contact->status}}" src="{{$contact->getImage()}}">
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Info-->
                        <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                            <!--begin::Title-->
                            <div class="font-weight-bolder mr-2">{{$contact->getMobile()}}</div>
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