 <!--<script type="text/javascript" src="https://sirians.xyz/dgtl/js/bootstrap-datepicker.js"></script>  Bootstrap Date Picker 
<script type="text/javascript" src="https://sirians.xyz/dgtl/js/bootstrap-datetimepicker-new.js"></script> Bootstrap New Date Picker --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"  />
 <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
      <div class="header">
        <h2><strong><?php echo $headding; ?></strong></h2>
        <div class="breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li><a href="https://sirians.xyz/dgtl/dashboard.html">Home</a> </li>
            <li class="active"><?php echo $headding; ?></li>
          </ol>
        </div>
      </div>
      <div class="panel">
        <div class="panel-content">
        <form role="form" class="" action="<?php echo base_url().'/';?>" method="post">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label class="control-label">From Date</label>
                <div class="append-icon-default">
                  <div class="date form-date">
                    <input type="text" class="form-control form-white datetimepicker1" placeholder="Select date" id="from_date" name="from_date" value="<?php echo $from_date;?>">
                    <span class="add-on"><i class="icon-th"></i></span> </div>
                  <i class="icon-calendar default-date-icon"></i> </div>
             </div>
            </div> 
            <div class="col-sm-3">
              <div class="form-group">
              <label class="control-label">To Date</label>
                <div class="append-icon-default">
                  <div class="date form-date">
                    <input type="text" class="form-control form-white datetimepicker1" placeholder="Select date" id="to_date" name="to_date" value="<?php echo $to_date;?>">
                    <span class="add-on"><i class="icon-th"></i></span> </div>
                  <i class="icon-calendar default-date-icon"></i> </div>
             </div>
            </div> 
                
            
            
        </div>
        
        
        
         <div class="row">
            <div class="col-sm-12">
            <button type="button" onClick="datatableload();" class="btn btn-primary pull-left m-b-0">Search</button>
            <div class="clear"></div>
            </div>
        </div>
        <!-- /row-inner -->
        </form>
        </div>
      </div>
        <!-- section-row -->
        <div class="section-row">
        
             <div class="clear"></div> 
    
    <div class="panel">
        <div class="panel-content">
         <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="display" style="width:100%">
        <thead>
            <tr>
                <th>student_name</th>
                <th>course_name</th>
                <th>admission_number</th>
                <th>parent_firstname.</th>
                <th>parent_mobile_number</th>
                <th>created_date</th>
                <th>certificate_id</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>
          
              
        </div>
        </div>
      </div>
    </div>
    <!-- /section-row -->
    
    <div class="footer">
        <div class="copyright">
          <p class="pull-left sm-pull-reset"> <span>Copyright <span class="copyright">©</span> 2016 </span> <span>Siri IT Innovations Pvt Ltd</span>. <span>All rights reserved. </span> </p>
          <p class="pull-right sm-pull-reset"> <span><a href="https://sirians.xyz/dgtl/#" class="m-r-10">Support</a> | <a href="https://sirians.xyz/dgtl/#" class="m-l-10 m-r-10">Terms of use</a> | <a href="https://sirians.xyz/dgtl/#" class="m-l-10">Privacy Policy</a></span> </p>
        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT --> 
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function () {
             //$('.datetimepicker1').datetimepicker();
         });
       // datatableload();
    function datatableload(){
      //var from_date= $('#from_date').val();
      //var to_date= $('#to_date').val();

      var from_date= '2022-11-01';
      var to_date= '2022-12-01';
      /*if(from_date==''){
        //from_date = '<?php echo date('Y-m-d',strtotime(-1 month));?>';
      }
      if(to_date==''){
       // to_date = '<?php echo date('Y-m-d');?>';
      }*/
      $('#example1').DataTable({
        "ajax": {
                "url": "<?php //echo base_url().'/seachresults'?>",
                "method": "POST",
                
            },
            
        //ajax: '<?php echo base_url().'/seachresults'?>',
    });
  }
      
       
    </script>