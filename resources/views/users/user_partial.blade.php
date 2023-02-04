<!--begin: Datatable-->
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th>الأسم</th>
        <th>البريد الألكتروني</th>
        <th>الدرجه العلميه</th>
        <th> الهاتف</th>
        <th> السوره</th>
        <th> عدد الاوجه</th>
        <th> بدايه الايه </th>
        <th> نهايه  الايه </th>
        <th>   التقييم </th>
        <th>تقييم الطالب</th>
    </tr>
    </thead>

    <tbody>
    @foreach($users as $index =>$user)
        <tr>
            <td>{{++$index}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->degree}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->rate($course->id) ? $user->rate($course->id)->section:'-'}}</td>
            <td>{{$user->rate($course->id) ? $user->rate($course->id)->wageh:'-'}}</td>
            <td>{{$user->rate($course->id) ? $user->rate($course->id)->begin_aiya :'-'}}</td>
            <td>{{$user->rate($course->id) ? $user->rate($course->id)->end_aiya :'-'}}</td>
            <td>{{$user->rate($course->id) ? $user->rate($course->id)->value :'-'}}</td>
            <td>
                <button class="btn btn-primary mr-2 rate" data-toggle="modal"
                        {{$user->rate($course->id) ? 'disabled' :''}}
                        user_id="{{$user->id}}"
                        course_id="{{$course->id}}"
                        data-target="#exampleModal">
                    <i class="fa fa-bookmark p-0"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$users->links()}}
<!--end: Datatable-->
