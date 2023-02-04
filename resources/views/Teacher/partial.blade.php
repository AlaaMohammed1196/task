<!--begin: Datatable-->
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th>الأسم</th>
        <th>البريد الألكتروني</th>
        <th>الدرجه العلميه</th>
        <th> تاريخ الميلاد</th>
        <th> العمر</th>
        <th> انشئ منذ</th>
        <th>التحكم</th>


    </tr>
    </thead>

    <tbody>
    @foreach($teachers as $index =>$teacher)
        <tr>
            <td>{{++$index}}</td>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->email}}</td>
            <td>{{$teacher->degree}}</td>
            <td>{{$teacher->birth_date}}</td>
            <td>{{\Carbon\Carbon::parse($teacher->birth_date)->age}}</td>
            <td>{{\Carbon\Carbon::parse($teacher->created_at)->diffForHumans()}}</td>
            <td>
                <a class="btn btn-success font-weight-bold edit"  href="{{route('teachers.edit',$teacher->id)}}">
                    <i class="fa fa-edit p-0"></i></a>
                <button
                    class="btn btn-danger mr-2 delete" data-url="{{route('teachers.destroy',$teacher->id)}}" type="submit">
                    <i class="fa fa-trash p-0"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$teachers->links()}}
<!--end: Datatable-->
