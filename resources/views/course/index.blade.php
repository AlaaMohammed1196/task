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
                            الحلقات
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

                <div class="d-flex align-items-center">


                    <!--begin::Button-->
                    @if(auth()->guard('admin')->check())

                    <a href="{{url('dashboard/courses/create')}}" class="btn btn-white font-weight-bold py-3 px-6"> أضافه </a>
               @endif
                <!--end::Button-->


                </div>

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
                                        الحلقات
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>أسم الحلقه </label>
                                        <input type="text" name="name"  id="name" class="form-control" placeholder="أسم الحلقه"/>
                                    </div>
                                    @if(auth()->guard('admin')->check())
                                    <div class="col-lg-4 mb-4">
                                        <label> المعلم </label>
                                        <select name="teacher_id" id="teacher_id" class="form-control select2">
                                            <option value="" selected disabled>أختر معلم </option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}"> {{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

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

@endsection

@push('js')
   <script src="{{url('/dashboard')}}/assets/js/pages/crud/course.js"></script>
@endpush
