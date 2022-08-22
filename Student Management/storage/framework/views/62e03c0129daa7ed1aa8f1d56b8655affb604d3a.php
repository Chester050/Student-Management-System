<?php $__env->startSection('content'); ?>

<?php if(session('successUpdate')): ?>
<h5> <div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> <?php echo e(session('successUpdate')); ?>

  </div></h5>

  <?php elseif(session('successDelete')): ?>
  <h5> <div class="alert alert-warning alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> <?php echo e(session('successDelete')); ?>

  </div></h5>
  <?php endif; ?>

<table class="table table-striped">
    <?php

        $countStudent = 0;
    ?>
    <tr>
        <th>Student ID </th>
        <th>Name</th>
        <th> Date of birthday(yyyy/dd/mm) </th>
        <th> Age </th>
        <th> Faculty </th>
        <th> Emergency Contact Number </th>
        <th colspan="2" class="text-center"> Action </th>
    </tr>


    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
        $countStudent += 1 ;
    ?>
    <tr>
        <form class="update-form">
            <?php echo csrf_field(); ?>
    <td>  <input type="text" name="id" id="id" class="form-control w-25 student_id" value="<?php echo e($student->id); ?>" readonly>  </td>
    <td> <input type="text" name="name" class="form-control w-75 name" value="<?php echo e($student->name); ?> "></td>
    <td> <input type="text" name="dob" class="form-control w-50 dob" value="<?php echo e($student->dob); ?> "></td>
    <td> <input type="text" name="age" class="form-control w-50 age" value="<?php echo e($student->age); ?> "></td>
    <td>    <input type="text" name="faculty" class="form-control w-75 faculty" value="<?php echo e($student->faculty); ?>" readonly></td>

        


    <td> <input type="text" class="form-control w-75 EMcontact" name="EMcontact" value="<?php echo e($student->EMcontact); ?>">  </td>
        <td> <button class="btn btn-primary" type="submit"  id="update"> Update </button> </form> </td>

        <td>  <form action="/delete_student/<?php echo e($student->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <button type="submit" class="btn btn-danger"> Remove</button> </form> </td>
        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

    <h5 class="text-center"> Number of student(s): <?php echo e($countStudent); ?> </h4>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/student_database.blade.php ENDPATH**/ ?>