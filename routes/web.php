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
	Route::get('/view','Backend\UserController@view')->name('users.view');
	Route::get('/add','Backend\UserController@add')->name('users.add')->middleware('login');
	Route::post('/store','Backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');

    
}); 
 
 // prfiles

  Route::prefix('profiles')->group(function(){
	Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','Backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','Backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','Backend\ProfileController@passwordupdate')->name('profiles.password.update');

});

  // setups class

  Route::prefix('setups')->group(function(){
	Route::get('/student/class/view','Backend\Setup\StudentClassController@view')->name('setups.student.class.view');
	Route::get('/student/class/add','Backend\Setup\StudentClassController@add')->name('setups.student.class.add');
	Route::post('/student/class/store','Backend\Setup\StudentClassController@store')->name('setups.student.class.store');
	Route::get('/student/class/edit/{id}','Backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
Route::post('/student/class/update/{id}','Backend\Setup\StudentClassController@update')->name('setups.student.class.update');
Route::get('/student/class/delete/{id}','Backend\Setup\StudentClassController@delete')->name('setups.student.class.delete');

// Class Title

    Route::get('/student/class/title/view','Backend\Setup\StudentClassTitleController@view')->name('setups.student.classtitle.view');
    Route::get('/student/class/title/add','Backend\Setup\StudentClassTitleController@add')->name('setups.student.classtitle.add');
    Route::post('/student/class/title/store','Backend\Setup\StudentClassTitleController@store')->name('setups.student.classtitle.store');
    Route::get('/student/class/title/edit/{id}','Backend\Setup\StudentClassTitleController@edit')->name('setups.student.classtitle.edit');
Route::post('/student/class/title/update/{id}','Backend\Setup\StudentClassTitleController@update')->name('setups.student.classtitle.update');
Route::get('/student/class/title/delete/{id}','Backend\Setup\StudentClassTitleController@delete')->name('setups.student.classtitle.delete');


//section

 Route::get('/student/section/view','Backend\Setup\StudentSectionController@view')->name('setups.student.section.view');
    Route::get('/student/section/add','Backend\Setup\StudentSectionController@add')->name('setups.student.section.add');
    Route::post('/student/section/store','Backend\Setup\StudentSectionController@store')->name('setups.student.section.store');
    Route::get('/student/section/edit/{id}','Backend\Setup\StudentSectionController@edit')->name('setups.student.section.edit');
Route::post('/student/section/update/{id}','Backend\Setup\StudentSectionController@update')->name('setups.student.section.update');
Route::get('/student/section/delete/{id}','Backend\Setup\StudentSctionController@delete')->name('setups.student.section.delete');

// setups year


	Route::get('/student/Years/view','Backend\Setup\StudentYearController@view')->name('years.student.year.view');
	Route::get('/student/Years/add','Backend\Setup\StudentYearController@add')->name('years.student.year.add');
	Route::post('/student/Years/store','Backend\Setup\StudentYearController@store')->name('years.student.year.store');
	Route::get('/student/Years/edit/{id}','Backend\Setup\StudentYearController@edit')->name('years.student.year.edit');
	Route::post('/student/Years/update/{id}','Backend\Setup\StudentYearController@update')->name('years.student.year.update');
	Route::get('/student/Years/delete/{id}','Backend\Setup\StudentYearController@delete')->name('years.student.year.delete');


	// setups group

	Route::get('/student/Groups/view','Backend\Setup\StudentGroupController@view')->name('groups.student.group.view');
	Route::get('/student/Groups/add','Backend\Setup\StudentGroupController@add')->name('groups.student.group.add');
	Route::post('/student/Groups/store','Backend\Setup\StudentGroupController@store')->name('groups.student.group.store');
	Route::get('/student/Groups/edit/{id}','Backend\Setup\StudentGroupController@edit')->name('groups.student.group.edit');
	Route::post('/student/Groups/update/{id}','Backend\Setup\StudentGroupController@update')->name('groups.student.group.update');
	Route::get('/student/Groups/delete/{id}','Backend\Setup\StudentGroupController@delete')->name('groups.student.group.delete');

//setups shift

	Route::get('/student/shifts/view','Backend\Setup\StudentShiftController@view')->name('shifts.student.shift.view');
	Route::get('/student/shifts/add','Backend\Setup\StudentShiftController@add')->name('shifts.student.shift.add');
	Route::post('/student/shifts/store','Backend\Setup\StudentShiftController@store')->name('shifts.student.shift.store');
	Route::get('/student/shifts/edit/{id}','Backend\Setup\StudentShiftController@edit')->name('shifts.student.shift.edit');
	Route::post('/student/shifts/update/{id}','Backend\Setup\StudentShiftController@update')->name('shifts.student.shift.update');
	Route::get('/student/shifts/delete/{id}','Backend\Setup\StudentShiftController@delete')->name('shifts.student.shift.delete');


// setups fee catagory


    Route::get('/student/feecats/view','Backend\Setup\StudentFeecatController@view')->name('feecats.student.feecat.view');
    Route::get('/student/feecats/add','Backend\Setup\StudentFeecatController@add')->name('feecats.student.feecat.add');
    Route::post('/student/feecats/store','Backend\Setup\StudentFeecatController@store')->name('feecats.student.feecat.store');
    Route::get('/student/feecats/edit/{id}','Backend\Setup\StudentFeecatController@edit')->name('feecats.student.feecat.edit');
    Route::post('/student/feecats/update/{id}','Backend\Setup\StudentFeecatController@update')->name('feecats.student.feecat.update');
    Route::get('/student/feecats/delete/{id}','Backend\Setup\StudentFeecatController@delete')->name('feecats.student.feecat.delete');


// setups fee catagory Amount

    Route::get('/student/feecatams/view','Backend\Setup\StudentFeecatamController@view')->name('feecatams.student.feecatam.view');
    Route::get('/student/feecatams/add','Backend\Setup\StudentFeecatamController@add')->name('feecatams.student.feecatam.add');
    Route::post('/student/feecatams/store','Backend\Setup\StudentFeecatamController@store')->name('feecatams.student.feecatam.store');
    Route::get('/student/feecatams/edit/{fee_catagory_id}','Backend\Setup\StudentFeecatamController@edit')->name('feecatams.student.feecatam.edit');
    Route::post('/student/feecatams/update/{id}','Backend\Setup\StudentFeecatamController@update')->name('feecatams.student.feecatam.update');
    Route::get('/student/feecatams/details/{fee_catagory_id}','Backend\Setup\StudentFeecatamController@details')->name('feecatams.student.feecatam.details');
    Route::get('/student/feecatams/delete/{fee_catagory_id}','Backend\Setup\StudentFeecatamController@delete')->name('feecatams.student.feecatam.delete');


// setups exam type

    Route::get('/student/examts/view','Backend\Setup\StudentExamtController@view')->name('examts.student.examt.view');
    Route::get('/student/examts/add','Backend\Setup\StudentExamtController@add')->name('examts.student.examt.add');
    Route::post('/student/examts/store','Backend\Setup\StudentExamtController@store')->name('examts.student.examt.store');
    Route::get('/student/examts/edit/{id}','Backend\Setup\StudentExamtController@edit')->name('examts.student.examt.edit');
    Route::post('/student/examts/update/{id}','Backend\Setup\StudentExamtController@update')->name('examts.student.examt.update');
    Route::get('/student/examts/delete/{id}','Backend\Setup\StudentExamtController@delete')->name('examts.student.examt.delete');

// setups subject

    Route::get('/student/subjects/view','Backend\Setup\StudentSubjectController@view')->name('subjects.student.subject.view');
    Route::get('/student/subjects/add','Backend\Setup\StudentSubjectController@add')->name('subjects.student.subject.add');
    Route::post('/student/subjects/store','Backend\Setup\StudentSubjectController@store')->name('subjects.student.subject.store');
    Route::get('/student/subjects/edit/{id}','Backend\Setup\StudentSubjectController@edit')->name('subjects.student.subject.edit');
    Route::post('/student/subjects/update/{id}','Backend\Setup\StudentSubjectController@update')->name('subjects.student.subject.update');
    Route::get('/student/subjects/delete/{id}','Backend\Setup\StudentSubjectController@delete')->name('subjects.student.subject.delete');

// setups assign subject

    Route::get('/student/asssubs/view','Backend\Setup\AsssubController@view')->name('asssubs.student.asssub.view');
    Route::get('/student/asssubs/add','Backend\Setup\AsssubController@add')->name('asssubs.student.asssub.add');
    Route::post('/student/asssubs/store','Backend\Setup\AsssubController@store')->name('asssubs.student.asssub.store');
    Route::get('/student/asssubs/edit/{title_id}','Backend\Setup\AsssubController@edit')->name('asssubs.student.asssub.edit');
    Route::post('/student/asssubs/update/{title_id}','Backend\Setup\AsssubController@update')->name('asssubs.student.asssub.update');
    Route::get('/student/asssubs/details/{title_id}','Backend\Setup\AsssubController@details')->name('asssubs.student.asssub.details');
    Route::get('/student/asssubs/delete/{title_id}','Backend\Setup\AsssubController@delete')->name('asssubs.student.asssub.delete');

   // setups designation

    Route::get('/student/desis/view','Backend\Setup\StudentDesiController@view')->name('desis.student.desi.view');
    Route::get('/student/desis/add','Backend\Setup\StudentDesiController@add')->name('desis.student.desi.add');
    Route::post('/student/desis/store','Backend\Setup\StudentDesiController@store')->name('desis.student.desi.store');
    Route::get('/student/desis/edit/{id}','Backend\Setup\StudentDesiController@edit')->name('desis.student.desi.edit');
    Route::post('/student/desis/update/{id}','Backend\Setup\StudentDesiController@update')->name('desis.student.desi.update');
    Route::get('/student/desis/delete/{id}','Backend\Setup\StudentDesiController@delete')->name('desis.student.desi.delete');



});

// student registration

Route::prefix('students')->group(function(){
    Route::get('regi/view','Backend\Student\StudentRegiController@view')->name('students.regi.view');
    Route::get('regi/add','Backend\Student\StudentRegiController@add')->name('students.regi.add')->middleware('login');
    Route::post('regi/store','Backend\Student\StudentRegiController@store')->name('students.regi.store');
    Route::get('regi/editregi/{student_id}','Backend\Student\StudentRegiController@edit')->name('students.regi.edit');
    Route::post('regi/updateregi/{student_id}','Backend\Student\StudentRegiController@update')->name('students.regi.update');
    Route::get('stsearch','Backend\Student\StudentRegiController@stsearch')->name('students.stsearch');
    Route::get('regi/promotion/{student_id}','Backend\Student\StudentRegiController@promotion')->name('students.regi.promotion');
    Route::post('regi/promotion/store/{student_id}','Backend\Student\StudentRegiController@promotionstore')->name('students.regi.promotion.store');

    Route::get('regi/details/{student_id}','Backend\Student\StudentRegiController@details')->name('students.regi.details');
    Route::get('regi/delete/{student_id}','Backend\Student\StudentRegiController@delete')->name('students.regi.delete');

// roll genarate
 
    Route::get('roll/view','Backend\Student\StudentRollController@view')->name('students.roll.view');
    Route::get('roll/get-student','Backend\Student\StudentRollController@getstudent')->name('students.roll.get-student');
    Route::post('roll/store','Backend\Student\StudentRollController@store')->name('students.roll.store');

    // Registration Fee

     
    Route::get('regi/fee/view','Backend\Student\StudentRegiFeeController@view')->name('students.regifee.view');
    Route::get('regi/fee/getsstudent','Backend\Student\StudentRegiFeeController@getsstudent')->name('students.regifee.getsstudent');
    Route::get('regi/fee/payslip','Backend\Student\StudentRegiFeeController@payslip')->name('students.regifee.payslip');

// Tution Fee
    Route::get('tution/fee/view','Backend\Student\StudentTutionFeeController@view')->name('students.tutionfee.view');
    Route::get('tution/fee/getstutionfee','Backend\Student\StudentTutionFeeController@getstutionfee')->name('students.tutionfee.getstutionfee');
    Route::get('tution/fee/payslip','Backend\Student\StudentTutionFeeController@tutionpayslip')->name('students.tutionfee.payslip');
// Exam Fee
    Route::get('exam/fee/view','Backend\Student\StudentExamFeeController@view')->name('students.examfee.view');
    Route::get('exam/fee/getsexamfee','Backend\Student\StudentExamFeeController@getsexamfee')->name('students.examfee.getsexamfee');
    Route::get('exam/fee/payslip','Backend\Student\StudentExamFeeController@exampayslip')->name('students.examfee.payslip');

    // Bus Fair Fee
    Route::get('busfair/fee/view','Backend\Student\StudentBusfairFeeController@view')->name('students.busfairfee.view');
    Route::get('busfair/fee/getsbusfairfee','Backend\Student\StudentBusfairFeeController@getsbusfairfee')->name('students.busfairfee.getsbusfairfee');
    Route::get('busfair/fee/payslip','Backend\Student\StudentBusfairFeeController@busfairpayslip')->name('students.busfairfee.payslip');

    // Absent Fee
    Route::get('absent/fee/view','Backend\Student\StudentAbsentFeeController@view')->name('students.absentfee.view');
    Route::get('absent/fee/getsabsentfee','Backend\Student\StudentAbsentFeeController@getsabsentfee')->name('students.absentfee.getsabsentfee');
    Route::get('absent/fee/payslip','Backend\Student\StudentAbsentFeeController@absentpayslip')->name('students.absentfee.payslip'); 

});

        // Student Payment
Route::prefix('payments')->group(function(){
    Route::get('payments/student/view','Backend\Payment\StudentPaymentController@viewpayment')->name('payments.student.view');
    Route::get('payments/student/add','Backend\Payment\StudentPaymentController@addpayment')->name('payments.student.add');
    Route::post('payments/student/store','Backend\Payment\StudentPaymentController@storepayment')->name('payments.student.store');
     Route::get('payments/student/allview/{id}','Backend\Payment\StudentPaymentController@allview')->name('payments.student.allview');
     Route::get('payments/student/pdf/{id}','Backend\Payment\StudentPaymentController@studentinvoicepdf')->name('payments.student.idbypdf');
      Route::get('payments/student/delete/{id}','Backend\Payment\StudentPaymentController@delete')->name('payments.student.delete');
      Route::get('payments/student/pending-list','Backend\Payment\StudentPaymentController@pendinglist')->name('payments.student.pendinglist');
       Route::get('payments/student/approveview/{id}','Backend\Payment\StudentPaymentController@approveview')->name('payments.student.approveview');
       Route::post('payments/student/approvestore/{id}','Backend\Payment\StudentPaymentController@approvestore')->name('payments.student.approvestore');
  
  //========Customer Credit Or due============
    Route::get('/credit/student/payment','backend\Payment\StudentPaymentController@creditstudent')->name('payments.student.credit');
    Route::get('/credit/student/payment/pdf','backend\Payment\StudentPaymentController@creditpaymentpdf')->name('payments.student.credit-pdf');
    Route::get('/invoice/student/payment/edit/{invoice_id}','backend\Payment\StudentPaymentController@invoicestudentedit')->name('payments.student.invoice-edit');
    Route::post('/invoice/student/payment/update/{invoice_id}','backend\Payment\StudentPaymentController@invoicestudentupdate')->name('payments.student.invoice-update');
     Route::get('/paid/student/payment','backend\Payment\StudentPaymentController@paidstudent')->name('payments.student.paid');
    
    // Student Wisw
     Route::get('/student/wise/report','backend\Payment\StudentPaymentController@studentwisereport')->name('payments.student.wise-view');

     Route::get('/customer/wise/payment/report','backend\Payment\StudentPaymentController@studentwisepaymentreport')->name('payments.student.wise-payment-report');
    Route::get('/customer/wise/credit/report','backend\Payment\StudentPaymentController@studentwisecreditreport')->name('payments.student.wise-credit-report');
    Route::get('/customer/wise/paid/report','backend\Payment\StudentPaymentController@studentwisepaidreport')->name('payments.student.wise-paid-report');

    // Daily Report

    Route::get('daily/invoice/view', 'backend\Payment\StudentPaymentController@dailyview')->name('payments.student.daily-view');
Route::get('daily/invoice/report', 'backend\Payment\StudentPaymentController@dailyreportpdf')->name('payments.student.daily-report-pdf');
Route::get('/invoice/daily/report', 'backend\Payment\StudentPaymentController@dailyreport')->name('payments.student.daily-report');

});
            // employee

    Route::prefix('employees')->group(function(){

//        employee regi
    Route::get('regi/view','Backend\Employee\EmployeeRegiController@view')->name('employees.regi.view');
    Route::get('regi/add','Backend\Employee\EmployeeRegiController@add')->name('employees.regi.add')->middleware('login');
    Route::post('regi/store','Backend\Employee\EmployeeRegiController@store')->name('employees.regi.store');
    Route::get('regi/editregi/{id}','Backend\Employee\EmployeeRegiController@edit')->name('employees.regi.edit');
    Route::post('regi/updateregi/{id}','Backend\Employee\EmployeeRegiController@update')->name('employees.regi.update');
   
    Route::get('stsearch','Backend\Employee\EmployeeRegiController@stsearch')->name('employees.stsearch');
    Route::get('regi/promotion/{id}','Backend\Employee\EmployeeRegiController@promotion')->name('employees.regi.promotion');
    

    Route::get('regi/details/{id}','Backend\Employee\EmployeeRegiController@details')->name('employees.regi.details');
    Route::get('regi/delete/{id}','Backend\Employee\StudentRegiController@delete')->name('employees.regi.delete');


//        employee salary
    Route::get('salary/view','Backend\Employee\EmployeeSalaryController@view')->name('employees.salary.view');
   
    Route::get('salary/incrementy/{id}','Backend\Employee\EmployeeSalaryController@increment')->name('employees.salary.increment');
    Route::post('salary/store/{id}','Backend\Employee\EmployeeSalaryController@store')->name('employees.salary.store');
    Route::get('salary/details/{id}','Backend\Employee\EmployeeSalaryController@details')->name('employees.salary.details');
    Route::get('salary/detailspdf/{id}','Backend\Employee\EmployeeSalaryController@detailspdf')->name('employees.salary.detailspdf');
    Route::get('salary/delete/{id}','Backend\Employee\StudentsalaryController@delete')->name('employees.salary.delete');


//        employee leave
    Route::get('leave/view','Backend\Employee\EmployeeLeaveController@view')->name('employees.leave.view');
   Route::get('leave/add','Backend\Employee\EmployeeLeaveController@add')->name('employees.leave.add');
   Route::post('leave/update/{id}','Backend\Employee\EmployeeLeaveController@update')->name('employees.leave.update');
    Route::post('leave/store','Backend\Employee\EmployeeLeaveController@store')->name('employees.leave.store');
    Route::get('leave/details/{id}','Backend\Employee\EmployeeLeaveController@details')->name('employees.leave.details');
    Route::get('leave/detailspdf/{id}','Backend\Employee\EmployeeLeaveController@detailspdf')->name('employees.leave.detailspdf');
    Route::get('leave/edit/{id}','Backend\Employee\EmployeeLeaveController@edit')->name('employees.leave.edit');
    
     //employee Attendance
    Route::get('attend/view','Backend\Employee\EmployeeAttendController@view')->name('employees.attendance.view');
   Route::get('attend/add','Backend\Employee\EmployeeAttendController@add')->name('employees.attendance.add');
   Route::post('attend/update/{attend_date}','Backend\Employee\EmployeeAttendController@update')->name('employees.attendance.update');
    Route::post('attend/store','Backend\Employee\EmployeeAttendController@store')->name('employees.attendance.store');
    Route::get('attend/details/{attend_date}','Backend\Employee\EmployeeAttendController@details')->name('employees.attendance.details');
    Route::get('attend/detailspdf/{attend_date}','Backend\Employee\EmployeeAttendController@detailspdf')->name('employees.attendance.detailspdf');
    Route::get('attend/edit/{attend_date}','Backend\Employee\EmployeeAttendController@edit')->name('employees.attendance.edit');

// employee Monthly Saary

     
    Route::get('monthly/salary/view','Backend\Employee\EmployeeMonthlySalaryController@view')->name('employees.monthlysalary.view');
    Route::get('monthly/salary/get','Backend\Employee\EmployeeMonthlySalaryController@getsalary')->name('employees.monthlysalary.getsalary');
    Route::get('monthly/salary/payslip/{employee_id}','Backend\Employee\EmployeeMonthlySalaryController@payslip')->name('employees.monthlysalary.payslip');

});

    //marks 
     Route::prefix('marks')->group(function(){

    Route::get('marks/add','Backend\Marks\StudentMarksController@add')->name('marks.add');
     Route::post('marks/store','Backend\Marks\StudentMarksController@store')->name('marks.store');
     Route::get('marks/edit','Backend\Marks\StudentMarksController@edit')->name('marks.edit');
     Route::post('marks/update','Backend\Marks\StudentMarksController@update')->name('marks.update');
     Route::get('marks/getmarks','Backend\Marks\StudentMarksController@getmarks')->name('marks.getmarks');

     //marks grade
     Route::get('marks/grade/view','Backend\Marks\StudentMarksGradeController@view')->name('marks.grade.view');
     Route::get('marks/grade/add','Backend\Marks\StudentMarksGradeController@add')->name('marks.grade.add');
     Route::post('marks/grade/store','Backend\Marks\StudentMarksGradeController@store')->name('marks.grade.store');
     Route::get('marks/grade/edit/{id}','Backend\Marks\StudentMarksGradeController@edit')->name('marks.grade.edit');
     Route::post('marks/grade/update/{id}','Backend\Marks\StudentMarksGradeController@update')->name('marks.grade.update');
      Route::get('marks/grade/delete/{id}','Backend\Marks\StudentMarksGradeController@delete')->name('marks.grade.delete');
     
//marks grade Extra
     Route::get('marksex/grade/view','Backend\Marks\StudentMarksGradeExController@view')->name('marksex.grade.view');
     Route::get('marksex/grade/add','Backend\Marks\StudentMarksGradeExController@add')->name('marksex.grade.add');
     Route::post('marksex/grade/store','Backend\Marks\StudentMarksGradeExController@store')->name('marksex.grade.store');
     Route::get('marksex/grade/edit/{id}','Backend\Marks\StudentMarksGradeExController@edit')->name('marksex.grade.edit');
     Route::post('marksex/grade/update/{id}','Backend\Marks\StudentMarksGradeExController@update')->name('marksex.grade.update');
      Route::get('marksex/grade/delete/{id}','Backend\Marks\StudentMarksGradeExController@delete')->name('marksex.grade.delete');



});



    Route::get('/gets-student','Backend\DefaultController@getsstudent')->name('gets-student');
    Route::get('/get-subject','Backend\DefaultController@getsubject')->name('get-subject');



  Route::prefix('accounts')->group(function(){
//marks grade
     Route::get('student/fee/view','Backend\account\StudentFeeController@view')->name('accounts.fee.view');
     Route::get('student/fee/add','Backend\account\StudentFeeController@add')->name('accounts.fee.add');
     Route::post('student/fee/store','Backend\account\StudentFeeController@store')->name('accounts.fee.store');
     Route::get('student/feegetsstudent','Backend\account\StudentFeeController@feegetstudent')->name('accounts.fee.getstudent');
     


//marks grade
     Route::get('employee/salary/view','Backend\account\SalaryController@view')->name('accounts.salary.view');
     Route::get('employee/salary/add','Backend\account\SalaryController@add')->name('accounts.salary.add');
     Route::post('employee/salary/store','Backend\account\SalaryController@store')->name('accounts.salary.store');
     Route::get('employee/salarygetsemployee','Backend\account\SalaryController@salarygetstudent')->name('accounts.salary.getsemployee');



      Route::get('cost/view','Backend\account\OtherCostController@view')->name('accounts.cost.view');
     Route::get('cost/add','Backend\account\OtherCostController@add')->name('accounts.cost.add');
     Route::post('cost/store','Backend\account\OtherCostController@store')->name('accounts.cost.store');
     Route::get('cost/edit/{id}','Backend\account\OtherCostController@edit')->name('accounts.cost.edit');
     Route::post('cost/update/{id}','Backend\account\OtherCostController@update')->name('accounts.cost.update');
      Route::get('cost/delete/{id}','Backend\account\OtherCostController@delete')->name('accounts.cost.delete');

});

//marks Sheet
    Route::prefix('marksheets')->group(function(){

      Route::get('marksheet/view','Backend\marksheet\MarkSheetController@marksheetview')->name('marksheets.marksheet.view');
       Route::get('marksheet/get','Backend\marksheet\MarkSheetController@marksheetget')->name('marksheets.marksheet.get');

//All Student Result
       Route::get('resultsheet/view','Backend\marksheet\MarkSheetController@resultsheetview')->name('marksheets.resultsheet.view');
       Route::get('resultsheet/get','Backend\marksheet\MarkSheetController@resultsheetget')->name('marksheets.resultsheet.get');

});
       //attendace Report
        Route::prefix('stuffattendances')->group(function(){
     Route::get('attendance/view','Backend\marksheet\MarkSheetController@attendanceview')->name('stuffattendances.attendance.view');
       Route::get('attendance/get','Backend\marksheet\MarkSheetController@attendanceget')->name('stuffattendances.attendance.get');


});

        Route::get('/get-category', 'backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-subcategory', 'backend\DefaultController@subgetcategory')->name('get-subcategory');
Route::get('/get-subsubcategory', 'backend\DefaultController@subsubgetcategory')->name('get-subsubcategory');
Route::get('/get-brand', 'backend\DefaultController@getbrand')->name('get-brand');
Route::get('/get-productname', 'backend\DefaultController@getproductname')->name('get-productname');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-unit', 'backend\DefaultController@getunit')->name('get-unit');
Route::get('/get-model', 'backend\DefaultController@getmodel')->name('get-model');
Route::get('/get-size', 'backend\DefaultController@getsize')->name('get-size');
Route::get('/get-color', 'backend\DefaultController@getcolor')->name('get-color');
Route::get('/get-product-code', 'backend\DefaultController@getproductcode')->name('get-product-code');
Route::get('/get-stock', 'backend\DefaultController@getstock')->name('get-stock');
Route::get('/get-warranty-time', 'backend\DefaultController@getwarrantytime')->name('get-warranty-time');

Route::get('/get-product-name', 'backend\DefaultController@getproduct')->name('get-product');
Route::get('/get-id', 'backend\DefaultController@getid')->name('get-id');
Route::get('/get-name', 'backend\DefaultController@getname')->name('get-name');
Route::get('/get-fname', 'backend\DefaultController@getfname')->name('get-fname');
Route::get('/get-mname', 'backend\DefaultController@getmname')->name('get-mname');
Route::get('/get-mobile', 'backend\DefaultController@getmobile')->name('get-mobile');
});




