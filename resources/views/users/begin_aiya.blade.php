
<label>بدايه الايه</label>
<select class="form-control select2 begin_aiya" name="begin_aiya" id="begin_aiya" style="width: 100% !important;direction: rtl">
    <option value="">أختر الايه </option>
    @foreach($sections as $section)
        <option value="{{$section->begin_aiya}}">{{$section->begin_aiya}}</option>
    @endforeach
</select>
