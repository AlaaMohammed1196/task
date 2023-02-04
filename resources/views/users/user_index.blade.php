@extends('layouts.app')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">

                    <!--begin::Heading-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h2 class="text-white font-weight-bold my-2 mr-5">
                            الطلاب
                        </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="#" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                عرض
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->


            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->

                <!--begin::Row-->
                <div class="row">

                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">

                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        الطلاب المشتركون في
                                        -
                                        {{$course->name}}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>الاسم </label>
                                        <input type="text" name="name"  id="name" class="form-control" placeholder="الاسم"/>
                                    </div>

                                    <div class="col-lg-4">
                                        <label> الهاتف</label>
                                        <input type="phone" name="phone"  id="phone" class="form-control" placeholder="الهاتف"/>

                                    </div>

                                    <div class="col-lg-4">
                                        <label> الدرجه العلميه</label>
                                        <input type="text" name="degree"  id="degree" class="form-control" placeholder="الدرجه العلميه"/>

                                    </div>
                                </div>
                                <div class="form-group row">

                                        <input type="hidden" name="course_id"  id="course_id" class="form-control" value="{{$course->id}}"/>
                                    <div class="col-lg-4">
                                        <button class="form-control btn btn-primary"  id="btnsearch" onclick="search()" style="margin-top: 27px">بحث </button>
                                    </div>

                                </div>

                                <div class="table-responsive appendData">

                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->

                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">التقيم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="createRate">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-12 form-group">
                                <label>السوره</label>
                                <select class="form-control select2 section" name="section" id="section" style="width: 100% !important;direction: rtl">
                                    <option value="" >أختر السوره</option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->section}}">{{$section->section}}</option>
                                        @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 form-group begin_aiyaText">

                            </div>
                            <div class="col-lg-6 form-group end_aiyaText">

                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col-lg-6 form-group">
                                <label>عدد الاوجه</label>
                             <input type="number"  readonly name="wageh" id="wageh" class="form-control">
                            </div>

                            <div class="col-lg-6 form-group">
                                <label>التقييم</label>
                             <input type="number" name="value" class="form-control">
                             <input type="hidden" name="course_id" id="course" class="form-control">
                             <input type="hidden" name="user_id" id="user_id" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                            ألغاء
                        </button>
                        <button type="submit" class="btn btn-primary font-weight-bold" id="btnSubmit" style="width: 85px">حفظ
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



@endsection

@push('js')
    <script src="{{url('/dashboard')}}/assets/js/pages/crud/users_subscribe.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '.rate', function (e) {
                e.preventDefault();
                var user_id = $(this).attr('user_id');
                var course_id = $(this).attr('course_id');

                //alert(course_id);
                $('#user_id').val(user_id);
                $('#course').val(course_id);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#createRate").submit(function (e) {
                $.ajax({
                    type: "POST",
                    url: '{{route('rate.store')}}',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#btnSubmit').addClass('spinner');
                    },
                    complete: function () {
                        $('#btnSubmit').removeClass('spinner');

                    },
                    success: function (response) {
                        if (response.errors) {
                            jQuery.each(response.errors, function (key, value) {
                                toastr.error(value);
                            });
                        } else {
                            toastr.success('تم التقييم بنجاح');
                            $('#exampleModal').modal("hide");
                            $('#createForm').trigger("reset");
                            render();
                        }
                    },
                    error: function (reject) {
                        if (reject.status === 422) {
                            var reponse = $.parseJSON(reject.responseText);
                            jQuery.each(reponse.errors, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                });

                e.preventDefault();
            });
        });
    </script>
    <script>
        $(document).ready(function () {

                $('body').on('change', '.section', function (e) {
                $.ajax({
                    type: "get",
                    url: '{{route('get.begin_aiya')}}',
                    data: {
                        'section':$(this).val()
                    },
                    success: function (response) {
                     $('.begin_aiyaText').html(response);
                        $('.select2').select2({
                            width:"100%",
                        });
                        $('#end_aiya').val();
                    },


                });
                m.preventDefault();
            });

        });
    </script>
    <script>
        $(document).ready(function () {

                $('body').on('change', '.begin_aiya', function (e) {
                $.ajax({
                    type: "get",
                    url: '{{route('get.end_aiya')}}',
                    data: {
                        'section':$('.section').val(),
                        'begin_aiya':$(this).val(),
                    },
                    success: function (response) {
                     $('.end_aiyaText').html(response);
                        $('.select2').select2({
                            width:"100%",
                        });
                        $('#wageh').val();
                    },

                });
                m.preventDefault();
            });

        });
    </script>
    <script>
        $(document).ready(function () {

                $('body').on('change', '.end_aiya', function (e) {
                    $('#wageh').val();
                $.ajax({
                    type: "get",
                    url: '{{route('get.wageh')}}',
                    data: {
                        'section':$('.section').val(),
                        'begin_aiya':$('.begin_aiya').val(),
                        'end_aiya':$(this).val(),
                    },
                    success: function (response) {
                        console.log(response.wageh);
                     $('#wageh').val(response.wageh);
                        $('.select2').select2({
                            width:"100%",
                        });

                    },

                });
                m.preventDefault();
            });

        });
    </script>

@endpush

