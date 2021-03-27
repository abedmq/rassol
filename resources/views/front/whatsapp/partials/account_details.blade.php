<div class="border-bottom mb-5 pb-5">
    <div class="font-weight-bolder mb-3">تفاصيل الحساب</div>
    <div class="line-height-xl">
        الاسم <strong>{{auth()->user()->detail->whatsapp_name??''}}</strong>
        <br/>{{auth()->user()->detail->getMobile()??''}}
    </div>
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="border-bottom mb-5 pb-5">
    <div class="font-weight-bolder mb-3">المجموعات</div>
    <table class="" style="width:100%">
        <tr>
            <td>عدد المجموعات</td>
            <td>{{$user->groups()->admin()->count()}} مجموعة</td>
        </tr>
        <tr>
            <td>عدد المجموعات التي يمكن ادارتها</td>
            <td>{{$user->getMaxGroupsManage()}} مجموعة</td>
        </tr>
        <tr>
            <td>عدد المجموعات التي تديرها</td>
            <td>{{$user->getGroupsManage()->count()}} مجموعة</td>
        </tr>
        <tr>
            <td>عدد المجموعات المتاحة</td>
            <td>{{$user->getMaxGroupsManage()-$user->getGroupsManage()->count()}} مجموعة</td>
        </tr>
    </table>
</div>
<!--end::Item-->