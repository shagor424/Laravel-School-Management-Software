 @extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Employee
              @else
              Add Employee
              @endif
 

          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Employee</li>
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
              <div class="card-header" style="background-color: #605ca8;color: white;padding: 5px">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Employee
              @else
              Add Employee
              @endif
                  <a  href="{{route('employees.regi.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Employee List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body" style="background-color:#E6E6E6">
                
              <form method="post" action="{{(@$editdata)?route('employees.regi.update',$editdata->id):route('employees.regi.store')}}" id="myform"enctype="multipart/form-data">
                @csrf
                
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Employee Name <font style="color: red">*</font></label>
                    <input  type="text" name="name" id="name" value="{{@$editdata->name}}" class="form-control" placeholder="Enter Employee Name">
                    
                  </div>

                   <div class="form-group col-md-4">
                    <label>Father Name <font style="color: red">*</font></label>
                    <input  type="text" name="fname" id="fname"value="{{@$editdata->fname}}" class="form-control" placeholder="Enter Father Name">
                    
                  </div>

                  <div class="form-group col-md-4">
                    <label> Mother Name <font style="color: red">*</font></label>
                    <input  type="text" name="mname" id="mname"value="{{@$editdata->mname}}" class="form-control" placeholder="Enter Mother Name">
                    
                  </div>

                  <div class="form-group col-md-4">
                    <label for="class_id">Designation <font style="color: red">*</font> </label>
                    <select name="desi_id" id="desi_id" class="form-control select2bs4">
                      <option value="">Select Designation </option>
                      @foreach($designations as $desi)
                      <option value="{{$desi->id}}" {{(@$editdata->desi_id==$desi->id)?"selected":""}}>{{$desi->name}}</option>
                      @endforeach
                    </select>
                  </div>


                   <div class="form-group col-md-4">
                    <label>Mobile <font style="color: red">*</font></label>
                    <input  type="text" name="mobile" id="mobile" value="{{@$editdata->mobile}}" class="form-control" placeholder="Enter employee Mobile">
                    <font style="color:red">{{($errors)->has('mobile')?($errors->first('mobile')):''}}</font>
                  </div>

                   <div class="form-group col-md-4">
                    <label>Email <font style="color: red">*</font></label>
                    <input  type="email" name="email" id="email" value="{{@$editdata->email}}" class="form-control" placeholder="Enter employee Email">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Date Of Birth  <font style="color: red">*</font></label>
                    <input class="datepicker" type="text" name="dob" id="dob"value="{{@$editdata->dob}}" class="form-control" placeholder="yyyy-mm-dd">
                    <font style="color:red">{{($errors)->has('dob')?($errors->first('dob')):''}}</font>
                  </div>
                 
                  <div class="form-group col-md-4">
                    <label>Join Date  <font style="color: red">*</font></label>
                    <input class="datepicker"  type="text" placeholder="yyyy-mm-dd" name="join_date" id="dob"value="{{@$editdata->join_date}}" class="form-control">
                    <font style="color:red">{{($errors)->has('join_date')?($errors->first('join_date')):''}}</font>
                  </div>
                  


                   <div class="form-group col-md-4">
                    <label> Address <font style="color: red">*</font></label>
                    <input  type="text" name="address" id="address"value="{{@$editdata->address}}" class="form-control" placeholder="Enter Address">
                    <font style="color:red">{{($errors)->has('address')?($errors->first('address')):''}}</font>
                  </div>

                   <div class="form-group col-md-4">
                    <label for="gender">Gender <font style="color: red">*</font></label>
                    <select name="gender" id="gender" class="form-control select2bs4">
                      <option value="">Select Gender</option>
                      <option value="Male" {{(@$editdata->gender=='Male')?'selected':''}}>Male</option>
                      <option value="Female"{{(@$editdata->gender=="Female")?"selected":""}}>Female</option>
                      <option value="Others" {{(@$editdata->gender=="Others")?"selected":""}}>Others</option>
                    </select>
                  </div>

 					         <div class="form-group col-md-4">
                    <label for="gender">Religion <font style="color: red">*</font></label>
                    <select  name="religion" id="religion" class="form-control select2bs4"value="{{@$editdata->religion}}">
                      <option value="">Select Religion</option>
                      <option value="Islam"{{(@$editdata->religion=="Islam")?"selected":""}}>Islam</option>
                      <option value="Hindu"{{(@$editdata->religion=="Hindu")?"selected":""}}>Hindu</option>
                      <option value="Buddhoo"{{(@$editdata->religion=="Buddhoo")?"selected":""}}>Buddhoo</option>
                      <option value="Cristian"{{(@$editdata->religion=="Cristian")?"selected":""}}>Cristian</option>
                      <option value="Others"{{(@$editdata->religion=="Others")?"selected":""}}>Others</option>
                    </select>
                  </div>

                 
                  <div class="form-group col-md-4">
                    <label> Salray <font style="color: red">*</font></label>
                    <input  type="text" name="salary" id="salary"value="{{@$editdata->salary}}" class="form-control" placeholder="Enter salary">
                    <font style="color:red">{{($errors)->has('salary')?($errors->first('salary')):''}}</font>
                  </div>
                  
                  

                   <div class="form-group col-md-4">

                    <img id="showimage" src="{{(!empty($editdata->image))?url('public/upload/employeeimage/'.$editdata->image):url('public/upload/usernoimage.png')}}" style="width: 30px;height: 35px;border:1px solid #000;">
                        <label for="image"> Employee Photo <font style="color: red">*</font></label>
                    <input  type="file" name="image" id="image"value="{{@$editdata->image}}" class="form-control">
                    <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font>
                 </div> 

                 
              
                    
   
    

                  </div>
                
                <button type="submit"class="btn btn-block bg-gradient-primary float-right">{{(@$editdata)?'Update Employee Registration':' Employee Registration'}}</button>

              </form>
</div> 
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

email: {
        required: true,
        },
     
      name: {
        required: true,
        },
     
    fname: {
        required: true,
        },    

 mname: {
        required: true,
        },    

 mobile: {
        required: true,
        },    

 dob: {
        required: true,
        },    
 address: {
        required: true,
        }, 

 gender: {
        required: true,
        },    
 religion: {
        required: true,
        },    
 
           
 salary: {
        required: true,
       },
 join_date: {
        required: true,
        },


  desi_id: {
        required: true,
        


    


      }
    },
    messages: {
     

      name: {
        required: "Please Enter Class Name",
        
      },

       fname: {
        required: "Please Enter Class Name",
        
      }


      
     
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script type="text/javascript">
  $(function() {
  $('.selectpicker').selectpicker();
});
</script>
<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection