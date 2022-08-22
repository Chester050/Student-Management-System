<?php $__env->startSection('content'); ?>


        <?php
                $studentPresent = false;


                function selectFaculty($faculty , $name){


                    if($faculty == "Information Technology"){
                        $query = "SELECT * FROM faculty__i_t WHERE name = '$name'";
                    }
                    else if( $faculty == "Business"){
                        $query = "SELECT * FROM faculty_business WHERE name = '$name'";
                    }
                    else if( $faculty == 'Accounting' || 'accounting'){
                        $query = "SELECT * FROM faculty_accounting WHERE name = '$name'";
                    }

                    return $query;

                }

             function searchFaculty($faculty,$name)
            {

            $user = 'root';
            $password = '';
            $database = 'studentManagement';
            $hostname = 'localhost';

            $conn = new mysqli($hostname , $user , $password , $database);
            $studentModel = [];
                    $query = selectFaculty($faculty, $name);
                    $fetch = $conn->query($query);
                    $student = $fetch->fetch_array(MYSQLI_NUM);

                    $markSub1 = $student[2];
                    $markSub2 = $student[3];
                    $markSub3 = $student[4];
                    $markSub4  = $student[5];

                    $studentModel = [
                    $markSub1,
                    $markSub2,
                    $markSub3,
                    $markSub4
                    ];


                return $studentModel;
            }
        ?>

    <section>
        <h1 class="text-center"> Student Marking page   <?php
            // $studentModel = searchFaculty('Information Technology', 'Chia Meng Ying');
            // echo $studentModel[0];

        ?> </h1>

        <?php if(session('msg')): ?>
        <h5> <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> <?php echo e(session('msg')); ?>

          </div></h5>
          <?php endif; ?>
        <div class="container d-block w-50 m-auto">
        <form action="/student_marking" method="GET">
            <input class="form-control my-3 d-inline w-25" name='searchFaculty' list="faculty" style='height:30px;width:200px;' type="text" placeholder="Select Faculty">
            <datalist  id="faculty">
              <option value="Information Technology">
              <option value="Business">
              <option value="Accounting">

            </datalist>

            <button type="submit" class="btn btn-info btn-sm" value="submit"> Select Faculty</button>
        </form>
    </div>
    </section>


        <form action="/update_student_mark" method="POST">

        <table class="table table-striped" cellpadding='10px'>
            <?php echo csrf_field(); ?>
            <thead>
            <tr>

                <?php if($students[0]->faculty == ""): ?>

                <th></th>
                <th></th> <th colspan="5" class="display-6"> <b> Please select a faculty </b></th>

                  <?php elseif($students[0]->faculty == 'Information Technology'): ?>

              <th class="h5"> Faculty: Information Technology </th>  <th> Mathematics </th>  <th> Database Design </th>  <th> Computer Architecture </th> <th> Networking </th>

              <?php elseif($students[0]->faculty == 'Accounting'): ?>
              <th class="h5">  Faculty: Accounting </th>  <th> Finance </th>  <th> Economics </th>  <th> Taxation </th> <th> Forensic </th>

              <?php elseif($students[0]->faculty == 'Business' || @$students[0]->faculty == 'business'): ?>
              <th class="h5">  Faculty: Business </th>  <th> Supply Chain </th>  <th> Human Resource </th>  <th> Economics </th> <th> Business Law </th>

                <?php endif; ?>
            </tr>
        </thead>

        <?php if($facultySelected): ?>


        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
        <td> <?php echo e($loop->index); ?> : <?php echo e($student->name); ?> <input type="hidden" class="studentName" name="studentName[]" value=" <?php echo e($student->name); ?> " id=" <?php echo e($student->id); ?> ">
             <input type="hidden" value="<?php echo e($student->faculty); ?>" name="faculty[]" class="studentFaculty"></td>

              <?php if($student->name && $student->faculty): ?>
              <?php $studentModel = searchFaculty($student->faculty , $student->name);
                    $studentPresent = true;
                    ?>
                <?php endif; ?>
            <td> <input type="number" class="form-control w-25 markSub1" id="<?php echo e($student->id); ?>" value="<?php  if($studentPresent) {echo $studentModel[0];} ?>" name="markSub1[]" required> <p class="sub1Grade"> </p> </td>
            <td><input type="number" class="form-control w-25 markSub2" id="<?php echo e($student->id); ?>"  value="<?php  if($studentPresent) {echo $studentModel[1];} ?>" name="markSub2[]" required><p class="sub2Grade"> </p></td>
            <td><input type="number" class="form-control w-25 markSub3" id="<?php echo e($student->id); ?>"  value="<?php  if($studentPresent) {echo $studentModel[2];} ?>" name="markSub3[]" required><p class="sub3Grade"> </p></td>
            <td><input type="number" class="form-control w-25 markSub4" id="<?php echo e($student->id); ?>"  value="<?php  if($studentPresent) {echo $studentModel[3];} ?>" name="markSub4[]" required><p class="sub4Grade"> </p></td>
           <td> Total Score: <b class="totalScore"> </b> </td>

        
    

    </tr>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <tr> <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td> </tr>
        <?php endif; ?>
    </table>
    <button class="btn btn-success float-end" type="submit"> Update Student Marks </button>
