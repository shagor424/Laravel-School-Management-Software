<!DOCTYPE html>
<html>
<head>
  <title>Empolyee Salary Pay Slip</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <style type="text/css">

table{

      width: 595px;
      height: 805px;
      font-size: 12px; 

    }
    tr{
      width: 100%; 
      padding: 10px;
    }

    .logo{
      width: 100%;
    }


  </style>
</head>
<body style="width: 595px;height: 805px; margin-bottom:0">
<table style="width: 600px;height: 805px">
              <tbody><tr width="Auto">
        </tr><tr width="Auto">
    <td class="green" valign="top" height="100" align="left "><table class="white14bold" width="100%" cellspacing="0" cellpadding="0" border="0">
     <tbody><tr width="Auto"><td class="green" valign="top" height="120" align="left"><table class="black10" width="100%" cellspacing="1" cellpadding="2" border="0">
      <tbody><tr width="Auto">
      <td height="100" bgcolor="white">


        <table class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
      <tbody>
 
              <tr width="Auto" width="100%">
                <td  colspan="2" style="padding: 6px;font-size: 12px" width="26%" valign="middle" align="left"><img src="public/upload/white.jpg" width="750px" height="100px"></td>

                </tr>
              
      </tbody></table></td>
      </tr>
    </tbody></table></td>
     </tr>
      



  


<tr width="Auto"><td></td></tr>

<tr width="Auto" width="100%" valign="middle" align="center">
    <td valign="middle" bgcolor="#FFFFFF" align="left">
@php
$date = date('Y-m',strtotime($totalattendgroupbyid['0']->attend_date));
        if($date !=''){
        $where[] = ['attend_date','like',$date.'%'];
      }
$totalattend = App\Model\EmployeeAtten::with(['user'])->where($where)->where('employee_id',$totalattendgroupbyid['0']->employee_id)->get();
      $singlesalary = (int)$totalattendgroupbyid['0']['user']['salary'];
      $absentcount = count($totalattend->where('attend_status','Absent'));
      $salaryperday = (int)$singlesalary/30;
      $totalsalariminus = (int)$absentcount*(int)$salaryperday;
      $totalsalary = (int)$singlesalary-(int)$totalsalariminus;
@endphp

      <table style="margin-top: 15px;margin-right: 0;" class="black10" width="100%" border="1">
      <tbody align="center">
 
              <tr width="100%">
                <td colspan="3" style="font-size: 16px;font-weight: bold; padding: 10px" width="100%" valign="middle" bgcolor="#EAEAEA" align="center">Employee Monthly Salary PaySlip</td>
 </tr>
               <tr> <th style="padding: 2px;font-size: 12px"   valign="middle" align="left">Employee ID</th>
              <td style="padding: 2px;font-size: 12px;font-weight: bold;"  valign="middle" align="left"><strong>{{$totalattendgroupbyid['0']['user']['id_no']}}</strong></td>


              
  <td rowspan="11" style="text-align: center;"  valign="middle" align="center"><img src="{{url('public/upload/employeeimage/'.$totalattendgroupbyid['0']['user']['image'])}}" style="width: 120px; height: 150px"></td>

            </tr>

            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Designation</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['name']}}</td>
            </tr>

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Joining Dte</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{date('d-M Y',strtotime($totalattendgroupbyid['0']->Join_date))}}</td>
             
            </tr>

 <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Mobile</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['mobile']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left"> Basic Salary</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['salary']}}.00</td>
             
            </tr>

              

             <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left">Present Salary</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['salary']}}.00</td>
            </tr>


      

             

          
             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Total Absent Day (This Month)</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$absentcount}} Day</td>
             
            </tr>

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Month Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{date('M Y',strtotime($totalattendgroupbyid['0']->attend_date))}}</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Absent Fine</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalsalariminus}}.00</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Final Salary (This Month)</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalsalary}}.00</td>
             
            </tr>
           
  
    </tbody> </table>


   


  

 
  

    
  </tbody></table>









</tbody></table>
<br>
<br>
<br>

<table >
  <tr>
    <th style="text-align: left">Accountant</th>
    <th style="text-align: right;">Headmaster/Principal</th>
  </tr>
</table>
<br>
<hr>
<style type="text/css">

table{

      width: 595px;
      height: 805px;
      font-size: 12px; 

    }
    tr{
      width: 100%;
      padding: 10px;
    }

    .logo{
      width: 100%;
    }


  </style>
</head>
<body style="width: 595px;height: 805px; margin-bottom:0">
<table style="width: 600px;height: 805px">
              <tbody><tr width="Auto">
        </tr><tr width="Auto">
    <td class="green" valign="top" height="100" align="left "><table class="white14bold" width="100%" cellspacing="0" cellpadding="0" border="0">
     <tbody><tr width="Auto"><td class="green" valign="top" height="120" align="left"><table class="black10" width="100%" cellspacing="1" cellpadding="2" border="0">
      <tbody><tr width="Auto">
      <td height="100" bgcolor="white">


        <table class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
      <tbody>
 
              <tr width="Auto" width="100%">
                <td  colspan="2" style="padding: 6px;font-size: 12px" width="26%" valign="middle" align="left"><img src="public/upload/white.jpg" width="750px" height="100px"></td>

                </tr>
              
      </tbody></table></td>
      </tr>
    </tbody></table></td>
     </tr>
      



  


<tr width="Auto"><td></td></tr>

<tr width="Auto" width="100%" valign="middle" align="center">
    <td valign="middle" bgcolor="#FFFFFF" align="left">


      <table style="margin-top: 15px;margin-right: 0;" class="black10" width="100%" border="1">
      <tbody align="center">
 
              <tr width="100%">
                <td colspan="3" style="font-size: 16px;font-weight: bold; padding: 10px" width="100%" valign="middle" bgcolor="#EAEAEA" align="center">Employee Monthly Salary PaySlip</td>
 </tr>
               <tr> <th style="padding: 2px;font-size: 12px"   valign="middle" align="left">Employee ID</th>
              <td style="padding: 2px;font-size: 12px;font-weight: bold;"  valign="middle" align="left"><strong>{{$totalattendgroupbyid['0']['user']['id_no']}}</strong></td>


              
  <td rowspan="11" style="text-align: center;"  valign="middle" align="center"><img src="{{url('public/upload/employeeimage/'.$totalattendgroupbyid['0']['user']['image'])}}" style="width: 120px; height: 150px"></td>

            </tr>

            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Designation</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['name']}}</td>
            </tr>

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Joining Dte</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{date('d-M Y',strtotime($totalattendgroupbyid['0']->Join_date))}}</td>
             
            </tr>

 <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Mobile</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['mobile']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left"> Basic Salary</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['salary']}}.00</td>
             
            </tr>

              

             <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left">Present Salary</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalattendgroupbyid['0']['user']['salary']}}.00</td>
            </tr>


      

             

          
             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Total Absent Day (This Month)</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$absentcount}} Day</td>
             
            </tr>

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Month Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{date('M Y',strtotime($totalattendgroupbyid['0']->attend_date))}}</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Absent Fine</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalsalariminus}}.00</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Final Salary (This Month)</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$totalsalary}}.00</td>
             
            </tr>
           
  
    </tbody> </table>


   


  

 
  

    
  </tbody></table>









</tbody></table>
<br>
<br>
<br>

<table >
  <tr>
    <th style="text-align: left">Accountant</th>
    <th style="text-align: right;">Headmaster/Principal</th>
  </tr>
</table>

</body>
</html>

<hr>