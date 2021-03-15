<?php

/*    
|-------------------------------------------------------------------------- 
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/logout', 'LogoutController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

Route::prefix('users')->group(function(){
	Route::get('/view','backend\UserController@view')->name('users.view');
	Route::get('/add','backend\UserController@add')->name('users.add')->middleware('login');
	Route::post('/store','backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','backend\UserController@delete')->name('users.delete');

    
}); 
 
 // prfiles

  Route::prefix('profiles')->group(function(){
	Route::get('/view','backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','backend\ProfileController@passwordupdate')->name('profiles.password.update');

});

  // setups class

  Route::prefix('setups')->group(function(){
	Route::get('/student/class/view','backend\Setup\StudentClassController@view')->name('setups.student.class.view');
	Route::get('/student/class/add','backend\Setup\StudentClassController@add')->name('setups.student.class.add');
	Route::post('/student/class/store','backend\Setup\StudentClassController@store')->name('setups.student.class.store');
	Route::get('/student/class/edit/{id}','backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
Route::post('/student/class/update/{id}','backend\Setup\StudentClassController@update')->name('setups.student.class.update');
Route::get('/student/class/delete/{id}','backend\Setup\StudentClassController@delete')->name('setups.student.class.delete');

// Class Title

    Route::get('/student/class/title/view','backend\Setup\StudentClassTitleController@view')->name('setups.student.classtitle.view');
    Route::get('/student/class/title/add','backend\Setup\StudentClassTitleController@add')->name('setups.student.classtitle.add');
    Route::post('/student/class/title/store','backend\Setup\StudentClassTitleController@store')->name('setups.student.classtitle.store');
    Route::get('/student/class/title/edit/{id}','backend\Setup\StudentClassTitleController@edit')->name('setups.student.classtitle.edit');
Route::post('/student/class/title/update/{id}','backend\Setup\StudentClassTitleController@update')->name('setups.student.classtitle.update');
Route::get('/student/class/title/delete/{id}','backend\Setup\StudentClassTitleController@delete')->name('setups.student.classtitle.delete');


//section

 Route::get('/student/section/view','backend\Setup\StudentSectionController@view')->name('setups.student.section.view');
    Route::get('/student/section/add','backend\Setup\StudentSectionController@add')->name('setups.student.section.add');
    Route::post('/student/section/store','backend\Setup\StudentSectionController@store')->name('setups.student.section.store');
    Route::get('/student/section/edit/{id}','backend\Setup\StudentSectionController@edit')->name('setups.student.section.edit');
Route::post('/student/section/update/{id}','backend\Setup\StudentSectionController@update')->name('setups.student.section.update');
Route::get('/student/section/delete/{id}','backend\Setup\StudentSctionController@delete')->name('setups.student.section.delete');

// setups year


	Route::get('/student/Years/view','backend\Setup\StudentYearController@view')->name('years.student.year.view');
	Route::get('/student/Years/add','backend\Setup\StudentYearController@add')->name('years.student.year.add');
	Route::post('/student/Years/store','backend\Setup\StudentYearController@store')->name('years.student.year.store');
	Route::get('/student/Years/edit/{id}','backend\Setup\StudentYearController@edit')->name('years.student.year.edit');
	Route::post('/student/Years/update/{id}','backend\Setup\StudentYearController@update')->name('years.student.year.update');
	Route::get('/student/Years/delete/{id}','backend\Setup\StudentYearController@delete')->name('years.student.year.delete');


	// setups group

	Route::get('/student/Groups/view','backend\Setup\StudentGroupController@view')->name('groups.student.group.view');
	Route::get('/student/Groups/add','backend\Setup\StudentGroupController@add')->name('groups.student.group.add');
	Route::post('/student/Groups/store','backend\Setup\StudentGroupController@store')->name('groups.student.group.store');
	Route::get('/student/Groups/edit/{id}','backend\Setup\StudentGroupController@edit')->name('groups.student.group.edit');
	Route::post('/student/Groups/update/{id}','backend\Setup\StudentGroupController@update')->name('groups.student.group.update');
	Route::get('/student/Groups/delete/{id}','backend\Setup\StudentGroupController@delete')->name('groups.student.group.delete');

//setups shift

	Route::get('/student/shifts/view','backend\Setup\StudentShiftController@view')->name('shifts.student.shift.view');
	Route::get('/student/shifts/add','backend\Setup\StudentShiftController@add')->name('shifts.student.shift.add');
	Route::post('/student/shifts/store','backend\Setup\StudentShiftController@store')->name('shifts.student.shift.store');
	Route::get('/student/shifts/edit/{id}','backend\Setup\StudentShiftController@edit')->name('shifts.student.shift.edit');
	Route::post('/student/shifts/update/{id}','backend\Setup\StudentShiftController@update')->name('shifts.student.shift.update');
	Route::get('/student/shifts/delete/{id}','backend\Setup\StudentShiftController@delete')->name('shifts.student.shift.delete');


// setups fee catagory


    Route::get('/student/feecats/view','backend\Setup\StudentFeecatController@view')->name('feecats.student.feecat.view');
    Route::get('/student/feecats/add','backend\Setup\StudentFeecatController@add')->name('feecats.student.feecat.add');
    Route::post('/student/feecats/store','backend\Setup\StudentFeecatController@store')->name('feecats.student.feecat.store');
    Route::get('/student/feecats/edit/{id}','backend\Setup\StudentFeecatController@edit')->name('feecats.student.feecat.edit');
    Route::post('/student/feecats/update/{id}','backend\Setup\StudentFeecatController@update')->name('feecats.student.feecat.update');
    Route::get('/student/feecats/delete/{id}','backend\Setup\StudentFeecatController@delete')->name('feecats.student.feecat.delete');


// setups fee catagory Amount

    Route::get('/student/feecatams/view','backend\Setup\StudentFeecatamController@view')->name('feecatams.student.feecatam.view');
    Route::get('/student/feecatams/add','backend\Setup\StudentFeecatamController@add')->name('feecatams.student.feecatam.add');
    Route::post('/student/feecatams/store','backend\Setup\StudentFeecatamController@store')->name('feecatams.student.feecatam.store');
    Route::get('/student/feecatams/edit/{fee_catagory_id}','backend\Setup\StudentFeecatamController@edit')->name('feecatams.student.feecatam.edit');
    Route::post('/student/feecatams/update/{id}','backend\Setup\StudentFeecatamController@update')->name('feecatams.student.feecatam.update');
    Route::get('/student/feecatams/details/{fee_catagory_id}','backend\Setup\StudentFeecatamController@details')->name('feecatams.student.feecatam.details');
    Route::get('/student/feecatams/delete/{fee_catagory_id}','backend\Setup\StudentFeecatamController@delete')->name('feecatams.student.feecatam.delete');


// setups exam type

    Route::get('/student/examts/view','backend\Setup\StudentExamtController@view')->name('examts.student.examt.view');
    Route::get('/student/examts/add','backend\Setup\StudentExamtController@add')->name('examts.student.examt.add');
    Route::post('/student/examts/store','backend\Setup\StudentExamtController@store')->name('examts.student.examt.store');
    Route::get('/student/examts/edit/{id}','backend\Setup\StudentExamtController@edit')->name('examts.student.examt.edit');
    Route::post('/student/examts/update/{id}','backend\Setup\StudentExamtController@update')->name('examts.student.examt.update');
    Route::get('/student/examts/delete/{id}','backend\Setup\StudentExamtController@delete')->name('examts.student.examt.delete');

// setups subject

    Route::get('/student/subjects/view','backend\Setup\StudentSubjectController@view')->name('subjects.student.subject.view');
    Route::get('/student/subjects/add','backend\Setup\StudentSubjectController@add')->name('subjects.student.subject.add');
    Route::post('/student/subjects/store','backend\Setup\StudentSubjectController@store')->name('subjects.student.subject.store');
    Route::get('/student/subjects/edit/{id}','backend\Setup\StudentSubjectController@edit')->name('subjects.student.subject.edit');
    Route::post('/student/subjects/update/{id}','backend\Setup\StudentSubjectController@update')->name('subjects.student.subject.update');
    Route::get('/student/subjects/delete/{id}','backend\Setup\StudentSubjectController@delete')->name('subjects.student.subject.delete');

// setups assign subject

    Route::get('/student/asssubs/view','backend\Setup\AsssubController@view')->name('asssubs.student.asssub.view');
    Route::get('/student/asssubs/add','backend\Setup\AsssubController@add')->name('asssubs.student.asssub.add');
    Route::post('/student/asssubs/store','backend\Setup\AsssubController@store')->name('asssubs.student.asssub.store');
    Route::get('/student/asssubs/edit/{title_id}','backend\Setup\AsssubController@edit')->name('asssubs.student.asssub.edit');
    Route::post('/student/asssubs/update/{title_id}','backend\Setup\AsssubController@update')->name('asssubs.student.asssub.update');
    Route::get('/student/asssubs/details/{title_id}','backend\Setup\AsssubController@details')->name('asssubs.student.asssub.details');
    Route::get('/student/asssubs/delete/{title_id}','backend\Setup\AsssubController@delete')->name('asssubs.student.asssub.delete');

   // setups designation

    Route::get('/student/desis/view','backend\Setup\StudentDesiController@view')->name('desis.student.desi.view');
    Route::get('/student/desis/add','backend\Setup\StudentDesiController@add')->name('desis.student.desi.add');
    Route::post('/student/desis/store','backend\Setup\StudentDesiController@store')->name('desis.student.desi.store');
    Route::get('/student/desis/edit/{id}','backend\Setup\StudentDesiController@edit')->name('desis.student.desi.edit');
    Route::post('/student/desis/update/{id}','backend\Setup\StudentDesiController@update')->name('desis.student.desi.update');
    Route::get('/student/desis/delete/{id}','backend\Setup\StudentDesiController@delete')->name('desis.student.desi.delete');



});

// student registration

Route::prefix('students')->group(function(){
    Route::get('regi/view','backend\Student\StudentRegiController@view')->name('students.regi.view');
    Route::get('regi/add','backend\Student\StudentRegiController@add')->name('students.regi.add')->middleware('login');
    Route::post('regi/store','backend\Student\StudentRegiController@store')->name('students.regi.store');
    Route::get('regi/editregi/{student_id}','backend\Student\StudentRegiController@edit')->name('students.regi.edit');
    Route::post('regi/updateregi/{student_id}','backend\Student\StudentRegiController@update')->name('students.regi.update');
    Route::get('stsearch','backend\Student\StudentRegiController@stsearch')->name('students.stsearch');
    Route::get('regi/promotion/{student_id}','backend\Student\StudentRegiController@promotion')->name('students.regi.promotion');
    Route::post('regi/promotion/store/{student_id}','backend\Student\StudentRegiController@promotionstore')->name('students.regi.promotion.store');

    Route::get('regi/details/{student_id}','backend\Student\StudentRegiController@details')->name('students.regi.details');
    Route::get('regi/delete/{student_id}','backend\Student\StudentRegiController@delete')->name('students.regi.delete');

// roll genarate
 
    Route::get('roll/view','backend\Student\StudentRollController@view')->name('students.roll.view');
    Route::get('roll/get-student','backend\Student\StudentRollController@getstudent')->name('students.roll.get-student');
    Route::post('roll/store','backend\Student\StudentRollController@store')->name('students.roll.store');

    // Registration Fee

     
    Route::get('regi/fee/view','backend\Student\StudentRegiFeeController@view')->name('students.regifee.view');
    Route::get('regi/fee/getsstudent','backend\Student\StudentRegiFeeController@getsstudent')->name('students.regifee.getsstudent');
    Route::get('regi/fee/payslip','backend\Student\StudentRegiFeeController@payslip')->name('students.regifee.payslip');

// Tution Fee
    Route::get('tution/fee/view','backend\Student\StudentTutionFeeController@view')->name('students.tutionfee.view');
    Route::get('tution/fee/getstutionfee','backend\Student\StudentTutionFeeController@getstutionfee')->name('students.tutionfee.getstutionfee');
    Route::get('tution/fee/payslip','backend\Student\StudentTutionFeeController@tutionpayslip')->name('students.tutionfee.payslip');
// Exam Fee
    Route::get('exam/fee/view','backend\Student\StudentExamFeeController@view')->name('students.examfee.view');
    Route::get('exam/fee/getsexamfee','backend\Student\StudentExamFeeController@getsexamfee')->name('students.examfee.getsexamfee');
    Route::get('exam/fee/payslip','backend\Student\StudentExamFeeController@exampayslip')->name('students.examfee.payslip');

    // Bus Fair Fee
    Route::get('busfair/fee/view','backend\Student\StudentBusfairFeeController@view')->name('students.busfairfee.view');
    Route::get('busfair/fee/getsbusfairfee','backend\Student\StudentBusfairFeeController@getsbusfairfee')->name('students.busfairfee.getsbusfairfee');
    Route::get('busfair/fee/payslip','backend\Student\StudentBusfairFeeController@busfairpayslip')->name('students.busfairfee.payslip');

    // Absent Fee
    Route::get('absent/fee/view','backend\Student\StudentAbsentFeeController@view')->name('students.absentfee.view');
    Route::get('absent/fee/getsabsentfee','backend\Student\StudentAbsentFeeController@getsabsentfee')->name('students.absentfee.getsabsentfee');
    Route::get('absent/fee/payslip','backend\Student\StudentAbsentFeeController@absentpayslip')->name('students.absentfee.payslip');

});
            // employee

    Route::prefix('employees')->group(function(){

//        employee regi
    Route::get('regi/view','backend\Employee\EmployeeRegiController@view')->name('employees.regi.view');
    Route::get('regi/add','backend\Employee\EmployeeRegiController@add')->name('employees.regi.add')->middleware('login');
    Route::post('regi/store','backend\Employee\EmployeeRegiController@store')->name('employees.regi.store');
    Route::get('regi/editregi/{id}','backend\Employee\EmployeeRegiController@edit')->name('employees.regi.edit');
    Route::post('regi/updateregi/{id}','backend\Employee\EmployeeRegiController@update')->name('employees.regi.update');
   
    Route::get('stsearch','backend\Employee\EmployeeRegiController@stsearch')->name('employees.stsearch');
    Route::get('regi/promotion/{id}','backend\Employee\EmployeeRegiController@promotion')->name('employees.regi.promotion');
    

    Route::get('regi/details/{id}','backend\Employee\EmployeeRegiController@details')->name('employees.regi.details');
    Route::get('regi/delete/{id}','backend\Employee\StudentRegiController@delete')->name('employees.regi.delete');


//        employee salary
    Route::get('salary/view','backend\Employee\EmployeeSalaryController@view')->name('employees.salary.view');
   
    Route::get('salary/incrementy/{id}','backend\Employee\EmployeeSalaryController@increment')->name('employees.salary.increment');
    Route::post('salary/store/{id}','backend\Employee\EmployeeSalaryController@store')->name('employees.salary.store');
    Route::get('salary/details/{id}','backend\Employee\EmployeeSalaryController@details')->name('employees.salary.details');
    Route::get('salary/detailspdf/{id}','backend\Employee\EmployeeSalaryController@detailspdf')->name('employees.salary.detailspdf');
    Route::get('salary/delete/{id}','backend\Employee\StudentsalaryController@delete')->name('employees.salary.delete');


//        employee leave
    Route::get('leave/view','backend\Employee\EmployeeLeaveController@view')->name('employees.leave.view');
   Route::get('leave/add','backend\Employee\EmployeeLeaveController@add')->name('employees.leave.add');
   Route::post('leave/update/{id}','backend\Employee\EmployeeLeaveController@update')->name('employees.leave.update');
    Route::post('leave/store','backend\Employee\EmployeeLeaveController@store')->name('employees.leave.store');
    Route::get('leave/details/{id}','backend\Employee\EmployeeLeaveController@details')->name('employees.leave.details');
    Route::get('leave/detailspdf/{id}','backend\Employee\EmployeeLeaveController@detailspdf')->name('employees.leave.detailspdf');
    Route::get('leave/edit/{id}','backend\Employee\EmployeeLeaveController@edit')->name('employees.leave.edit');
    
     //employee Attendance
    Route::get('attend/view','backend\Employee\EmployeeAttendController@view')->name('employees.attendance.view');
   Route::get('attend/add','backend\Employee\EmployeeAttendController@add')->name('employees.attendance.add');
   Route::post('attend/update/{attend_date}','backend\Employee\EmployeeAttendController@update')->name('employees.attendance.update');
    Route::post('attend/store','backend\Employee\EmployeeAttendController@store')->name('employees.attendance.store');
    Route::get('attend/details/{attend_date}','backend\Employee\EmployeeAttendController@details')->name('employees.attendance.details');
    Route::get('attend/detailspdf/{attend_date}','backend\Employee\EmployeeAttendController@detailspdf')->name('employees.attendance.detailspdf');
    Route::get('attend/edit/{attend_date}','backend\Employee\EmployeeAttendController@edit')->name('employees.attendance.edit');

// employee Monthly Saary

     
    Route::get('monthly/salary/view','backend\Employee\EmployeeMonthlySalaryController@view')->name('employees.monthlysalary.view');
    Route::get('monthly/salary/get','backend\Employee\EmployeeMonthlySalaryController@getsalary')->name('employees.monthlysalary.getsalary');
    Route::get('monthly/salary/payslip/{employee_id}','backend\Employee\EmployeeMonthlySalaryController@payslip')->name('employees.monthlysalary.payslip');

});

    //marks 
     Route::prefix('marks')->group(function(){

    Route::get('marks/add','backend\Marks\StudentMarksController@add')->name('marks.add');
     Route::post('marks/store','backend\Marks\StudentMarksController@store')->name('marks.store');
     Route::get('marks/edit','backend\Marks\StudentMarksController@edit')->name('marks.edit');
     Route::post('marks/update','backend\Marks\StudentMarksController@update')->name('marks.update');
     Route::get('marks/getmarks','backend\Marks\StudentMarksController@getmarks')->name('marks.getmarks');

     //marks grade
     Route::get('marks/grade/view','backend\Marks\StudentMarksGradeController@view')->name('marks.grade.view');
     Route::get('marks/grade/add','backend\Marks\StudentMarksGradeController@add')->name('marks.grade.add');
     Route::post('marks/grade/store','backend\Marks\StudentMarksGradeController@store')->name('marks.grade.store');
     Route::get('marks/grade/edit/{id}','backend\Marks\StudentMarksGradeController@edit')->name('marks.grade.edit');
     Route::post('marks/grade/update/{id}','backend\Marks\StudentMarksGradeController@update')->name('marks.grade.update');
      Route::get('marks/grade/delete/{id}','backend\Marks\StudentMarksGradeController@delete')->name('marks.grade.delete');
     
//marks grade Extra
     Route::get('marksex/grade/view','backend\Marks\StudentMarksGradeExController@view')->name('marksex.grade.view');
     Route::get('marksex/grade/add','backend\Marks\StudentMarksGradeExController@add')->name('marksex.grade.add');
     Route::post('marksex/grade/store','backend\Marks\StudentMarksGradeExController@store')->name('marksex.grade.store');
     Route::get('marksex/grade/edit/{id}','backend\Marks\StudentMarksGradeExController@edit')->name('marksex.grade.edit');
     Route::post('marksex/grade/update/{id}','backend\Marks\StudentMarksGradeExController@update')->name('marksex.grade.update');
      Route::get('marksex/grade/delete/{id}','backend\Marks\StudentMarksGradeExController@delete')->name('marksex.grade.delete');



});



    Route::get('/gets-student','backend\DefaultController@getsstudent')->name('gets-student');
    Route::get('/get-subject','backend\DefaultController@getsubject')->name('get-subject');



  Route::prefix('accounts')->group(function(){
//marks grade
     Route::get('student/fee/view','backend\account\StudentFeeController@view')->name('accounts.fee.view');
     Route::get('student/fee/add','backend\account\StudentFeeController@add')->name('accounts.fee.add');
     Route::post('student/fee/store','backend\account\StudentFeeController@store')->name('accounts.fee.store');
     Route::get('student/feegetsstudent','backend\account\StudentFeeController@feegetstudent')->name('accounts.fee.getstudent');
     


//marks grade
     Route::get('employee/salary/view','backend\account\SalaryController@view')->name('accounts.salary.view');
     Route::get('employee/salary/add','backend\account\SalaryController@add')->name('accounts.salary.add');
     Route::post('employee/salary/store','backend\account\SalaryController@store')->name('accounts.salary.store');
     Route::get('employee/salarygetsemployee','backend\account\SalaryController@salarygetstudent')->name('accounts.salary.getsemployee');



      Route::get('cost/view','backend\account\OtherCostController@view')->name('accounts.cost.view');
     Route::get('cost/add','backend\account\OtherCostController@add')->name('accounts.cost.add');
     Route::post('cost/store','backend\account\OtherCostController@store')->name('accounts.cost.store');
     Route::get('cost/edit/{id}','backend\account\OtherCostController@edit')->name('accounts.cost.edit');
     Route::post('cost/update/{id}','backend\account\OtherCostController@update')->name('accounts.cost.update');
      Route::get('cost/delete/{id}','backend\account\OtherCostController@delete')->name('accounts.cost.delete');

});

//marks Sheet
    Route::prefix('marksheets')->group(function(){

      Route::get('marksheet/view','backend\marksheet\MarkSheetController@marksheetview')->name('marksheets.marksheet.view');
       Route::get('marksheet/get','backend\marksheet\MarkSheetController@marksheetget')->name('marksheets.marksheet.get');

//All Student Result
       Route::get('resultsheet/view','backend\marksheet\MarkSheetController@resultsheetview')->name('marksheets.resultsheet.view');
       Route::get('resultsheet/get','backend\marksheet\MarkSheetController@resultsheetget')->name('marksheets.resultsheet.get');

});
       //attendace Report
        Route::prefix('stuffattendances')->group(function(){
     Route::get('attendance/view','backend\marksheet\MarkSheetController@attendanceview')->name('stuffattendances.attendance.view');
       Route::get('attendance/get','backend\marksheet\MarkSheetController@attendanceget')->name('stuffattendances.attendance.get');

});



});