</form>
<button class="btn btn-primary float-end mx-5" id="calcMark"> Calculate marks </button>

    <button  class="btn btn-dark" onclick="download_csv_file()"> Download as Excel   </button>



    <script>


        function Q(elem){
            return document.querySelector(elem);
        }

        function QA(elem){
            return document.querySelectorAll(elem);
        }



        var markSub1 , markSub2 , markSub3 , markSub4 = [];

        var markSub1 = document.querySelectorAll('.markSub1');
        var markSub2 = document.querySelectorAll('.markSub2');
        var markSub3 = document.querySelectorAll('.markSub3');
        var markSub4 = document.querySelectorAll('.markSub4');


        function calcTotalScore(index){

            let totalScore = 0;

            let sub1Score = QA('.markSub1')[index].value * 0.25
            let sub2Score = QA('.markSub2')[index].value * 0.25
            let sub3Score = QA('.markSub3')[index].value * 0.25
            let sub4Score = QA('.markSub4')[index].value * 0.25

            totalScore = sub1Score + sub2Score + sub3Score + sub4Score ;

            QA('.totalScore')[index].innerHTML = totalScore;

        }


    function calMarkGrade(){

        markSub1.forEach(markSub1ForEach);
        markSub2.forEach(markSub2ForEach);
        markSub3.forEach(markSub3ForEach);
        markSub4.forEach(markSub4ForEach);


        for(i = 0 ; i < 5 ; i++){
        calcTotalScore(i);
        }
    }

        function markSub1ForEach(markSub1 , index){

            // Subject 1
            if(markSub1.value >= 80){
           QA('.sub1Grade')[index].innerHTML = " <p class='text-success'>Excellent</p>";
        }
        else if(markSub1.value >= 60){
            QA('.sub1Grade')[index].innerHTML = "<p class='text-success'> Good </p>";
        }
        else if( markSub1.value >= 40){
            QA('.sub1Grade')[index].innerHTML = "<p class='text-success'> Pass </p>";

        }
        else  {
            QA('.sub1Grade')[index].innerHTML = " <p class='text-danger'>Failed</p>";
        }


        }

  // Subject 2
  function markSub2ForEach(markSub2 , index){

  if(markSub2.value >= 80){
           QA('.sub2Grade')[index].innerHTML = " <p class='text-success'>Excellent</p>";
        }
        else if(markSub2.value >= 60){
            QA('.sub2Grade')[index].innerHTML = "<p class='text-success'> Good </p>";
        }
        else if( markSub2.value >= 40){
            QA('.sub2Grade')[index].innerHTML = "<p class='text-success'> Pass </p>";

        }
        else  {
            QA('.sub2Grade')[index].innerHTML = " <p class='text-danger'>Failed</p>";
        }
    }

        // Subject 3
        function markSub3ForEach(markSub3 , index){

        if(markSub3.value >= 80){
           QA('.sub3Grade')[index].innerHTML = " <p class='text-success'>Excellent</p>";
        }
        else if(markSub3.value >= 60){
            QA('.sub3Grade')[index].innerHTML = "<p class='text-success'> Good </p>";
        }
        else if( markSub3.value >= 40){
            QA('.sub3Grade')[index].innerHTML = "<p class='text-success'> Pass </p>";

        }
        else  {
            QA('.sub3Grade')[index].innerHTML = " <p class='text-danger'>Failed</p>";
        }
    }

        //Subject 4
        function markSub4ForEach(markSub4 , index){

        if(markSub4.value >= 80){
           QA('.sub4Grade')[index].innerHTML = " <p class='text-success'>Excellent</p>";
        }
        else if(markSub4.value >= 60){
            QA('.sub4Grade')[index].innerHTML = "<p class='text-success'> Good </p>";
        }
        else if( markSub4.value >= 40){
            QA('.sub4Grade')[index].innerHTML = "<p class='text-success'> Pass </p>";

        }
        else  {
            QA('.sub4Grade')[index].innerHTML = " <p class='text-danger'>Failed</p>";
        }
    }



        document.querySelector('#calcMark').addEventListener('click', calMarkGrade);


//create a user-defined function to download CSV file






function download_csv_file() {


    var csvFileData =[];

    for(i = 0 ; i < QA('.studentName').length; i++){
        csvFileData.push ( [ i+1 , QA('.studentName')[i].value, QA('.markSub1')[i].value,  QA('.markSub2')[i].value,  QA('.markSub3')[i].value,  QA('.markSub4')[i].value]);
    }



    //define the heading for each row of the data


    var csv =  Q('.studentFaculty').value + '\n' + 'No, ' + 'Name,' + facultyCategory(QA('.studentFaculty')[0].value) + "\n";

    // merge the data with CSV
    csvFileData.forEach(function(row) {
            csv += row.join(',');
            csv += "\n";
    });


    //display the created CSV data on the web browser
    // document.write(csv);


    var hiddenElement = document.createElement('a');
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
    hiddenElement.target = '_blank';

    //provide the name for the CSV file to be downloaded
    hiddenElement.download =   QA('.studentFaculty')[0].value + ' Faculty - ' + 'Student Marks.csv';
    hiddenElement.click();
}


function facultyCategory(elem){
    if(elem == "Information Technology"){
        return 'Mathematics, Database Design, Computer Architecture, Networking';
    }else if(elem == "Accounting" ){
        return "Finance , Economics, Texation , Forensic";
    }else if(elem == "Business" || elem == "business"){
        return "Supply Chain , Human Resource, Economics, Business Law";
    }
}

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/studentMarking.blade.php ENDPATH**/ ?>