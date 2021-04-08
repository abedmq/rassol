<div class=" inline-msg-item-wrap d-flex flex-column mb-5 align-items-start message-item">
    <div class="d-flex align-items-center">
        <div>
            <a href="#"
               class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                {{auth()->user()->detail->whatsapp_name}}
            </a>
            <span class="text-muted font-size-sm">{{$message->created_at->diffForHumans()}}</span>
        </div>
    </div>
    <div class="inline-msg-item msg-right mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
        @if($message->type=='image')
            <img src="{{$message->getImage()}}" style="width: 20px;height:20px;margin-right: 3px" alt="">
        @endif

        {!! $message->getText() !!}

        @if(!$message->deleted_at)
            <div class="dropdown dropdown-inline">
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor icon-md"></i>
                </button>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                    <!--begin::Navigation-->
                    <ul class="navi navi-hover py-5">
                        <li class="navi-item">
                            <a href="{{route('whatsapp.revoke',$message->id)}}"
                               data-callback="loadMsgs"
                               class="navi-link delete-msg">
                                        <span class="navi-icon">
                                            <i class="flaticon-delete"></i>
                                        </span>
                                <span class="navi-text">حذف</span>
                                <i class="fa fa-spinner fa-spin loader" style="display: none;"></i>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-list-3"></i>
                                            </span>
                                <span class="navi-text">تعديل</span>
                            </a>
                        </li>

                    </ul>
                    <!--end::Navigation-->
                </div>
            </div>
    @endif
    <!--end::Dropdown Menu-->
    </div>
    <div class="msg-groups">
        @foreach($message->groups as $group)
            <div class="group-image">
                <a href="{{route('whatsapp.chats',$group->id)}}" title="{{$group->subject}}">
                    <img src="{{$group->getImage()}}" width="100%" alt="">
                </a>
            </div>
        @endforeach
    </div>
    @if($message->deleted_at)
        <p style="color:red;">تم حذف الرسالة قبل
            <span>{{$message->deleted_at->diffForHumans()}}</span>
        </p>
    @else

    @endif

</div>