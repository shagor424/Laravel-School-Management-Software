@php
$regifee = App\Model\FeeAmount::where('fee_catagory_id','5')->where('class_id',$details->class_id)->first();
$originalfee = $regifee->amount;
$discount = $details['disscount']['discount'];
$disscountablefee = $discount/100*$originalfee;
$finalfee = (int)$originalfee-(int)$disscountablefee;
@endphp


<!DOCTYPE html>
<html>
<head>
  <title></title>
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


      <table style="margin-top: 15px;margin-right: 0;" class="black10" width="100%" border="1">
      <tbody align="center">
 
              <tr width="100%">
                <td colspan="3" style="font-size: 16px;font-weight: bold; padding: 10px" width="100%" valign="middle" bgcolor="#EAEAEA" align="center">Student Bus Fair Fee PaySlip</td>
 </tr>
               <tr> <th style="padding: 2px;font-size: 12px"   valign="middle" align="left">Student ID</th>
              <td style="padding: 2px;font-size: 12px;font-weight: bold;"  valign="middle" align="left"><strong>{{$details['student']['id_no']}}</strong></td>


              
  <td rowspan="11" style="text-align: center;"  valign="middle" align="center"><img src="{{url('public/upload/stimage/'.$details['student']['image'])}}" style="width: 120px; height: 150px"></td>

            </tr>

            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Student Name</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$details['student']['name']}}</td>
            </tr>

 <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Class Name</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$details['student_class']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left"> Group Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['group']['name']}}</td>
             
            </tr>
          <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Section Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['section']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Class Roll</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details->class_roll}}</td>
             
            </tr>
            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left">Shift</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['shift']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Session Year</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['year']['name']}}</td>
             
            </tr>

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Bus Fair Fee</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$originalfee}}.00 Taka</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Discount</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$discount}} %</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Final Fee</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$finalfee}}.00 Taka</td>
             
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
                <td colspan="3" style="font-size: 16px;font-weight: bold; padding: 10px" width="100%" valign="middle" bgcolor="#EAEAEA" align="center">Student Bus Fair Fee PaySlip</td>
 </tr>
               <tr> <th style="padding: 2px;font-size: 12px"   valign="middle" align="left">Student ID</th>
              <td style="padding: 2px;font-size: 12px;font-weight: bold;"  valign="middle" align="left"><strong>{{$details['student']['id_no']}}</strong></td>


              
  <td rowspan="11" style="text-align: center;"  valign="middle" align="center"><img src="{{url('public/upload/stimage/'.$details['student']['image'])}}" style="width: 120px; height: 150px"></td>

            </tr>

            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Student Name</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$details['student']['name']}}</td>
            </tr>

 <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Class Name</th>
              
              <td style="padding: 2px;font-size: 12px" valign="middle" align="left">{{$details['student_class']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left"> Group Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['group']['name']}}</td>
             
            </tr>
          <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left"> Section Name</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['section']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Class Roll</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details->class_roll}}</td>
             
            </tr>
            <tr width="100%">
              <th  style="padding: 2px;font-size: 12px" valign="middle" align="left">Shift</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['shift']['name']}}</td>
            </tr>

             

            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Session Year</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$details['year']['name']}}</td>
             
            </tr>

             <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Bus Fair Fee</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$originalfee}}.00 Taka</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Discount</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$discount}} %</td>
             
            </tr>
            <tr width="100%">
              <th style="padding: 2px;font-size: 12px" valign="middle" align="left">Final Fee</th>
              
              <td style="padding: 2px;font-size: 12px"valign="middle" align="left">{{$finalfee}}.00 Taka</td>
             
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