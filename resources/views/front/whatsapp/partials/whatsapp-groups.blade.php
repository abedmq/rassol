<div class="card card-custom">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin:Search-->
        <div class="input-group input-group-solid" style="height: 50px">
            <div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:front/media/svg/icons/General/Search.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"></path>
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                              fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
            </div>
            <input type="text" class="form-control py-4 h-auto" placeholder="بحث">
        </div>
        <!--end:Search-->
        <!--begin:Users-->
        <div class="mt-7 scroll scroll-pull " id="group-scroll" style="height: 50vh">
            <!--begin:User-->
            @php($userGroupManager=auth()->user()->getGroupsManage()->pluck('id')->toArray())
            @foreach($groups as $group)
                <div class="d-flex align-items-center justify-content-between mb-5 group-wrapper {{$isManage=in_array($group->id,$userGroupManager)?"select-group":""}}">
                    <div class="d-flex align-items-center">
                        <label class="checkbox" for="checkbox-{{$group->id}}">

                            <div class="symbol symbol-circle symbol-50 mr-3">
                                <label class="checkbox checkbox-lg checkbox-inline">
                                    <input type="checkbox" id="checkbox-{{$group->id}}" class="group-checkbox"
                                           {{$isManage?"disabled":""}}
                                           name="groups_id[]" value="{{$group->id}}" {{$isManage?"checked":""}}
                                    >
                                    <span></span>
                                </label>
                            </div>


                            <div class="symbol symbol-circle symbol-50 mr-3">
                                <img alt="{{$group->subject}}" src="{{$group->getImage()}}">
                            </div>
                            <div class="d-flex flex-column">
                                <span
                                        class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">
                                    {{$group->subject}}
                                </span>
                                <span class="text-muted font-weight-bold font-size-sm">{{$group->getCreation()->format('Y-m-d')}}</span>
                            </div>
                        </label>
                    </div>
                    <div class="d-flex flex-column align-items-end">
                        <span class="label label-sm label-success">{{$group->contacts_count}}</span>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!--end::Body-->
</div>