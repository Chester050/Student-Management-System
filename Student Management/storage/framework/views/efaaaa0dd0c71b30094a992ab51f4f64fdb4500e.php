          <?php $__env->startSection('content'); ?>

          <?php

      echo date('hs');
          ?>
        <div class="container">
          <form method="POST" action="/dashboard">
            <div class="mb-3 mt-3">
                <?php echo csrf_field(); ?>
              <input type="text" class="form-control w-50 mx-auto my-5" id="email" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">

              <input type="password" class="form-control w-50 m-auto" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
            <div class="form-check mb-3">
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Login</button>
              </div>
          </form>
        </div>




        <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/welcome.blade.php ENDPATH**/ ?>