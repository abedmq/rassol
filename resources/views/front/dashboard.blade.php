@extends('layout.front.app')

@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Advance Table Widget 9-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">المجموعات</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">تفاصيل المجموعات</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#"
                           class="btn btn-danger font-weight-bolder font-size-sm">انشاء</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center table-head-bg table-borderless">
                                <thead>
                                <tr class="text-left">
                                    <th style="min-width: 250px" class="pl-7">
                                        <span class="text-dark-75">المجموعة</span>
                                    </th>
                                    <th style="min-width: 120px">المالك</th>
                                    <th style="min-width: 120px">عدد المشرفين</th>
                                    <th style="min-width: 100px">عدد الأعضاء</th>
                                    <th style="min-width: 100px">عدد الرسائل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(auth()->user()->groupsManage as $group)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="{{$group->getImage()}}"
                                                                                         class="h-75 align-self-end"
                                                                                         alt=""/>
																				</span>
                                                </div>
                                                <div>
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                        {{$group->subject}}
                                                    </a>
                                                    {{--                                                    <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>--}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$group->owner}}</span>
                                            {{--                                            <span class="text-muted font-weight-bold">In Proccess</span>--}}
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$group->admins()->count()}} مشرف </span>
                                            <span class="text-muted font-weight-bold">{{$group->managers()->count()}} مدير</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$group->contacts()->count()}} عضو</span>
                                            {{--                                            <span class="text-muted font-weight-bold">Web, UI/UX Design</span>--}}
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$group->messages()->count()}} رسالة</span>
                                            {{--                                            <span class="text-muted font-weight-bold">Web, UI/UX Design</span>--}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 9-->
        </div>
    </div>
    <!--end::Row-->


    <div class="row">
        <div class="col-xl-4">
            <!--begin::Mixed Widget 4-->
            <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#"
                               class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-header pb-1">
                                        <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
                                            <span class="navi-text">Order</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
                                            <span class="navi-text">Event</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
                                            <span class="navi-text">Report</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
                                            <span class="navi-text">Post</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
                                            <span class="navi-text">File</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Chart-->
                    <div id="kt_mixed_widget_4_chart" style="height: 200px"></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-spacer bg-white card-rounded flex-grow-1">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col px-8 py-6 mr-8">
                                <div class="font-size-sm text-muted font-weight-bold">Average Sale
                                </div>
                                <div class="font-size-h4 font-weight-bolder">$650</div>
                            </div>
                            <div class="col px-8 py-6">
                                <div class="font-size-sm text-muted font-weight-bold">Commission
                                </div>
                                <div class="font-size-h4 font-weight-bolder">$233,600</div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col px-8 py-6 mr-8">
                                <div class="font-size-sm text-muted font-weight-bold">Annual Taxes
                                </div>
                                <div class="font-size-h4 font-weight-bolder">$29,004</div>
                            </div>
                            <div class="col px-8 py-6">
                                <div class="font-size-sm text-muted font-weight-bold">Annual
                                    Income
                                </div>
                                <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 4-->
        </div>
        @if(auth()->user()->isAdmin())
            <div class="col-xl-8">
                <!--begin::Base Table Widget 6-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">مشرفي الواتساب</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">احصائيات عاملة لمشرفي الواتساب</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables6">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_tab_pane_6_1" role="tabpanel"
                                 aria-labelledby="kt_tab_pane_6_1">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    @if(auth()->user()->users->count())
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-150px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-70px"></th>
                                                {{--                                            <th class="p-0 min-w-70px"></th>--}}
                                                <th class="p-0 min-w-50px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(auth()->user()->users as $user)
                                                <tr>
                                                    <td class="pl-0">
                                                        <div class="symbol symbol-50 symbol-light mr-2 mt-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/avatars/043-boy-18.svg"
                                                                                         class="h-75 align-self-end"
                                                                                         alt=""/>
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                            {{$user->email}}
                                                        </a>
                                                        <span class="text-muted font-weight-bold d-block">{{$user->detail->whatsapp_name??''}}</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-right">
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                        {{$user->messages()?$user->messages()->count():0}}
                                                    </span>
                                                    </td>
                                                    {{--                                                <td class="text-right">--}}
                                                    {{--                                                    <span class="font-weight-bolder text-info">+230%</span>--}}
                                                    {{--                                                </td>--}}
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="text-danger">
                                            لا يوجد مشرفين
                                        </p>
                                    @endif
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->

                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Base Table Widget 6-->
            </div>
        @endif
    </div>

    <!--end::Row-->

    <!--begin::Row-->
    <div class="row">
        <div class="col-xl-6">
            <!--begin::List Widget 10-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Notifications</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#"
                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-ver"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <!--begin::Naviigation-->
                                <ul class="navi">
                                    <li class="navi-header font-weight-bold py-5">
                                        <span class="font-size-lg">Add New:</span>
                                        <i class="flaticon2-information icon-md text-muted"
                                           data-toggle="tooltip" data-placement="right"
                                           title="Click to learn more..."></i>
                                    </li>
                                    <li class="navi-separator mb-3 opacity-70"></li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
                                            <span class="navi-text">Order</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-calendar-8"></i>
																		</span>
                                            <span class="navi-text">Members</span>
                                            <span class="navi-label">
																			<span class="label label-light-danger label-rounded font-weight-bold">3</span>
																		</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-telegram-logo"></i>
																		</span>
                                            <span class="navi-text">Project</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-new-email"></i>
																		</span>
                                            <span class="navi-text">Record</span>
                                            <span class="navi-label">
																			<span class="label label-light-success label-rounded font-weight-bold">5</span>
																		</span>
                                        </a>
                                    </li>
                                    <li class="navi-separator mt-3 opacity-70"></li>
                                    <li class="navi-footer pt-5 pb-4">
                                        <a class="btn btn-light-primary font-weight-bolder btn-sm"
                                           href="#">More options</a>
                                        <a class="btn btn-clean font-weight-bold btn-sm d-none"
                                           href="#" data-toggle="tooltip" data-placement="right"
                                           title="Click to learn more...">Learn more</a>
                                    </li>
                                </ul>
                                <!--end::Naviigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Item-->
                    <div class="mb-6">
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Checkbox-->
                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                <input type="checkbox" value="1"/>
                                <span></span>
                            </label>
                            <!--end::Checkbox-->
                            <!--begin::Section-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                    <!--begin::Title-->
                                    <a href="#"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Daily
                                        Standup Meeting</a>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                    <!--end::Data-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Label-->
                                <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">Approved</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="mb-6">
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Checkbox-->
                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                <input type="checkbox" value="1"/>
                                <span></span>
                            </label>
                            <!--end::Checkbox-->
                            <!--begin::Section-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                    <!--begin::Title-->
                                    <a href="#"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Group
                                        Town Hall Meet-up with showcase</a>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                    <!--end::Data-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Label-->
                                <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="mb-6">
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Checkbox-->
                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                <input type="checkbox" value="1"/>
                                <span></span>
                            </label>
                            <!--end::Checkbox-->
                            <!--begin::Section-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                    <!--begin::Title-->
                                    <a href="#"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Next
                                        sprint planning and estimations</a>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                    <!--end::Data-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Label-->
                                <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Success</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="mb-6">
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Checkbox-->
                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                <input type="checkbox" value="1"/>
                                <span></span>
                            </label>
                            <!--end::Checkbox-->
                            <!--begin::Section-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                    <!--begin::Title-->
                                    <a href="#"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Sprint
                                        delivery and project deployment</a>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                    <!--end::Data-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Label-->
                                <span class="label label-lg label-light-danger label-inline font-weight-bold py-4">Rejected</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="">
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-grow-1">
                            <!--begin::Checkbox-->
                            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                <input type="checkbox" value="1"/>
                                <span></span>
                            </label>
                            <!--end::Checkbox-->
                            <!--begin::Section-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!--begin::Info-->
                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                    <!--begin::Title-->
                                    <a href="#"
                                       class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Data
                                        analytics research showcase</a>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                    <!--end::Data-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Label-->
                                <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end: Item-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: Card-->
            <!--end: List Widget 10-->
        </div>
        <div class="col-xl-6">
            <!--begin::Base Table Widget 1-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Trending Items</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab"
                                   href="#kt_tab_pane_1_1">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab"
                                   href="#kt_tab_pane_1_2">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                   href="#kt_tab_pane_1_3">Day</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2 pb-0 mt-n3">
                    <div class="tab-content mt-5" id="myTabTables1">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel"
                             aria-labelledby="kt_tab_pane_1_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-200px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="py-6 pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">71%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 71%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">50%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-info"
                                                         role="progressbar" style="width: 50%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">65%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 65%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">83%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-success"
                                                         role="progressbar" style="width: 83%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">47%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-primary"
                                                         role="progressbar" style="width: 47%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_1_2" role="tabpanel"
                             aria-labelledby="kt_tab_pane_1_2">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-200px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">83%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-success"
                                                         role="progressbar" style="width: 83%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">47%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-primary"
                                                         role="progressbar" style="width: 47%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="py-6 pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">71%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 71%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">65%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 65%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">50%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-info"
                                                         role="progressbar" style="width: 50%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel"
                             aria-labelledby="kt_tab_pane_1_3">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-200px"></th>
                                        <th class="p-0 min-w-100px"></th>
                                        <th class="p-0 min-w-40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">65%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 65%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">83%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-success"
                                                         role="progressbar" style="width: 83%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">47%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-primary"
                                                         role="progressbar" style="width: 47%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="py-6 pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">71%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger"
                                                         role="progressbar" style="width: 71%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </th>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">50%</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-info"
                                                         role="progressbar" style="width: 50%;"
                                                         aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
            </div>
            <!--end::Base Table Widget 1-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-4">
            <!--begin::List Widget 8-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Trends</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#"
                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-ver"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-header pb-1">
                                        <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
                                            <span class="navi-text">Order</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
                                            <span class="navi-text">Event</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
                                            <span class="navi-text">Report</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
                                            <span class="navi-text">Post</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
                                            <span class="navi-text">File</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Item-->
                    <div class="mb-10">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="front/media/svg/misc/006-plurk.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                   class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Top
                                    Authors</a>
                                <span class="text-muted font-weight-bold">5 day ago</span>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about
                            the top Authors that fits within this section</p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="mb-10">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="front/media/svg/misc/015-telegram.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                   class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Popular
                                    Authors</a>
                                <span class="text-muted font-weight-bold">5 day ago</span>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about
                            the Popular Authors that fits within this section</p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                   class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">New
                                    Users</a>
                                <span class="text-muted font-weight-bold">5 day ago</span>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about
                            the New Users that fits within this section</p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Body-->
            </div>
            <!--end: Card-->
            <!--end::List Widget 8-->
        </div>
        <div class="col-lg-8">
            <!--begin::Base Table Widget 2-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab"
                                   href="#kt_tab_pane_2_1">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab"
                                   href="#kt_tab_pane_2_2">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                   href="#kt_tab_pane_2_3">Day</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2 pb-0 mt-n3">
                    <div class="tab-content mt-5" id="myTabTables2">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_2_1" role="tabpanel"
                             aria-labelledby="kt_tab_pane_2_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-140px"></th>
                                        <th class="p-0 min-w-120px"></th>
                                        <th class="p-0 min-w-40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">4600 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">354 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Python, MySQL</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">7200 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">890 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">6370 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel"
                             aria-labelledby="kt_tab_pane_2_2">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0" style="width: 50px"></th>
                                        <th class="p-0" style="min-width: 150px"></th>
                                        <th class="p-0" style="min-width: 140px"></th>
                                        <th class="p-0" style="min-width: 120px"></th>
                                        <th class="p-0" style="min-width: 40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Python, MySQL</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">7200 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">890 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">6370 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">4600 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">354 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_tab_pane_2_3" role="tabpanel"
                             aria-labelledby="kt_tab_pane_2_3">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th class="p-0" style="width: 50px"></th>
                                        <th class="p-0" style="min-width: 150px"></th>
                                        <th class="p-0" style="min-width: 140px"></th>
                                        <th class="p-0" style="min-width: 120px"></th>
                                        <th class="p-0" style="min-width: 40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/006-plurk.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">4600 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/015-telegram.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Python, MySQL</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">7200 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/003-puzzle.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">890 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/005-bebo.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active
                                                Customers</a>
                                            <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">6370 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					<img src="front/media/svg/misc/014-kickstarter.svg"
                                                                                         class="h-50 align-self-center"
                                                                                         alt=""/>
																				</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller
                                                Theme</a>
                                            <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">354 Users</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="#" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:front/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg"
                                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                         width="24px" height="24px"
                                                                                         viewBox="0 0 24 24"
                                                                                         version="1.1">
																						<g stroke="none"
                                                                                           stroke-width="1" fill="none"
                                                                                           fill-rule="evenodd">
																							<polygon
                                                                                                    points="0 0 24 0 24 24 0 24"/>
																							<rect fill="#000000"
                                                                                                  opacity="0.3"
                                                                                                  transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                  x="11" y="5" width="2"
                                                                                                  height="14" rx="1"/>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                  fill="#000000"
                                                                                                  fill-rule="nonzero"
                                                                                                  transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Base Table Widget 2-->
        </div>
    </div>
    <!--end::Row-->
    <!--end::Dashboard-->
@endsection

@push('scripts')
    <!--begin::Page Vendors(used by this page)-->
    <script src="front/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="front/js/pages/widgets.js"></script>
@endpush