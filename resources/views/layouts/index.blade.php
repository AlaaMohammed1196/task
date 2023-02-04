<!DOCTYPE html>
<html lang="en">
<head>
@include('dashboard.layouts.header')
</head>
<body  id="kt_body" style="background-image: url(/dashboard/assets/media/bg/bg-10.jpg) ;direction: ltr"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >


@yield('content')

@include('dashboard.layouts.footer')

</body>
</html>
