@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div style="background-color: #A4A4A4" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 style="color:  #117a65"><strong>Manage  Mark Sheet</strong></h3>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Mark Sheet</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
              <div style="background-color:  #f4d03f
;color: black" class="card-header">
                <h5 style="color:  black "><b>Student Mark Sheet</b>
                </h5>
              </div>

              <div class="card-body">
                <div style="border:solid 2px;padding-top: 7px">
                   <!-- first row-->
                  <div class="row">
                    <div class="col-md-2 text-center" style="float:right">
                      <img src="{{url('public/upload/sagor.jpg')}}" style="width: 120px;height: 120px;border-radius: 100px">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-center" style="float: left">
                      <h4><strong>SSB School</strong></h4>
                      <h6><strong>Sherpur, Bogura</strong></h6>
                      <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                      <h6><strong>{{$allmarks['0']['exam_type']['name']}}</strong></h6>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr style="border:solid 1px;width: 100%;color: #DDD;margin-bottom: 0px">
                    <p style="text-align: right;"><u><i>Print Date : {{date("d-M-Y")}}</i></u></p>
                  </div>
                   <!-- second row-->
                  <div class="row" style="margin: 5px">
                    <div class="col-md-6" >
                      <table width="100%" border="1px">
                      
                        <tr>
                          <th width="50%">Student ID</th>
                          <td width="50%">{{$allmarks['0']['id_no']}}</td>
                        </tr>
                        <tr>
                          <th width="50%">Roll No</th>
                          <td width="50%">{{$allmarks['0']['assign_student']['class_roll']}}</td>
                        </tr>
                         <tr>
                          <th width="50%">Student Name</th>
                          <td width="50%">{{$allmarks['0']['student']['name']}}</td>
                        </tr>
                        <tr>
                          <th width="50%">Class Name</th>
                          <td width="50%">{{$allmarks['0']['student_class']['name']}}</td>
                        </tr>
                        <tr>
                          <th width="50%">Group Name</th>
                          <td width="50%">{{$allmarks['0']['group']['name']}}</td>
                        </tr>
                        <tr>
                          <th width="50%">Section Name</th>
                          <td width="50%">{{$allmarks['0']['section']['name']}}</td>
                        </tr>
                         <tr>
                          <th width="50%">Shift Name</th>
                          <td width="50%">{{$allmarks['0']['shift']['name']}}</td>
                        </tr>
                        <tr>
                          <th width="50%">Session Year</th>
                          <td width="50%">{{$allmarks['0']['year']['name']}}</td>
                        </tr>
                      </table>
                    </div>

                    <div class="col-md-6 text-center">
                      <table width="100%" border="1px" >
                        <tr>
                          <thead>
                          <th width="33.5%">Letter Grade</th>
                          <th wihth="33.5%">Marks Interval</th>
                          <th wihth="33.5%">Grade Point</th>
                          </thead>
                        </tr>
                        <tbody>
                          @foreach($allgrades as $allgrade)
                        <tr>
                          <td width="33.5%">{{$allgrade->grade}}</td>
                          <td wihth="33.5%">{{$allgrade->start_marks}} - {{$allgrade->end_marks}} </td>
                          <td wihth="33.5%">{{number_format((float)$allgrade->start_point,2)}} - {{number_format((float)$allgrade->end_point,2)}} </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div><br>
              <!-- third row-->
<div class="row" style="margin: 5px">
  <div class="col-md-12">
     <table width="100%" border="1px" cellpadding="1" cellspacing="1">
          <tr>
            <thead>
            <th class="text-center">SL</th>
            <th class="text-center">Subject Name</th>
            <th class="text-center">Full Marks</th>
            <th class="text-center">MCQ Marks</th>
            <th class="text-center">Creative Marks</th>
            <th class="text-center">Total Marks</th>
            <th class="text-center">Letter Grade</th>
            <th class="text-center">Grade Point</th>
            </thead>
          </tr>
          <tbody>
            @php
            $total_marks = 0;
            $total_point = 0;
            @endphp
            @foreach($allmarks as $key => $mark)
            @php
            $get_mcqmarks = $mark->mcq_marks; 
            $get_creativemarks = $mark->creative_marks;
            $subtotal_marks =  $get_mcqmarks + $get_creativemarks;
            
            $total_subject = StudentMark:: where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
            @endphp
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$mark['assign_subject']['subject']['name']}} </td>
            <td>{{$mark['assign_subject']['full_mark']}} </td>
            <td>{{$get_mcqmarks}}</td>
            <td> {{$get_creativemarks}}</td>
            <td>{{$subtotal_marks}}</td>
            @php
            $grade_marks = App\Model\StudentMarksGrade::where([['start_marks','<=',(int)$subtotal_marks],['end_marks','<=',(int)$subtotal_marks]])->first();
            $grade_name = $grade_marks->grade_name;
            $grade_point = number_format((float)$grade_marks->grade_point,2);
            $total_point = (float)$total_point+(float)$grade_point;
            @endphp
            <td>{{$grade_name}} </td>
            <td>{{$grade_point}} </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3"> <strong style="padding-left: 30px">Total Marks</strong></td>
             <td colspan="3"> <strong style="padding-left: 30px">{{$total_marks}}</strong></td>
          </tr>
          </tbody>
        </table>
  </div>
</div><br>














                </div>
              </div>
            <!-- old div -->
          </section>
        
        </div>
       
      </div>
    </section>
 
  </div>








  @endsection