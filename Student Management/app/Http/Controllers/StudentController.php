<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\IT;
use App\Models\Business;
use App\Models\Accounting;


class StudentController extends Controller
{

    public $successRegister = false;

    public function index()
    {
        $user = [
            'id' => 'Admin',
            'pwd' => '123'
        ];

        return view('welcome', $user);
    }


    public function show()
    {
        return view('dashboard');
    }

    public function studentPortal()
    {
        return view('studentRegister');
    }



    public function store_new_student_data()
    {
        $student = new Student();

        $student->name = request('name');
        $student->icNum = request('ic');
        $student->dob = request('dob');
        $student->age = request('age');
        $student->gender = request('gender')[0];
        $student->faculty = request('faculty')[0];
        $student->EMname = request('EMname');
        $student->relation = request('relation');
        $student->EMcontact = request('EMcontact');
        $student->save();


        $this->successRegister = TRUE;

        $this->assignFacultyOnRegister(request('name'), request('faculty')[0], $student->id);

        return redirect('/dashboard')->with('msg', $this->successRegister);
    }



    private function assignFacultyOnRegister($name, $faculty, $id)
    {
        $defaultMark = 0;

        if ($faculty == "Information Technology") {

            $it_faculty = new IT();
            $it_faculty->name = $name;
            $it_faculty->Mathematics = $defaultMark;
            $it_faculty->DatabaseDesign = $defaultMark;
            $it_faculty->ComputerArchitecture = $defaultMark;
            $it_faculty->Networking = $defaultMark;
            $it_faculty->student_id = $id;
            $it_faculty->save();
        } else if ($faculty == "Accounting") {
            $account_faculty = new Accounting();
            $account_faculty->name = $name;
            $account_faculty->Finance = $defaultMark;
            $account_faculty->Economics = $defaultMark;
            $account_faculty->Taxation = $defaultMark;
            $account_faculty->Forensic = $defaultMark;
            $account_faculty->student_id = $id;
            $account_faculty->save();
        } else if ($faculty == "Business") {
            $biz_faculty = new Business();
            $biz_faculty->name =  $name;
            $biz_faculty->SupplyChain =  $defaultMark;
            $biz_faculty->HumanResource =  $defaultMark;
            $biz_faculty->Economics =  $defaultMark;
            $biz_faculty->BusinessLaw =  $defaultMark;
            $biz_faculty->student_id = $id;
            $biz_faculty->save();
        }
    }


    public function student_marking_page()
    {

        $facultySelected = false;

        if ($faculty = request('searchFaculty')) {
            $facultySelected = true;
            $student = Student::where('faculty', $faculty)->get();
        } else {
            $student = Student::all();
            $student[0]->faculty = "";
        }

        // $targetModel = $this->searchFaculty(request('searchFaculty'));

        return view('studentMarking', ['students' => $student, 'facultySelected' => $facultySelected]);
    }



    public function update_student_mark()
    {
        $faculty = request('faculty');
        $studentName = request('studentName');

        $this->updateMark($faculty, $studentName);

        // $testName = IT::where('name', request('studentName')[0])->get();

        return redirect('/student_marking')->with('msg', 'Successfully marked student marks');
    }



    private function updateMark($faculty, $studentName)
    {
        if ($faculty[0] == "Information Technology") {

            for ($i = 0; $i < count($faculty); $i++) {

                IT::where('name', $studentName[$i])->update([
                    'Mathematics' => request('markSub1')[$i],
                    'DatabaseDesign' => request('markSub2')[$i],
                    'ComputerArchitecture' => request('markSub3')[$i],
                    'Networking' => request('markSub4')[$i]
                ]);
            }
        } else if ($faculty[0] == "Accounting") {
            for ($i = 0; $i < count($faculty); $i++) {

                Accounting::where('name', $studentName[$i])->update([
                    'Finance' => request('markSub1')[$i],
                    'Economics' => request('markSub2')[$i],
                    'Taxation' => request('markSub3')[$i],
                    'Forensic' => request('markSub4')[$i]
                ]);
            }
        } else if ($faculty[0] == "Business") {

            for ($i = 0; $i < count($faculty); $i++) {

                Business::where('name', $studentName[$i])->update([
                    'SupplyChain' => request('markSub1')[$i],
                    'HumanResource' => request('markSub2')[$i],
                    'Economics' => request('markSub3')[$i],
                    'BusinessLaw' => request('markSub4')[$i]
                ]);
            }
        }
    }
}
