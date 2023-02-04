<meta charset="utf-8"/>
<title>adminPanel</title>
<meta name="description" content="Task Test"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--begin::Fonts-->

{{--<link rel="stylesheet" type="text/css" href="{{url('frontend')}}/css/fonts/stylesheet.css">--}}

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

<!--begin::Page Vendors Styles(used by this page)-->

<link href="{{url('/dashboard')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet"
      type="text/css"/>
<!--<link href="assets/plugins/custom/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css"/>
--><!--end::Page Vendors Styles-->


<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{url('/dashboard')}}/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
<link href="{{url('/dashboard')}}/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet"
      type="text/css"/>


<link href="{{url('/dashboard')}}/assets/css/style.bundle.min.css?v=7.0.6" rel="stylesheet" type="text/css"/>


<!--end::Global Theme Styles-->
<style>
    .header-menu .menu-nav > .menu-item > .menu-link > .menu-arrow {
        display: flex !important;
    }
    .select2{
        direction: rtl;
    }

    /*html, body {*/
    /*    font-family: 'Cairo', sans-serif;*/

    /*}*/

</style>


<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->


<div id="kt_header_mobile" class="header-mobile ">
    <!--begin::Logo-->
    <a href="#">
        <img alt="Logo" src="#" class="logo-default max-h-30px"/>
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">

        <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>

        <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container  d-flex align-items-stretch justify-content-between">
                    <!--begin::Left-->
                    <div class="d-flex align-items-stretch mr-3">
                        <!--begin::Header Logo-->
                        <div class="header-logo">
                            <a href="#">
                                <img alt="Logo" src="#"
                                     class="logo-default max-h-40px"/>
                                <img alt="Logo" src="#"
                                     class="logo-sticky max-h-40px"/>
                            </a>
                        </div>
                        <!--end::Header Logo-->

                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu"
                                 class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default ">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav ">

                                    <li class="menu-item {{(Request::segment(2) == 'adminPanel')? 'menu-item-here':''}}" aria-haspopup="true">
                                        <a href="#" class="menu-link">
                                            <span class="menu-text">لوحه التحكم  </span>
                                        </a>

                                    </li>
                                    @if(auth()->guard('admin')->check())
                                    <li class="menu-item {{(Request::segment(2) == 'teachers')? 'menu-item-here':''}}" aria-haspopup="true">
                                        <a href="{{url('dashboard/teachers')}}" class="menu-link">
                                            <span class="menu-text">المعلمين</span>
                                        </a>

                                    </li>
                                    @endif
                                    @if(auth()->guard('admin')->check())
                                    <li class="menu-item {{(Request::segment(2) == 'users')? 'menu-item-here':''}}" aria-haspopup="true">
                                        <a href="{{url('dashboard/users')}}" class="menu-link">
                                            <span class="menu-text">الطلاب</span>
                                        </a>

                                    </li>
                                    @endif

                                    <li class="menu-item {{(Request::segment(2) == 'courses')? 'menu-item-here':''}}" aria-haspopup="true">
                                        <a href="{{url('dashboard/courses')}}" class="menu-link">
                                            <span class="menu-text">الحلقات</span>
                                        </a>
                                    </li>

                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                    </div>
                    <!--end::Left-->

                    <!--begin::Topbar-->
                    <div class="topbar">

                        <!--begin::User-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                                <div
                                    class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                                    <span
                                        class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">مرحبا,</span>

                                    @if(auth()->guard('admin')->check())
                                    <span  class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{auth()->guard('admin')->user()->name}}</span>
                                    @endif
                                    <span class="symbol symbol-35">
                                          @if(auth()->guard('admin')->check())
	                            <span
                                    class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{substr(auth()->guard('admin')->user()->name,0,1)}}</span>

                                  @endif

                                  @if(auth()->guard('teacher')->check())
                                      <span  class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{auth()->guard('teacher')->user()->name}}</span>
                                  @endif
                                 <span class="symbol symbol-35">
                              @if(auth()->guard('teacher')->check())
                                <span
                                    class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{substr(auth()->guard('teacher')->user()->name,0,1)}}</span>

                            @endif


                                  @if(auth()->guard('web')->check())
                                      <span  class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{auth()->user()->name}}</span>
                                  @endif
                                 <span class="symbol symbol-35">
                              @if(auth()->guard('web')->check())
                                         <span
                                             class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{substr(auth()->user()->name,0,1)}}</span>

                                     @endif
	                        </span>
                                </div>
                            </div>
                            <!--end::Toggle-->

                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu p-0" style="width: 150px">
                                <!--begin::Nav-->
                                <div class="navi navi-spacer-x-0 pt-5">

                                    <div class="navi-footer  px-8 py-5">
                                        @if(auth()->guard('teacher')->check())
                                        <a href="{{url('teachers/logout')}}"
                                           class="btn btn-light-primary btn-block font-weight-bold">تسجيل الخروج</a>
                                            @endif
                                            @if(auth()->guard('admin')->check())
                                                <a href="{{url('dashboard/logout')}}"
                                                   class="btn btn-light-primary btn-block font-weight-bold">تسجيل الخروج</a>
                                            @endif
                                            @if(auth()->guard('web')->check())
                                            <a href="{{url('/logout')}}"
                                                   class="btn btn-light-primary btn-block font-weight-bold">تسجيل الخروج</a>
                                            @endif

                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
