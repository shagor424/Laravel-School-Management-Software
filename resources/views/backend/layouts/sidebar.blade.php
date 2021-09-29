 @php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->role=='Admin')
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                  

                </a>
              </li>
              
            </ul>
          </li> 
          @endif
           {{-- <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 Profile Management
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 
 --}}
           <li class="nav-item has-treeview 
            {{($prefix=='/setups')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Setup Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setups.student.class.view')}}" class="nav-link {{($route=='setups.student.class.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Class</p> 
                </a>
              </li>
           </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setups.student.classtitle.view')}}" class="nav-link {{($route=='setups.student.classtitle.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Class Title</p> 
                </a>
              </li>
           </ul>
           <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('years.student.year.view')}}" class="nav-link {{($route=='years.student.year.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Year</p> 
                </a>
              </li>
           </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('groups.student.group.view')}}" class="nav-link {{($route=='groups.student.group.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Gruup</p> 
                </a>
              </li>
           </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('shifts.student.shift.view')}}" class="nav-link {{($route=='shifts.student.shift.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Shift</p> 
                </a>
              </li>
           </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('setups.student.section.view')}}" class="nav-link {{($route=='setups.student.section.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Section</p> 
                </a>
              </li>
           </ul>
           <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('feecats.student.feecat.view')}}" class="nav-link {{($route=='feecats.student.feecat.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Catagory</p> 
                </a>
              </li>
           </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('feecatams.student.feecatam.view')}}" class="nav-link {{($route=='feecatams.student.feecatam.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Catagory Amount</p> 
                </a>
              </li>
           </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('examts.student.examt.view')}}" class="nav-link {{($route=='examts.student.examt.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Type</p> 
                </a>
              </li>
           </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('subjects.student.subject.view')}}" class="nav-link {{($route=='subjects.student.subject.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject</p> 
                </a>
              </li>
           </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('asssubs.student.asssub.view')}}" class="nav-link {{($route=='asssubs.student.asssub.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subject</p> 
                </a>
              </li>
           </ul>
           <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{route('desis.student.desi.view')}}" class="nav-link {{($route=='desis.student.desi.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p> 
                </a>
              </li>
           </ul>
          </li>

          <li class="nav-item has-treeview {{($prefix=='/students')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Student Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.regi.views')}}" class="nav-link {{($route=='students.regi.views')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registrtion</p> 
                </a>
              </li>
           </ul>
            <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.roll.view')}}" class="nav-link {{($route=='students.roll.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roll Generate</p> 
                </a>
              </li>
           </ul>
           <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.regifee.view')}}" class="nav-link {{($route=='students.regifee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Fee</p> 
                </a>
              </li>
           </ul>
            <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.tutionfee.view')}}" class="nav-link {{($route=='students.tutionfee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tution Fee</p> 
                </a>
              </li>
           </ul>
           <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.examfee.view')}}" class="nav-link {{($route=='students.examfee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Fee</p> 
                </a>
              </li>
           </ul>
            <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.busfairfee.view')}}" class="nav-link {{($route=='students.busfairfee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Fair Fee</p> 
                </a>
              </li>
           </ul>
            <ul type="square" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.absentfee.view')}}" class="nav-link {{($route=='students.absentfee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absent Fee</p> 
                </a>
              </li>
           </ul>
         </li>

         <li class="nav-item has-treeview {{($prefix=='/employees')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Employee Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.regi.view')}}" class="nav-link {{($route=='employees.regi.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Registrtion</p> 
                </a>
              </li>
           </ul>
            
             <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.salary.view')}}" class="nav-link {{($route=='employees.salary.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p> 
                </a>
              </li>
           </ul>
         <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.leave.view')}}" class="nav-link {{($route=='employees.leave.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Leave</p> 
                </a>
              </li>
           </ul>
              <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.attendance.view')}}" class="nav-link {{($route=='employees.attendance.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p> 
                </a>
              </li>
           </ul>
            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employees.monthlysalary.view')}}" class="nav-link {{($route=='employees.monthlysalary.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Monthly Salary </p> 
                </a>
              </li>
           </ul>
         </li> 
         <li class="nav-item has-treeview {{($prefix=='/marks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Marks Managment 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.add')}}" class="nav-link {{($route=='marks.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Entry</p> 
                </a>
              </li>
           </ul>
           <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.edit')}}" class="nav-link {{($route=='marks.edit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Edit</p> 
                </a>
              </li>
           </ul>
           <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.grade.view')}}" class="nav-link {{($route=='marks.grade.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Grade</p> 
                </a>
              </li>
           </ul>
           <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marksex.grade.view')}}" class="nav-link {{($route=='marksex.grade.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks 4 Grade </p> 
                </a>
              </li>
           </ul>
           <li class="nav-item has-treeview {{($prefix=='/accounts')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Accounts Managment 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.fee.view')}}" class="nav-link {{($route=='accounts.fee.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Fee</p> 
                </a>
              </li>

        </ul>

        <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.salary.view')}}" class="nav-link {{($route=='accounts.salary.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p> 
                </a>
              </li>
              
        </ul>
         <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('accounts.cost.view')}}" class="nav-link {{($route=='accounts.cost.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Cost</p> 
                </a>
              </li>
        </ul>
    </li>

     <li class="nav-item has-treeview {{($prefix=='/marksheets')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mark Sheet Managment 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marksheets.marksheet.view')}}" class="nav-link {{($route=='marksheets.marksheet.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mark Sheet</p> 
                </a>
              </li>
            </ul>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marksheets.resultsheet.view')}}" class="nav-link {{($route=='marksheets.resultsheet.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Result Sheet</p> 
                </a>
              </li>
            </ul>
    </li>

      <li class="nav-item has-treeview {{($prefix=='/payments')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{route('payments.student.add')}}" class="nav-link {{($route=='payments.student.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Payment</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payments.student.view')}}" class="nav-link {{($route=='payments.student.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve List</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payments.student.pendinglist')}}" class="nav-link {{($route=='payments.student.pendinglist')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending List</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('payments.student.credit')}}" class="nav-link {{($route=='payments.student.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit List</p> 
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('payments.student.paid')}}" class="nav-link {{($route=='payments.student.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid List</p> 
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('payments.student.wise-view')}}" class="nav-link {{($route=='payments.student.wise-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Wise Report</p> 
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('payments.student.daily-view')}}" class="nav-link {{($route=='payments.student.daily-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Payment Report</p> 
                </a>
              </li>

        </ul>
    </li>


     <li class="nav-item has-treeview {{($prefix=='/stuffattendances')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stuff Attendance 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul type="background-color" class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stuffattendances.attendance.view')}}" class="nav-link {{($route=='stuffattendances.attendance.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance Report</p> 
                </a>
              </li>

        </ul>
    </li>

      </nav>
      <!-- /.sidebar-menu -->