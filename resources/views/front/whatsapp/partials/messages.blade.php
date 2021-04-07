<!--begin::Scroll-->
<div class="scroll scroll-pull" data-mobile-height="350">
    <!--begin::Messages-->
    <div class="messages">
    @foreach($messages->sortBy('id') as $message)
        <!--begin::Message In-->
            @include('front.whatsapp.partials.single_message',['message'=>$message])
            <!--end::Message In-->
        @endforeach
    </div>
    <!--end::Messages-->
</div>
<!--end::Scroll-->