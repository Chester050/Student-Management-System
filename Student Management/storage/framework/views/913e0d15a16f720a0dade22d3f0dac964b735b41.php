<?php $__env->startSection('content'); ?>

    <?php if(session('msg')): ?>

    <script>
        alert('New student has been successfully registered');
    </script>

    <?php endif; ?>

    <button class="btn btn-outline-warning float-end"> <a href="/" style="text-decoration:none;color:black;font-weight:bold;"> Logout</a> </button>

    <a href="/studentRegister" class="function-link"><div class="function-btn ">
         <h3><i class="fa-solid fa-user-check"></i> New Student Registration</h3>
    </div></a>

    <a href="/student_marking" class="function-link">
    <div class="function-btn">
        <h3> <i class="fa-solid fa-pen"></i> Student Subject Marking  </h3>
    </div>
</a>

    <a href="/student_report" class="function-link">
    <div class="function-btn">
        <h3> <i class="fa-solid fa-book"></i> Student Report</h3>
    </div>
    </a>

    <a href="/student_database" class="function-link">
        <div class="function-btn">
            <h3> <i class="fa-solid fa-book"></i> Student Database</h3>
        </div>
        </a>

        

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/dashboard.blade.php ENDPATH**/ ?>