<?php $__env->startSection('content'); ?>
<button  class="btn btn-warning float-end" onclick="download_csv_file()"> Download as Excel   </button>

 <table class="table table-striped table-report">
    <thead>
        <tr> <th colspan="5" class="text-center display-6"> <b>Faculty: Information Technology</b></th></tr>
        <tr>
            <th>Name</th>
            <th>Mathematics</th>
            <th>Database Design</th>
            <th>Computer Architecture</th>
            <th>Networking</th>
            <th>Total marks obtained</th>
        </tr>
    </thead>
    <?php $__currentLoopData = $it_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>

    <td> <input type="hidden" class="it_studentName" value=" <?php echo e($it_report->name); ?> ">  <?php echo e($it_report->name); ?></td>

    <td> <input type="hidden" class="it_markSub1" value=" <?php echo e($it_report->Mathematics); ?> "> <?php echo e($it_report->Mathematics); ?></td>
    <td> <input type="hidden" class="it_markSub2" value=" <?php echo e($it_report->DatabaseDesign); ?> ">   <?php echo e($it_report->DatabaseDesign); ?></td>
    <td> <input type="hidden" class="it_markSub3" value=" <?php echo e($it_report->ComputerArchitecture); ?> "><?php echo e($it_report->ComputerArchitecture); ?></td>
    <td> <input type="hidden" class="it_markSub4" value=" <?php echo e($it_report->Networking); ?> "><?php echo e($it_report->Networking); ?></td>

    <th> <input type="hidden" class="it_total_mark" value="<?php echo e(($it_report->Mathematics + $it_report->DatabaseDesign + $it_report->ComputerArchitecture + $it_report->Networking) /4); ?>  ">
        <?php echo e(($it_report->Mathematics + $it_report->DatabaseDesign + $it_report->ComputerArchitecture + $it_report->Networking) /4); ?> </th>
