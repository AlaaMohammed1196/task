<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>Login</title>

    <meta name="description" content="Test Task"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{url('dashboard')}}/assets/css/pages/login/classic/login-1.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url('dashboard')}}/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="{{url('dashboard')}}/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="{{url('dashboard')}}/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>

    <style>
        html, body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(/dashboard/assets/media/bg/bggg.png);">
            <!--begin: Aside Container-->
            <div class="d-flex flex-row-fluid flex-column justify-content-between">
                <!--begin: Aside header-->
                <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                    <img src="#" class="max-h-70px" alt=""/>
                </a>
                <!--end: Aside header-->

                <!--begin: Aside content-->
                <div class="flex-column-fluid d-flex flex-column justify-content-center">
                    <h3 class="font-size-h1 mb-5 text-white">تسجيل الدخول </h3>
                    <p class="font-weight-lighter text-white opacity-80">
                        لوحه التحكم
                    </p>
                </div>
                <!--end: Aside content-->

                <!--begin: Aside footer for desktop-->
                <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                    <div class="opacity-70 font-weight-bold	text-white">
                        &copy;
                    </div>

                </div>
                <!--end: Aside footer for desktop-->
            </div>
            <!--end: Aside Container-->
        </div>
        <!--begin::Aside-->

        <!--begin::Content-->
        <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
            <!--begin::Content header-->

            <!--end::Content header-->

            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1">تسجيل </h3>
{{--                        <p class="text-muted font-weight-bold">Enter Password Or Mail</p>--}}
                    </div>

                    <!--begin::Form-->
                    <form class="form">
                        @csrf
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-5 px-6"   type="email" placeholder="البريد الألكتروني" name="email" />
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-solid h-auto py-5 px-6"  required type="password" placeholder="كلمه المرور" name="password"/>
                        </div>

                        <input class="form-control form-control-solid h-auto py-5 px-6"   type="hidden"  name="guard" value="admin"/>


                        <!--begin::Action-->
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">

                            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold spinner-white spinner-right">تسجيل</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->




            </div>
            <!--end::Content body-->

            <!--begin::Content footer for mobile-->
            <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                    &copy; 2022
                </div>

            </div>
            <!--end::Content footer for mobile-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>

<script src="{{url('dashboard')}}/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="{{url('dashboard')}}/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="{{url('dashboard')}}/assets/js/scripts.bundle.js?v=7.0.6"></script>
<script src="{{url('dashboard')}}/assets/js/pages/custom/login/login-general.js?v=7.0.6"></script>
<script>
    $(document).ready(function () {
        $(".form").submit(function (m) {
            $.ajax({
                type: "POST",
                url: '{{route('doLogin')}}',
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#kt_login_signin_submit').addClass('spinner');
                },
                complete: function () {
                    $('#kt_login_signin_submit').removeClass('spinner');
                },
                success: function (response) {
                    if (response.errors) {
                        jQuery.each(response.errors, function (key, value) {
                            toastr.error(value);
                        });
                    } else {
                        toastr.success('تم تسجيل الدخول بنجاح.');
                        window.location='/admin/adminPanel'
                    }
                },
                error: function (response) {
                    console.log(response.message);

                    if (response.errors) {
                        jQuery.each(response.errors, function (key, value) {
                            toastr.error(value);
                        });
                    }
                },


            });
            m.preventDefault();
        });

    });
</script>
</body><!--end::Body-->



</html>
