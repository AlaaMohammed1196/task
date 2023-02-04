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
                            تعديل الحلقه

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
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                لوحه التحكم </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('dashboard.course')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                الحلقات

                            </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                تعديل
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

                <div class="row">

                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">

                            <form class="form" id="TeacherCreator">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="card-body">
                                    <div class="form-group row">

                                        <div class="col-lg-4 mb-4">
                                            <label>الاسم</label>
                                            <input type="text" name="name" placeholder="أسم الحلقه" class="form-control" value="{{$course->name}}">
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label> المعلم </label>
                                            <select name="teacher_id" id="teacher_id" class="form-control">
                                                <option value="" selected disabled>أختر معلم </option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}" {{$course->teacher_id == $teacher->id ?'selected' :''}}> {{ $teacher->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>



                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" id="btnSubmit" class="btn btn-primary mr-2 spinner-white spinner-left">حفظ</button>
                                            {{--                                            <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>

@endsection

@push('js')

    <script>
        $(document).ready(function () {
            $("#TeacherCreator").submit(function (m) {
                $.ajax({
                    type: "POST",
                    url: '{{route('courses.update',$course->id)}}',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#btnSubmit').addClass('spinner');
                        $('#btnSubmit').attr('disabled', 'true');
                    },
                    complete: function () {
                        $('#btnSubmit').removeClass('spinner');
                        $('#btnSubmit').removeAttr('disabled');

                    },
                    success: function (response) {
                        if (response.errors) {
                            jQuery.each(response.errors, function (key, value) {
                                toastr.error(value);
                            });
                        } else {
                            toastr.success('تم حفظ البيانات بنجاح.');
                            $('#createForm').trigger("reset");
                            window.location.href="/dashboard/courses/"
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
                m.preventDefault(); // avoid to execute the actual submit of the form momoomomomo.
            });
        });
    </script>
@endpush
