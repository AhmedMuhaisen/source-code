@php
    
@endphp
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ white_logo(@base_settings('white_logo')) }}" alt="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <!-- parent menu list start  -->
        <ul class="nav">


            <li class="nav-item {{ set_active(route('admin.dashboard')) }} mb-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">{{ _trans('common.Dashboard') }}</span>
                </a>
            </li>






            <!-- start Service Menu -->
            @if (hasPermission('sales_products_menu'))
                <li class="nav-item  {{ menu_active_by_route(['service/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#service" role="button"
                        aria-expanded="{{ menu_active_by_route(['service.index']) }}" aria-controls="service">
                        <i class="link-icon" data-feather="list"></i>
                        <span class="link-title">{{ _trans('common.Services') }}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ set_active(['service/*']) }}" id="service">
                        <ul class="nav sub-menu">

                            @if (hasPermission('sales_products_menu'))
                                <li class="nav-item {{ menu_active_by_route(['service.index']) }}">
                                    <a class="nav-link" href="{{ route('service.index') }}">
                                        <span> {{ _trans('common.Services') }}</span> </a>
                                </li>
                            @endif

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('additional-services') }}">
                                    <span> {{ _trans('common.Additional Services') }}</span> </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('errors') }}">
                                    <span> {{ _trans('common.Services Option') }}</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>

            @endif
            <!-- end Service Menu -->

            <!-- start Trainer -->
            @if (hasPermission('sales_product_supplier_menu'))
                <li class="nav-item {{ menu_active_by_route(['trainer.index']) }}">
                    <a href="{{ route('trainer.index') }}" class="nav-link {{ set_active(route('trainer.index')) }}">
                        <i class="link-icon" data-feather="award"></i>
                        <span class="link-title">{{ _trans('common.Trainer') }}</span>
                    </a>
                </li>
            @endif
            <!-- end Trainer -->


            {{-- superadmin sidebar --}}
            @if (hasPermission('company_read') && config('app.APP_BRANCH') != 'nonsaas')
                <li class="sidebar-menu-item">
                    <a href="javascript:void(0)" class="parent-item-content has-arrow">


                        <span class="on-half-expanded">
                            {{ _trans('common.Company') }}
                        </span>
                    </a>
                    <ul class="child-menu-list {{ set_active(['dashboard/companies*']) }}">
                        @if (hasPermission('company_read'))
                            <li class="sidebar-menu-item {{ menu_active_by_route(['dashboard/companies*']) }}">
                                <a href="{{ route('company.index') }}"
                                    class="  {{ set_active(route('company.index')) }}">
                                    <span>{{ _trans('common.Company List') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif




            <!-- Start POS list /saleSale.pos -->
            @if (hasPermission('sales_pos_menu'))
                <li class="nav-item {{ menu_active_by_route(['saleSale.pos']) }}">
                    <a href="" class="nav-link {{ set_active(route('saleSale.pos')) }}">
                        <i class="link-icon" data-feather="tag"></i>
                        <span class="link-title">{{ _trans('common.Stores') }}</span>
                    </a>
                </li>
            @endif
            <!-- End POS list -->
            <!-- start Product Menu -->
            @if (hasPermission('sales_products_menu'))
                <li class="nav-item  ">
                    <a href="{{ route('errors') }}" class="nav-link  ">
                        <i class="link-icon" data-feather="bookmark"></i>
                        <span class="link-title"> {{ _trans('common.Booking') }}</span>

                    </a>
                </li>
            @endif
            <!-- end Product Menu -->

            {{-- Start Client Module --}}
            @include('backend.client.sidebar')
            {{-- End Client Module --}}

            <!-- start Product Menu -->
            @if (hasPermission('sales_products_menu'))
                <li class="nav-item ">
                    <a href=" " class="nav-link">
                        <i class="link-icon" data-feather="package"></i>
                        <span class="link-title"> {{ _trans('common.Packages') }}</span>

                    </a>
                </li>
            @endif

            @if (hasPermission('sales_products_menu'))
                <li class="nav-item ">
                    <a href=" " class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title"> {{ _trans('common.Orders') }}</span>

                    </a>
                </li>
            @endif



            @if (hasPermission('sales_products_menu'))
                <li class="nav-item ">
                    <a href="{{ route('errors') }}" class="nav-link">
                        <i class="link-icon" data-feather="shield"></i>
                        <span class="link-title"> {{ _trans('common.promotions') }}</span>

                    </a>
                </li>
            @endif

            @if (hasPermission('sales_products_menu'))
                <li class="nav-item ">
                    <a href="{{ route('errors') }}" class="nav-link">
                        <i class="link-icon" data-feather="gift"></i>
                        <span class="link-title"> {{ _trans('common.Coupons') }}</span>

                    </a>
                </li>
            @endif

            @if (hasPermission('support_menu'))
                <li class="nav-item  {{ set_menu([route('supportTicket.index', 'supportTicket.create')]) }} mb-1">
                    <a class="nav-link" data-bs-toggle="collapse" href="#support" role="button"
                        aria-expanded="{{ menu_active_by_route(['supportTicket.index', 'supportTicket.create', 'supportTicket.reply']) }}"
                        aria-controls="support">
                        <i class="link-icon" data-feather="alert-circle"></i>
                        <span class="link-title">{{ _trans('common.Support') }}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ set_active(['hrm/support/ticket*']) }}" id="support">
                        <ul class="nav sub-menu">

                            @if (hasPermission('support_read'))
                                <li class="nav-item {{ menu_active_by_route(['supportTicket.index']) }}">
                                    <a class="nav-link" href="{{ route('supportTicket.index') }}">
                                        <span> {{ _trans('common.Tickets') }}</span> </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            {{-- @if (hasPermission('announcement_menu'))
                <li
                    class="sidebar-menu-item  {{ set_menu([route('notice.index', 'notice.create', 'notice.edit')]) }} ">
                    <a href="javascript:void(0)"
                        class="parent-item-content has-arrow {{ menu_active_by_route(['notice.index', 'notice.create', 'notice.edit']) }}">
                        <i class="las la-bullhorn"></i>
                        <span class="on-half-expanded">
                            {{ _trans('common.Announcement') }}

                        </span>
                    </a>
                    <ul class="child-menu-list  {{ set_active(['announcement/*', 'dashboard/announcement/*']) }}">

                        @if (hasPermission('notice_menu'))
                            <li class="nav-item  {{ menu_active_by_route(['notice.create', 'notice.edit']) }} ">
                                <a href="{{ route('notice.create') }}" class="">
                                    <span>{{ _trans('common.Create Notice') }}</span> <span
                                        class="badge badge-info d-none fs-6 p-s">5</span> </a>
                            </li>
                        @endif
                        @if (hasPermission('notice_menu'))
                            <li class="nav-item  {{ menu_active_by_route(['notice.index']) }} ">
                                <a href="{{ route('notice.index') }}" class="">
                                    <span>{{ _trans('common.Notice') }}</span> </a>
                            </li>
                        @endif

                        @if (hasPermission('send_email_menu'))
                            <li class="nav-item d-none">
                                <a href="#" class="">
                                    <span>{{ _trans('common.Send E-mail') }}</span> </a>
                            </li>
                        @endif
                        @if (hasPermission('send_notification_menu'))
                            <li class="nav-item d-none">
                                <a href="#" class="">
                                    <span>{{ _trans('common.Send Notification') }}</span> </a>
                            </li>
                        @endif
                    </ul>
                </li>
     
            @endif --}}
            @if (hasPermission('contact_menu'))
                @if (auth()->user()->role_id == 1 || Config::get('app.APP_BRANCH') == 'nonsaas')
                    <li class="sidebar-menu-item d-none mb-1">
                        <a href="{{ route('contact.index') }}"
                            class="parent-item-content {{ menu_active_by_route(['contact.index']) }}">
                            <i class="las la-inbox"></i>
                            <span class="on-half-expanded">
                                {{ _trans('common.Contacts') }}
                            </span>
                        </a>
                    </li>
                @endif
            @endif


            @if (hasPermission('report'))
                <li class="nav-item  {{ set_menu([route('attendanceReport.index')]) }} mb-1">
                    <a class="nav-link" data-bs-toggle="collapse" href="#report" role="button"
                        aria-expanded=" {{ menu_active_by_route(['live_trackingReport.index', 'attendanceReport.index', 'breakReport.index', 'payment.index', 'report_visit.index', 'report_leave']) }}"
                        aria-controls="report">
                        <i class="link-icon" data-feather="check-circle"></i>
                        <span class="link-title">{{ _trans('common.Report') }}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ set_active(['hrm/report/*', 'hrm/break/*', 'hrm/expense/payment']) }}"
                        id="report">


                        <ul class="nav sub-menu ">

                            @if (hasPermission('attendance_report_read'))
                                <li class="nav-item {{ menu_active_by_route(['live_trackingReport.index']) }}">
                                    <a href="{{ route('live_trackingReport.index') }}"
                                        class="nav-link {{ set_active(route('live_trackingReport.index')) }}">
                                        <span>{{ _trans('common.Live Tracking') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ menu_active_by_route(['live_trackingReportHistory.index']) }}">
                                    <a href="{{ route('live_trackingReportHistory.index') }}"
                                        class="nav-link {{ set_active(route('live_trackingReportHistory.index')) }}">
                                        <span>{{ _trans('common.Location History') }}</span>
                                    </a>
                                </li>
                            @endif



                            @if (hasPermission('payment_read'))
                                <li class="nav-item {{ menu_active_by_route(['payment.index']) }}">
                                    <a href="{{ route('payment.index') }}"
                                        class=" {{ set_active(route('payment.index')) }}">
                                        <span>{{ _trans('common.Payment Report') }}</span>
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </li>
            @endif

            @if (hasPermission('general_settings_read'))
                <li
                    class="nav-item {{ menu_active_by_route(['manage.settings.view', 'appScreenSetup', 'ipConfig.create', 'language.index', 'language.setup']) }} mb-1">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Settings" role="button"
                        aria-expanded="{{ menu_active_by_route(['manage.settings.view', 'appScreenSetup', 'ipConfig.create', 'language.index', 'language.setup']) }}"
                        aria-controls="settings">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">{{ _trans('common.Settings') }}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse  {{ set_active(['admin/settings*', 'admin/settings/list', 'admin/settings/leave*', 'admin/settings/ip-configuration*', 'company/settings', 'admin/settings/app-setting/dashboard', 'admin/settings/language-setup']) }}"
                        id="settings">
                        <ul class="nav sub-menu">
                            @if (hasPermission('general_settings_read'))
                                <li class="nav-item {{ menu_active_by_route('manage.settings.view') }}">
                                    <a href="{{ route('manage.settings.view') }}"
                                        class="nav-link {{ set_active('admin/settings/list') }}">
                                        <span>{{ _trans('common.General Settings') }}</span>
                                    </a>
                                </li>
                            @endif

                            {{-- get config file value --}}
                            @if (auth()->user()->role_id == 1 || Config::get('app.APP_BRANCH') == 'nonsaas')
                                @if (hasPermission('app_settings_menu'))
                                    <li class="nav-item {{ menu_active_by_route('appScreenSetup') }}">
                                        <a href="{{ route('appScreenSetup') }}"
                                            class="nav-link {{ set_active('admin/settings/contact/*') }}">
                                            <span>{{ _trans('common.App Setting') }}</span>
                                        </a>
                                    </li>
                                @endif



                                @if (hasPermission('language_menu'))
                                    <li
                                        class="nav-item {{ menu_active_by_route(['language.index', 'language.setup']) }}">
                                        <a href="{{ route('language.index') }}"
                                            class="nav-link {{ set_active('admin/settings/language/*') }}">
                                            <span>{{ _trans('common.Language') }}</span>
                                        </a>
                                    </li>
                                @endif


                            @endif
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
        <!-- parent menu list end  -->
    </div>





</nav>
