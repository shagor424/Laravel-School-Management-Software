<!DOCTYPE html>
<html lang="en">
<head>
<title>Stuff Attendance Report</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


</style>
</head>
<body>
<table width="100%" height="100px">
  <tr>
    <td> <img src="{{url('public/upload/sagor.jpg')}}" style="width: 90px;height: 90px;border-radius: 100px"></td>
    <td style="text-align: center;padding-top: 10px">
       <h4><strong>SSB School</strong></h4>
       <br>
          <h5><strong>Sherpur Bogura</strong></h5> <br>
        <h6><strong><u><i>Stuff Attendance Report</i></u></strong></h6>
    </td>
    <td style="margin-right: 0;text-align: right;"><img src="{{(!empty($alldata['0']['user']['image']))?url('public/upload/employeeimage/'.$alldata['0']['user']['image']):url('public/upload/usernoimage.png')}}" style="width: 90px;height: 90px;border-radius: 100px">
  </aside></td>
  </tr>
</table>
<hr>
<table width="100%" border="1">
  <tr style="height: 50px;text-align: left;">
    <th style="text-align: left">Employee Name: {{$alldata['0']['user']['name']}}</th>
    <th style="text-align: left">  ID NO :{{$alldata['0']['user']['id_no']}}</th>
    <th style="text-align: left">  Month Name :{{$month}}</th>
  </tr>
</table>
<hr>
<br>

<table width="100%" border="1" >
  <thead>
    <tr >
      <th> Attendance Date</th>
      <th> Attendance Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alldata as $data)
    <tr>
      <td style="text-align: center;">{{date('d-M-Y',strtotime($data->attend_date))}}</td>
      <td style="text-align: center;">{{$data->attend_status}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="2">
        <strong>Total Absent:&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;{{$absents}}, <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Leave:&nbsp;&nbsp;&nbsp;</strong>{{$leaves}} 
      </td>
    </tr>
  </tbody>
</table>

 <p style="text-align: left;"><u><i>Print Date : {{date("d-M-Y")}}</i></u></p>


 
    <div>
       <hr style="border:solid 1px;width: 22%;color: #000;text-align: right;">
      <p style="text-align: right;margin-top: -7px">Headmaster/Principal</p>
    </div>





</body>
</html>
