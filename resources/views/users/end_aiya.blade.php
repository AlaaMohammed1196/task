
<label>نهايه الايه</label>
<select class="form-control select2 end_aiya" name="end_aiya" id="end_aiya" style="width: 100% !important;direction: rtl">
    <option value="">أختر الايه </option>
    @foreach($sections as $section)
        <option value="{{$section->end_aiya}}">{{$section->end_aiya}}</option>
    @endforeach
</select>
