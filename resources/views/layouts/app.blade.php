<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body  id="kt_body" style="background-image: url(/dashboard/assets/media/bg/bg-10.jpg) ;direction: rtl"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >


@yield('content')

@include('layouts.footer')

</body>
</html>
