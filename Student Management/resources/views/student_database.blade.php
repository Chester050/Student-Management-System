@extends('layouts.header')

@section('content')

@if(session('successUpdate'))
<h5> <div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{session('successUpdate')}}
  </div></h5>

  @elseif(session('successDelete'))
  <h5> <div class="alert alert-warning alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> {{session('successDelete')}}
  </div></h5>
  @endif

<table class="table table-striped">
    @php

        $countStudent = 0;
    @endphp
    <tr>
        <th>Student ID </th>
        <th>Name</th>
        <th> Date of birthday(yyyy/dd/mm) </th>
        <th> Age </th>
        <th> Faculty </th>
        <th> Emergency Contact Number </th>
        <th colspan="2" class="text-center"> Action </th>
    </tr>


    @foreach($students as $student)

    @php
        $countStudent += 1 ;
    @endphp
    <tr>
        <form class="update-form">
            @csrf
    <td>  <input type="text" name="id" id="id" class="form-control w-25 student_id" value="{{$student->id}}" readonly>  </td>
    <td> <input type="text" name="name" class="form-control w-75 name" value="{{$student->name}} "></td>
    <td> <input type="text" name="dob" class="form-control w-50 dob" value="{{$student->dob}} "></td>
    <td> <input type="text" name="age" class="form-control w-50 age" value="{{$student->age}} "></td>
    <td>    <input type="text" name="faculty" class="form-control w-75 faculty" value="{{$student->faculty}}" readonly></td>

        {{-- <select name="faculty" id="faculty">

            <option value="{{$student->faculty}}">{{$student->faculty}}</option>
            @if($student->faculty == "Information Technology")
            <option value="Accounting"> Accounting</option>
            <option value="Business"> Business </option>

            @elseif(($student->faculty == "Accounting"))
            <option value="Information Technology"> Information Technology</option>
            <option value="Business"> Business </option>

            @elseif($student->faculty == "Business")
            <option value="Information Technology"> Information Technology </option>
            <option value="Accounting"> Accounting </option> --}}


    <td> <input type="text" class="form-control w-75 EMcontact" name="EMcontact" value="{{$student->EMcontact}}">  </td>
        <td> <button class="btn btn-primary" type="submit"  id="update"> Update </button> </form> </td>

        <td>  <form action="/delete_student/{{$student->id}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"> Remove</button> </form> </td>
        </tr>


    @endforeach

</table>

    <h5 class="text-center"> Number of student(s): {{$countStudent}} </h4>
        <button  class="btn btn-warning float-end" onclick="download_csv_file()"> Download as Excel   </button>

        <script>


        function Q(elem){
                    return document.querySelector(elem);
                }

        function QA(elem){
            return document.querySelectorAll(elem);
        }


            var update_forms = document.querySelectorAll('.update-form');

                for(i = 0 ; i < update_forms.length ; i++){
                    update_forms[i].addEventListener('submit', confirmUpdate.bind(event, i), false );
            }


            function confirmUpdate(index){
                var confirm_bo = confirm('Do you want to update the student\'s record?');
                if(confirm_bo){
                    document.querySelectorAll('.update-form')[index].setAttribute('action' , '/update_student');
                    document.querySelectorAll('.update-form')[index].setAttribute('method' , 'POST');

                }else{
                    document.querySelector('.update-form')[index].setAttribute('action' , '');
                }
            }




                        // DOWNLOAD CSV



      function download_csv_file() {


        var students =[];

        for(i = 0 ; i < QA('.student_id').length; i++){
            students.push ( [QA('.student_id')[i].value, QA('.name')[i].value,  QA('.dob')[i].value,
            QA('.age')[i].value,  QA('.faculty')[i].value, QA('.EMcontact')[i].value]);
        }




        //define the heading for each row of the data


        var student_csv =  'Student Database' + '\n' + 'Student ID, ' + 'Name, Date of Birthday, Age, Faculty, Emergency contact'  + "\n";



        // merge the data with CSV
        students.forEach(function(row) {
                student_csv += row.join(',');
                student_csv += "\n";
        });



        //display the created CSV data on the web browser
        // document.write(csv);


        var hiddenElement = document.createElement('a');
        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(student_csv);
        hiddenElement.target = '_blank';

        //provide the name for the CSV file to be downloaded
        hiddenElement.download = 'Student Database Report.csv';
        hiddenElement.click();
}



        </script>


@endsection
