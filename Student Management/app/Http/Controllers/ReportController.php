<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IT;
use App\Models\Business;
use App\Models\Accounting;
use App\Models\Student;

class ReportController extends Controller
{
    public function show()
    {
        $it_reports = IT::all();
        $business_reports = Business::all();
        $accounting_reports = Accounting::all();


        return view('student_report', ['it_reports' => $it_reports, 'business_reports' => $business_reports, 'accounting_reports' => $accounting_reports]);
    }



    public function show_student_data()
    {
        $students = Student::all();

        return view('student_database', ['students' => $students]);
    }


    public function update_student()
    {
        Student::where('id', request('id'))->update([
            'name' => request('name'),
            'dob' => request('dob'),
            'age' => request('age'),
            'EMcontact' => request('EMcontact')
        ]);

        $name = request('name');
        $faculty = request('faculty');

        $ifUpdate =  $this->configFacultyData(request('faculty'), request('id'), request('name'));

        return redirect('/student_database')->with('successUpdate', 'Successfully updated student record');
    }



    private function configFacultyData($faculty, $id, $newName)
    {

        if ($faculty == "Information Technology") {
            IT::where('student_id', $id)->update(['name' => $newName]);
        } else if ($faculty == "Business") {
            Business::where('student_id', $id)->update(['name' => $newName]);
        } else if ($faculty == "Accounting") {
            Accounting::where('student_id', $id)->update(['name' => $newName]);
        }
    }



    public function destroy($id)
    {
        $student = Student::find($id);

        $this->removeStudentInFaculty($student->faculty, $id);

        $student->delete();



        return redirect('/student_database')->with('successDelete', 'The student has been removed from database' . $student->faculty);
    }


    private function removeStudentInFaculty($faculty, $id)
    {

        if ($faculty == "Information Technology") {
            $it_student = IT::where('student_id', $id);
            $it_student->delete();
        } else if ($faculty == "Business") {
            $bz_student = Business::where('student_id', $id);
            $bz_student->delete();
        } else if ($faculty == "Accounting") {
            $acc_student = Accounting::where('student_id', $id);
            $acc_student->delete();
        }
    }
    // public function student_database()
    // {
    //     $students = Student::all();

    //     return view('student_database', ['students' => $students]);
    // }
}
