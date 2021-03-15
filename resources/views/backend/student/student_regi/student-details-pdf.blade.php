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
                <td  colspan="2" style="padding: 8px;font-size: 12px" width="26%" valign="middle" align="left"><img src="public/upload/white.jpg" width="750px" height="100px"></td>

                </tr>
              
      </tbody></table></td>
      </tr>
    </tbody></table></td>
     </tr>
      



  <tr width="Auto"> 
            <td style="font-size: 25px;font-weight: bold; margin-top: 15px" width="100%" valign="middle" align="center">Student Registration Card</td>
     </tr>


<tr width="Auto"><td></td></tr>

<tr width="Auto" width="100%" valign="middle" align="center">
    <td valign="middle" bgcolor="#FFFFFF" align="left">


      <table style="margin-top: 15px;margin-right: 0;" class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
      <tbody align="center">
 
              <tr width="Auto">
                <td colspan="3" style="font-size: 16px;font-weight: bold; padding: 10px" width="50%" valign="middle" bgcolor="#EAEAEA" align="left">Base Information</td>
 </tr>
               <tr> <th style="padding: 8px;font-size: 14px"   valign="middle" align="left">Student ID</th>
              <td style="padding: 8px;font-size: 16px;font-weight: bold;"  valign="middle" align="left"><strong>{{$details['student']['id_no']}}</strong></td>


              
  <td rowspan="7" style="text-align: center;"  valign="middle" align="center"><img src="{{url('public/upload/stimage/'.$details['student']['image'])}}" style="width: 120px; height: 150px"></td>

            </tr>

 <tr width="Auto">
              <th  style="padding: 8px;font-size: 14px" valign="middle" align="left"> Class Name</th>
              
              <td style="padding: 8px;font-size: 14px" valign="middle" align="left">{{$details['student_class']['name']}}</td>
            </tr>

             

            <tr width="Auto">
              <th style="padding: 8px;font-size: 14px" valign="middle" align="left"> Group Name</th>
              
              <td style="padding: 8px;font-size: 14px"valign="middle" align="left">{{$details['group']['name']}}</td>
             
            </tr>
          <tr width="Auto">
              <th  style="padding: 8px;font-size: 14px" valign="middle" align="left"> Section Name</th>
              
              <td style="padding: 8px;font-size: 14px"valign="middle" align="left">{{$details['section']['name']}}</td>
            </tr>

             

            <tr width="Auto">
              <th style="padding: 8px;font-size: 14px" valign="middle" align="left">Class Roll</th>
              
              <td style="padding: 8px;font-size: 14px"valign="middle" align="left">{{$details->class_roll}}</td>
             
            </tr>
            <tr width="Auto">
              <th  style="padding: 8px;font-size: 14px" valign="middle" align="left">Shift</th>
              
              <td style="padding: 8px;font-size: 14px"valign="middle" align="left">{{$details['shift']['name']}}</td>
            </tr>

             

            <tr width="Auto">
              <th style="padding: 8px;font-size: 14px" valign="middle" align="left">Session Year</th>
              
              <td style="padding: 8px;font-size: 14px"valign="middle" align="left">{{$details['year']['name']}}</td>
             
            </tr>

           
  
    </tbody> </table>


   


  <tr width="Auto" style="font-size: 12px" width="100%" valign="middle" align="center">
            <td style="font-size: 12px" valign="middle" height="25" bgcolor="#FFFFFF" align="left"><table  width="Auto" cellspacing="0" cellpadding="5" border="0">
              <tbody>

                <tr width="Auto" width="100%" valign="top" align="left">

     <td style="font-size: 16px;font-weight: bold; padding: 10px" width="50%" valign="middle" bgcolor="#EAEAEA" align="left">
    <span class="black11">Details Information<span></span></span></td>
      </tr>
                <tr width="Auto">  
              <td width="100%" valign="top" align="left">

                <table class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
                  <tbody>

                    <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Student Name</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['name']}} </td>
                  </tr>
          <tr width="Auto" style="font-size: 14px" valign="top" align="left" >
                    <th width="40%" valign="top" align="left" style="padding: 8px;font-size: 14px">Father's Name</th>
                    <td width="100%" valign="top" align="left" style="padding: 8px;font-size: 14px">{{$details['student']['fname']}}</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Mother's Name</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['mname']}}</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Date Of birth</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['dob']}}</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Gender</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['gender']}}</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Religion</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['religion']}}</td>
                  </tr>
      
       <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Mobile</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['mobile']}}</td>
                  </tr>

    

    <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Email</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['email']}}</td>
                  </tr>
          <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Address</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['address']}}</td>
                  </tr>

      <tr width="Auto">
                   <th style="padding: 8px;font-size: 14px">Role</th>
                    
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['usertype']}}</td>
                    
                   <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Discount</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['disscount']['discount']}}</td>
                  </tr>

                
      
                    <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Status</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['status']}}</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Addmission Date</th>
                    <td style="padding: 8px;font-size: 14px">{{$details['student']['created_at']}}</td>
                  </tr>
                

                </tbody></table></td>
              </tr>
            </tbody></table></td>
  </tr>

  <tr width="Auto">
    <td valign="top" bgcolor="#F5F9BD" align="left">
      <table width="100%" cellspacing="0" cellpadding="5" border="0">
        <tbody><tr width="Auto">
          <td class="black12" width="100%" valign="middle" bgcolor="#FFFFFF" align="left">


       <tr width="Auto" width="100%" valign="top" align="left">

     <td style="font-size: 16px;font-weight: bold; padding: 10px" width="50%" valign="middle" bgcolor="#EAEAEA" align="left">
    <span class="black11">Addrees Information<span></span></span></td>
      </tr>
  </tr>


 <tr width="Auto">
    <td valign="top" bgcolor="#FFFFFF" align="left">
      <table class="black10" width="Auto" cellspacing="1" cellpadding="2" border="1">
         

             <tbody>




             <tr width="Auto" width="100%" valign="top" align="left">

     
      </tr>
  </tr>
 

                    <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Post Name</th>
                    <td style="padding: 8px;font-size: 14px">Auditor </td>
                  </tr>
          <tr width="Auto" style="font-size: 14px" valign="top" align="left" >
                    <th width="40%" valign="top" align="left" style="padding: 8px;font-size: 14px">Applicant's Name</th>
                    <td width="100%" valign="top" align="left" style="padding: 8px;font-size: 14px">MD. SOHEL RANA</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Father's Name</th>
                    <td style="padding: 8px;font-size: 14px">igdilfhLJchbLIHCbzjxcbzilcjjczxjc</td>
                  </tr>
                  <tr width="Auto">
                    <th style="padding: 8px;font-size: 14px">Mother's Name</th>
                    <td style="padding: 8px;font-size: 14px">MOST. MASUTHA KHATUN</td>
                  </tr>
                  
    </tbody></table>


  </td>




  
        </tr>  <tr width="Auto"> 
          <td   class="black12" valign="middle" bgcolor="#FFFFFF" align="left"><br><br><br></td>
        </tr>

        <tr width="Auto">
          <td valign="middle" bgcolor="#FFFFFF" align="left"> <table class="black10" width="100%" cellspacing="1" cellpadding="2" border="1">
                     </table></td>
             
        </tr>

   
  

    <tr width="Auto">
          <td style="padding: 50px" class="black11" valign="middle" bgcolor="#FFFFFF" align="left">---------- Registar Signature-----------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------- Principal Signature ------</td>
        </tr>
      </tbody></table>
    </td>
  

    
  </tbody></table>









</tbody></table>
</body>
</html>