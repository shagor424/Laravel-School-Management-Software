<!DOCTYPE html>
<html lang="en">
<head>
<title>Class Wise Result Sheet</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


</style>
</head>
<body>
  <div style="background-color:  #f5f4f3 ">
<table width="100%" height="100px">
  <tr >
    <td width="25%"> <img src="{{url('public/upload/sagor.jpg')}}" style="width: 90px;height: 90px;border-radius: 100px"></td>
    <td width="43%" style="text-align: center;padding-top: 10px;">
       <h4><strong>SSB School</strong></h4>
       <br>
          <h5><strong>Sherpur Bogura</strong></h5> <br>
        <h6><strong><u><i>All Student Result Report</i></u></strong></h6>
    </td>
    <td width="32%" style="margin-right: 0;text-align: left;">
      <h5 style="padding-top: 5px"><strong>Class Name &nbsp;:  </strong>{{@$alldata['0']['student_class']['name']}}</h5>
      <br>
      <h5 style="padding-top: 5px" ><strong>Session Year : &nbsp;</strong>{{@$alldata['0']['year']['name']}}</h5>
      <br>
      <h5><strong>Exam Type   &nbsp;&nbsp;&nbsp;: </strong>{{@$alldata['0']['exam_type']['name']}}</h5>
  </td>
  </tr>
</table>
</div>
<hr>
<table width="100%" border="1" cellspacing="1" cellpadding="2">
  <thead>
    <tr>
      <th>SL NO</th>
      <th>Student Name</th>
      <th>Student ID</th>
      <th>Class Roll</th>
      <th>Letter Grade</th>
      <th>Grade Point</th>
      <th>Total Marks</th>
      <th>Avarage</th>
      <th>Remarks</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alldata as $key => $data)
    @php
            $allmarks = App\Model\StudentMark:: where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get();
            $total_marks = 0;
            $total_point = 0;
           
           foreach($allmarks as  $mark){
           $count_fail = StudentMark:: where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->where('mcq_marks','<','10')->get()->count();
            $get_mcqmarks = $mark->mcq_marks; 
            $get_creativemarks = $mark->creative_marks;
            $subtotal_marks =  $get_mcqmarks + $get_creativemarks;
            $total_marks = (float)$total_marks+$subtotal_marks;
            $grade_marks = App\Model\StudentMarksGrade::where([['start_marks','<=',(int)$subtotal_marks],['end_marks','>=',(int)$subtotal_marks]])->first();
            $grade_name = $grade_marks->grade;
            $grade_point = number_format((float)$grade_marks->grade_point,2);
            $total_point = (float)$total_point+(float)$grade_point;
            }
    @endphp
    <tr>
      <td style="text-align: center;">{{$key+1}}</td>
      <td style="text-align: center;">{{$data['student']['name']}}</td>
       <td style="text-align: center;">{{$data['student']['id_no']}}</td>
      <td style="text-align: center;">{{$data['assign_student']['class_roll']}}</td>
       @php
       $total_subject = App\Model\StudentMark:: where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get()->count();
        $total_grade = 0;
        $point_for_letter_grade = (float)$total_point/(float)$total_subject;
        $total_grade = App\Model\StudentMarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
        $final_grade = $total_grade->grade;
        $grade_point_avg = (float)$total_point/(float)$total_subject;
        $avg_marks = (float)$total_marks/(float)$total_subject;
       
        @endphp
      <td style="text-align: center;">
         @if($count_fail > 0)
            F
            @else
            {{$final_grade}}
            @endif
      </td>
      <td style="text-align: center;">
          @if($count_fail > 0)
            0.00
            @else
            {{number_format((float)$grade_point_avg,2)}}
            @endif
      </td>
      <td style="text-align: center;">
        {{number_format((float)$avg_marks,2)}}
      </td>
      <td>
        @if($count_fail > 0)
            Fail
            @else
            {{$total_grade->remarks}}
            @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

 <i style="text-align: left">Print Date : {{date("d-M-Y")}}</i>

    <div>
       <hr style="border:solid 1px;width: 22%;color: #000;text-align: right;">
      <p style="text-align: right;margin-top: -7px">Headmaster/Principal</p>
    </div>

</body>
</html>
