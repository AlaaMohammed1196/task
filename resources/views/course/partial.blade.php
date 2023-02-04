<!--begin: Datatable-->
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th>الأسم</th>
        <th>المعلم</th>
        <th> انشئ منذ</th>
        @if(auth()->guard('admin')->check())
        <th>التحكم</th>
            @endif
        @if(!auth()->guard('web')->check())
            <th>الطلاب المشتركين</th>
        @endif
        @if(auth()->guard('web')->check())
        <th>أشترك </th>
            @endif
    </tr>
    </thead>

    <tbody>
    @foreach($courses as $index =>$course)
        <tr>
            <td>{{++$index}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course['teacher'] ? $course['teacher']['name'] : '-' }}</td>
            <td>{{\Carbon\Carbon::parse($course->created_at)->diffForHumans()}}</td>

            @if(auth()->guard('admin')->check())
            <td>
                <a class="btn btn-success font-weight-bold edit"  href="{{route('courses.edit',$course->id)}}">
                    <i class="fa fa-edit p-0"></i></a>
                <button
                    class="btn btn-danger mr-2 delete" data-url="{{route('courses.destroy',$course->id)}}" type="submit">
                    <i class="fa fa-trash p-0"></i>
                </button>
            </td>

        @endif

            @if(!auth()->guard('web')->check())
            <td>
            <a
                class="btn btn-primary mr-2" href="{{url('dashboard/subscribe/courses',$course->id)}}">
                <i class="fa fa-users p-0"></i>
            </a>
        </td>
        @endif
            @if(auth()->guard('web')->check())
            <td>
            <button
                class="btn btn-success mr-2 subscribe" {{in_array(auth()->user()->id ,auth()->user()->courses()->wherepivot('course_id',$course->id)->pluck('user_id')->toArray()) ?'disabled':''}} data-url="{{route('courses.subscribe',$course->id)}}" type="submit">
                <i class="fa fa-share p-0"></i>
            </button>
        </td>
        @endif
        </tr>

    @endforeach
    </tbody>
</table>

{{$courses->links()}}
<!--end: Datatable-->
