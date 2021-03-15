$data['groups'] = StudentGroup::orderBy('id','desc')->get();
    	$data['group_id'] = StudentGroup::orderBy('id','desc')->first()->id;
    	$data['shifts'] = StudentShift::orderBy('id','desc')->get();
    	$data['shift_id'] = StudentShift::orderBy('id','desc')->first()->id;

    	->where('group_id',$data['group_id'])->where('shift_id',$data['shift_id'])


    	 <!--      <div class="form-group col-md-2">
                    <label for="group_id">  Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control form-control-sm">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}" {{(@$group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="section">Section Name <font style="color: red">*</font></label>
                    <select name="section" id="section" class="form-control form-control-sm">
                      <option value="">Select Section Name</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="Rose">Rose</option>
                      <option value="Lotus">Lotus</option>
                    </select>
                  </div> -->