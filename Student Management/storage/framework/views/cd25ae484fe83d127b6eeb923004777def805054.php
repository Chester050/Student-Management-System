<?php $__env->startSection('content'); ?>

    <section id="studentRegistrationForm" class="">


        <form action="/register_student" method="POST">

            <?php echo csrf_field(); ?>
            <h2 class="text-center"> <i> Student Basic Information </i></h2>

        <div class="p-3 w-50 m-auto">
        <label for="name">  Name:  </label>
        <input type="text" class="form-control " name="name" placeholder="Enter student name"  required>
        </div>


        <div class="p-3 w-50 m-auto">
            <label for="ic">Identification Number: </label>
            <input type="text" name="ic" class="form-control" id="ic" required>
            <small>  e.g 900111-50-5500</small>
            </div>


        <div class="p-3 w-50 m-auto">
        <label for="DOB">Date of birth: </label>
        <input type="date" name="dob" class="form-control" id="dob" required>
        </div>



        <div class="p-3 w-25 m-auto">
            <label for="age">Age: </label>
            <input type="number" name="age" id="age" class="form-control" readonly>
            </div>

        <div class="p-3 w-50 m-auto">
        <label for="gender">Gender:</label>
        <input type="radio" name="gender[]" value="male">   <b>Male</b>
        <input type="radio" name="gender[]" value="female"> <b>Female</b>

        </div>



        <div class="p-3  w-50 m-auto">
            <label for="faculty">Faculty: </label>
            <input type="radio" name="faculty[]" value="Information Technology"> <b>Information Technology</b>
            <input type="radio" name="faculty[]" value="Accounting"> <b>Accounting</b>
            <input type="radio" name="faculty[]" value="Business"> <b>Business</b>

         </div>

    <h2  class="text-center my-5">
        <i> Additional infomration: Emergency Contact </i> <button data-bs-toggle="collapse"  class="btn btn-info" style="cursor:pointer;" id="collapseAddInfo" data-bs-target="#demo"> Show </button>
    </h2>






<div id="demo" class="collapse">

    <div class="p-3 w-50 m-auto">
        <label for="EMname">  Name:  </label>
        <input type="text" class="form-control" name="EMname" placeholder="Enter Emergency Contact Person Name"  required>
        </div>

        <div class="p-3 w-50 m-auto">
            <label for="relation">  Relationship:  </label>
            <input type="text" class="form-control " name="relation" placeholder="Enter relationship with emergency contact person"  required>
            </div>

            <div class="p-3 w-50 m-auto">
                <label for="contact">  Contact </label>
                <input type="text" class="form-control" name="EMcontact" placeholder="Enter emergency contact person contact number"  required>
                <small>e.g 011-1xxxxxxx</small>
                </div>

            </div>
    <button class="btn btn-outline-primary d-block w-50 m-auto" type="submit" name="submit"> Register Student </button>
        </form>

        </section>


        <script>


            var dob = document.querySelector('#dob');



            dob.addEventListener('input', function(){
              let dobYear =  getDOBYear(dob.value);

                let studentAge = calculateAge(dobYear);

              document.querySelector('#age').value = studentAge;

            });

            function getDOBYear(dob){
                let dobYear = dob.slice(0,4);
                return dobYear;
            }


            function calculateAge(year){
                let date = new Date();

                let currentYear = date.getFullYear();

                let currentAge = currentYear - year;

                return currentAge;
            }

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/studentRegister.blade.php ENDPATH**/ ?>