</tr>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <tr>
        <td></td>
        <th class="">Average mark of the subject: <input type="number" value="" class="form-control text-center it_markSub1_average" readonly></th>
        <th class="">Average mark of the subject: <input type="number" value="" class="form-control text-center it_markSub2_average" readonly></th>
        <th class="">Average mark of the subject: <input type="number" value="" class="form-control text-center it_markSub3_average" readonly></th>
        <th class="">Average mark of the subject: <input type="number" value="" class="form-control text-center it_markSub4_average" readonly></th>
        </tr>
    </table>


    
    <table class="table table-striped table-report">
        <thead>
            <tr> <th colspan="5" class="text-center display-6"> <b> Faculty: Accounting </b></th></tr>
            <tr>
                <th>Name</th>
                <th>Finance</th>
                <th>Economics</th>
                <th>Taxation</th>
                <th>Forensic</th>
                <th>Total marks obtained</th>

            </tr>
        </thead>
        <?php $__currentLoopData = $accounting_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounting_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

        <td> <input type="hidden" class="acc_studentName" type="hidden" value=" <?php echo e($accounting_report->name); ?> ">  <?php echo e($accounting_report->name); ?></td>

        <td> <input class="acc_markSub1" type="hidden" value=" <?php echo e($accounting_report->Finance); ?> "><?php echo e($accounting_report->Finance); ?></td>
        <td> <input class="acc_markSub2" type="hidden" value=" <?php echo e($accounting_report->Economics); ?> "><?php echo e($accounting_report->Economics); ?></td>
        <td> <input class="acc_markSub3" type="hidden" value=" <?php echo e($accounting_report->Taxation); ?> "><?php echo e($accounting_report->Taxation); ?></td>
        <td> <input class="acc_markSub4" type="hidden" value=" <?php echo e($accounting_report->Forensic); ?> "><?php echo e($accounting_report->Forensic); ?></td>

        <th> <input type="hidden" class="acc_total_mark" value=" <?php echo e(($accounting_report->Finance + $accounting_report->Economics + $accounting_report->Taxation + $accounting_report->Forensic) /4); ?> ">
            <?php echo e(($accounting_report->Finance + $accounting_report->Economics + $accounting_report->Taxation + $accounting_report->Forensic) /4); ?> </th>

    </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

        <table class="table table-striped table-report">
            <thead>
                <tr> <th colspan="5" class="text-center display-6"> <b> Faculty: Business </b></th></tr>
                <tr>
                    <th>Name</th>
                    <th>Supply Chain</th>
                    <th>Huaman Resource</th>
                    <th>Economics</th>
                    <th>Business Law</th>
                    <th>Total marks obtained</th>

                </tr>
            </thead>
            <?php $__currentLoopData = $business_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

            <td> <input type="hidden" class="bz_studentName" type="hidden" value=" <?php echo e($business_report->name); ?> "> <?php echo e($business_report->name); ?></td>

            <td><input type="hidden" value="<?php echo e($business_report->SupplyChain); ?>" class="bz_markSub1" ><?php echo e($business_report->SupplyChain); ?></td>
            <td><input type="hidden" value="<?php echo e($business_report->HumanResource); ?>" class="bz_markSub2" ><?php echo e($business_report->HumanResource); ?></td>
            <td><input type="hidden" value="<?php echo e($business_report->Economics); ?>" class="bz_markSub3" ><?php echo e($business_report->Economics); ?></td>
            <td><input type="hidden" value="<?php echo e($business_report->BusinessLaw); ?>" class="bz_markSub4" > <?php echo e($business_report->BusinessLaw); ?></td>

            <th>
                <input type="hidden" class="bz_total_mark" value= "<?php echo e(($business_report->SupplyChain + $business_report->HumanResource + $business_report->Economics + $business_report->BusinessLaw) /4); ?> ">
                <?php echo e(($business_report->SupplyChain + $business_report->HumanResource + $business_report->Economics + $business_report->BusinessLaw) /4); ?> </th>

        </tr>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>



            <script>
                    // DOWNLOAD CSV

                    function Q(elem){
            return document.querySelector(elem);
        }

        function QA(elem){
            return document.querySelectorAll(elem);
        }


        function calAverageMark(sub){
            var totalMark = 0;
            var averageMark = 0;

             for(i = 0 ; i < sub.length ; i++){
                 totalMark += parseInt(sub[i].value)
             }

             averageMark = totalMark / sub.length;

            return parseInt(averageMark);
        }




        function calAverageMarkForAllSubject(){
                var count = 1;
                while(count < 5)
                {
                Q(`.it_markSub${count}_average`).value = calAverageMark(QA(`.it_markSub${count}`));
                count += 1;
            }
        }


        calAverageMarkForAllSubject();



      function download_csv_file() {


        var it_faculty =[];

        for(i = 0 ; i < QA('.it_studentName').length; i++){
            it_faculty.push ( [ i+1 , QA('.it_studentName')[i].value, QA('.it_markSub1')[i].value,  QA('.it_markSub2')[i].value,
            QA('.it_markSub3')[i].value,  QA('.it_markSub4')[i].value, QA('.it_total_mark')[i].value]);
        }


        var account_faculty = [];

        for(i = 0 ; i < QA('.acc_studentName').length; i++){
            account_faculty.push ( [ i+1 , QA('.acc_studentName')[i].value, QA('.acc_markSub1')[i].value,  QA('.acc_markSub2')[i].value,
            QA('.acc_markSub3')[i].value,  QA('.acc_markSub4')[i].value, QA('.acc_total_mark')[i].value]);
        }

        var bz_faculty = [];
        for(i = 0 ; i < QA('.bz_studentName').length; i++){
            bz_faculty.push ( [ i+1 , QA('.bz_studentName')[i].value, QA('.bz_markSub1')[i].value,  QA('.bz_markSub2')[i].value,
            QA('.bz_markSub3')[i].value,  QA('.bz_markSub4')[i].value, QA('.bz_total_mark')[i].value]);
        }

        //define the heading for each row of the data


        var it_csv =  'Information Technology' + '\n' + 'No, ' + 'Name,' + facultyCategory('Information Technology') + ","  + "Total Mark Obtained" + "\n";

        var accounting_csv = 'Accounting' + '\n' + 'No,' + 'Name,' + facultyCategory('Accounting') + ","  + "Total Mark Obtained" + '\n';

        var business_csv = 'Business' + '\n' + 'No,' + 'Name,' + facultyCategory('Business') + "," + "Total Mark Obtained" + '\n';


        // merge the data with CSV
        it_faculty.forEach(function(row) {
                it_csv += row.join(',');
                it_csv += "\n";
        });

        account_faculty.forEach(function(row){
            accounting_csv += row.join(',')
            accounting_csv += "\n"
        });

        bz_faculty.forEach(function(row){
            business_csv += row.join(',')
            business_csv += "\n"
        });


        var all_report = it_csv + accounting_csv + business_csv;

        //display the created CSV data on the web browser
        // document.write(csv);


        var hiddenElement = document.createElement('a');
        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(all_report);
        hiddenElement.target = '_blank';

        //provide the name for the CSV file to be downloaded
        hiddenElement.download = 'Student Total Mark Report.csv';
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

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chest\studentManagement\resources\views/student_report.blade.php ENDPATH**/ ?>