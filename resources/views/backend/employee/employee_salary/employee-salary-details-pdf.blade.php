<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 
</head>
<body style="width: 595px;height: 805px; margin-bottom:0">

                 


                 <table style="box-sizing: 1px" class="table table-bordered">
                  <thead>
                    
                    <tr style="padding: 10px"><th  colspan="8" style="padding: 8px;font-size: 12px;padding: 10px" width="26%" valign="middle" align="left"><img src="public/upload/white.jpg" width="750px" height="100px"></th></tr>
                    <tr><th colspan="8"><h5 style="color: green"> <strong>Employee Name : {{$detailspdf->id_no}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;<strong>Employee Name : {{$detailspdf->name}}</strong></h5></th></tr>
                    <tr style="font-size: 12px;padding: 6px">
                      <th style="padding: 6px;font-size: 10px">SL</th>
                      <th style="padding: 6px;font-size: 10px">Employee ID</th>

                      <th style="padding: 6px;font-size: 10px">Name</th>
                      <th style="padding: 6px;font-size: 10px">Join Date</th>
                      
                      <th style="padding: 6px;font-size: 10px">Previous Salary</th>
                      <th style="padding: 6px;font-size: 10px">Increment Salary</th>
                      <th style="padding: 6px;font-size: 10px">Present Salary</th>
                      <th style="padding: 6px;font-size: 10px">Effected Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($salary as $key=>$value)
                    <tr style="font-size: 12px;padding: 6px">
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;" >{{$key+1}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;" >{{$detailspdf->id_no}}</td>
                      <td style="padding: 6px;font-size: 10px">{{$detailspdf->name}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;">{{date('d-M-Y',strtotime($detailspdf->join_date))}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;">{{$value->previous_salary}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;">{{$value->increment_salary}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;">{{$value->present_salary}}</td>
                      <td style="padding: 6px;font-size: 10px" style="text-align: center;">{{date('d-M-Y',strtotime($value->effected_date))}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>


   <table class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
                  <tbody>
                    <tr style="font-size: 14px;padding: 8px" colspan="2" ><td style="font-size: 16px" colspan="2">Details Information</td></tr>
                  </tr> 
                    <tr style="padding: 6px;font-size: 14px">
                    <th style="padding: 6px;font-size: 14px">Employee ID</th>
                    <td style="padding: 6px;font-size: 14px">{{$detailspdf->id_no}} </td>
                  </tr>
                    <tr style="padding: 6px;font-size: 14px">
                    <th style="padding: 6px;font-size: 14px">Employee Name</th>
                    <td style="padding: 6px;font-size: 14px">{{$detailspdf->name}} </td>
                  </tr>
                  </tr>
                    <tr style="padding: 6px;font-size: 14px">
                    <th style="padding: 6px;font-size: 14px">Employee Designation</th>
                    <td style="padding: 6px;font-size: 14px">{{$detailspdf['designation']['name']}} </td>
                  </tr>
          <tr style="padding: 8px;font-size: 14px" >
                    <th width="40%" valign="top" align="left" style="padding: 8px;font-size: 14px">Father's Name</th>
                    <td width="100%" valign="top" align="left" style="padding: 8px;font-size: 14px">{{$detailspdf->fname}}</td>
                  </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Mother's Name</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->mname}}</td>
                    </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Joining Date</th>
                    <td style="padding: 8px;font-size: 14px">{{date('d-M-Y',strtotime($detailspdf->join_date))}}</td>
                  </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Salary</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->salary}}</td>
                  </tr>

                  </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Date Of Birth</th>
                    <td style="padding: 8px;font-size: 14px">{{date('d-M-Y',strtotime($detailspdf->dob))}}</td>
                  </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Gender</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->gender}}</td>
                  </tr>
                  <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Religion</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->religion}}</td>
                  </tr>
      
       <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Mobile</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->mobile}}</td>
                  </tr>

    

    <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Email</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->email}}</td>
                  </tr>
          <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Address</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->address}}</td>
                  </tr>

      <tr style="padding: 8px;font-size: 14px">
                   <th style="padding: 8px;font-size: 14px">Role</th>
                    
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf['designation']['name']}} </td>
                    
                 

                
      
                    <tr style="padding: 8px;font-size: 14px">
                    <th style="padding: 8px;font-size: 14px">Status</th>
                    <td style="padding: 8px;font-size: 14px">{{$detailspdf->status}}</td>
                  </tr>
                  
                

                </tbody></table>
   
 








</body>
</html>