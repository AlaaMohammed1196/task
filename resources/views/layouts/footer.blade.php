<!--begin::Footer-->
<div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
    <!--begin::Container-->
    <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2022&copy;Alaa Mohammed</span>
            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Footer</a>
        </div>
        <!--end::Copyright-->


    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->









<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->

<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{url('/dashboard')}}/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="{{url('/dashboard')}}/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="{{url('/dashboard')}}/assets/js/scripts.bundle.js?v=7.0.6"></script>

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>


<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{url('/dashboard')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{url('/dashboard')}}/assets/js/pages/crud/datatables/basic/scrollable.js?v=7.0.6"></script>
<!--end::Page Scripts-->



<!--begin::Page Scripts(used by this page)-->
<script src="{{url('/dashboard')}}/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.6"></script>
<!--end::Page Scripts-->

<script>
    var KTAppSettings = {};
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


{{--<script src="https://fnrco.org/assets/summernote-cleaner.js"></script>--}}


{{--<script>--}}


{{--    // Class definition--}}
{{--    var KTFormRepeater = function () {--}}
{{--        // Private functions--}}
{{--        var demo1 = function () {--}}
{{--            $('#kt_repeater_1 , #kt_repeater_2').repeater({--}}
{{--                initEmpty: false,--}}
{{--                defaultValues: {--}}
{{--                    'text-input': 'foo'--}}
{{--                },--}}
{{--                show: function () {--}}
{{--                    $(this).slideDown();--}}
{{--                    KTSummernoteDemo.init();--}}

{{--                },--}}
{{--                hide: function (deleteElement) {--}}
{{--                    $(this).slideUp(deleteElement);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        return {--}}
{{--            // public functions--}}
{{--            init: function () {--}}
{{--                demo1();--}}
{{--            }--}}
{{--        };--}}
{{--    }();--}}
{{--    jQuery(document).ready(function () {--}}
{{--        KTFormRepeater.init();--}}
{{--    });--}}

{{--    $(document).ready(function () {--}}
{{--        new KTImageInput('kt_image_5');--}}

{{--        $('#kt_select2_2222211').select2({--}}
{{--            tags: true,--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}


{{--<script>--}}
{{--    // Class definition--}}

{{--    var KTSummernoteDemo = function () {--}}
{{--        // Private functions--}}
{{--        var demos = function () {--}}
{{--            $('.summernote').summernote({--}}
{{--                height: 150,--}}
{{--                toolbar:[--}}
{{--                    ['cleaner',['cleaner']], // The Button--}}
{{--                    ['style',['style']],--}}
{{--                    ['font',['bold','italic','underline','clear']],--}}
{{--                    ['fontname',['fontname']],--}}
{{--                    ['color',['color']],--}}
{{--                    ['para',['ul','ol','paragraph']],--}}
{{--                    ['height',['height']],--}}
{{--                    ['table',['table']],--}}
{{--                    ['insert',['media','link','hr']],--}}
{{--                    ['view',['fullscreen','codeview']],--}}
{{--                    ['help',['help']]--}}
{{--                ],--}}
{{--                cleaner:{--}}
{{--                    action: 'paste',--}}
{{--                    newline: '<br>',--}}
{{--                    icon: '<i class="note-icon">[Your Button]</i>',--}}
{{--                    keepHtml: false,--}}
{{--                    keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'],--}}
{{--                    keepClasses: false,--}}
{{--                    badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'],--}}
{{--                    badAttributes: ['style', 'start'],--}}
{{--                    limitChars: false,--}}
{{--                    limitDisplay: 'both',--}}
{{--                    limitStop: false--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        return {--}}
{{--            // public functions--}}
{{--            init: function () {--}}
{{--                demos();--}}
{{--            }--}}
{{--        };--}}
{{--    }();--}}

{{--    // Initialization--}}
{{--    jQuery(document).ready(function () {--}}
{{--        KTSummernoteDemo.init();--}}
{{--    });--}}
{{--</script>--}}
@stack('js')
