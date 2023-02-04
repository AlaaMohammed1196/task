<!--begin: Datatable-->
<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th>الأسم</th>
        <th>البريد الألكتروني</th>
        <th>الدرجه العلميه</th>
        <th> الهاتف</th>
        <th> تاريخ الميلاد</th>
        <th> العمر</th>
        <th> انشئ منذ</th>
        <th>التحكم</th>


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
            <td>{{$user->birth_date}}</td>
            <td>{{\Carbon\Carbon::parse($user->birth_date)->age}}</td>
            <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
            <td>
                <a class="btn btn-success font-weight-bold edit"  href="{{route('users.edit',$user->id)}}">
                    <i class="fa fa-edit p-0"></i></a>
                <button
                    class="btn btn-danger mr-2 delete" data-url="{{route('users.destroy',$user->id)}}" type="submit">
                    <i class="fa fa-trash p-0"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$users->links()}}
<!--end: Datatable-->
