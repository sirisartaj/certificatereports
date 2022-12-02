 <!--<script type="text/javascript" src="https://sirians.xyz/dgtl/js/bootstrap-datepicker.js"></script>  Bootstrap Date Picker 
<script type="text/javascript" src="https://sirians.xyz/dgtl/js/bootstrap-datetimepicker-new.js"></script> Bootstrap New Date Picker --> 
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
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
			<button type="button" onClick="getreport();" class="btn btn-primary pull-left m-b-0">Search</button>
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
           <table class="table" id="input_buttons">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Class(Course/Batch)</th>
                    <th>Admission No</th>
                    <th>Parent Name</th>
                    <th class="dontprint">Mobile</th>
                    <th>approved date</th>
                    <th>certificate No.</th>
                    <th>User Name</th>
                  </tr>
                </thead>
                <tbody>
                	<?php if($report){
                		foreach($report as $r){ ?>
                  <tr>
                    <td><div class="user-image"><span>S</span></div>
                      <?php echo $r->student_name;?></td>
                    <td><?php echo $r->course_name.' '.$r->section_name;?></td>
                    <td><?php echo $r->admission_number;?></td>
					<td><?php echo $r->parent_firstname;?></td>
                    <td><?php echo $r->parent_mobile_number;?></td>
                    <td><?php echo $r->created_date;?></td>
                    <td><?php echo $r->certificate_id;?></td>
                    <td><?php echo $r->user_name;?></td>
                  </tr>
				  <?php	}
                	} ?>
				  
				  
                </tbody>
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
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/api/fnReloadAjax.js">
      
    </script>
    <script type="text/javascript">

    
function tabledata(){
  var from_date= $('#from_date');
      var to_date= $('#to_date');
    oTable= $('#input_buttons').DataTable({
        processing: true,
          serverSide: true,
          paging: true,
          ajax: {
              url: '<?php echo base_url().'/seachresults'?>',
              type: 'POST',
              data: {'from_date': $("#from_date").val(),'to_date':$("#to_date").val()},
          },
        
        columns: [
            { data: 'student_name' },
            { data: 'course_name' },
            { data: 'admission_number' },
            { data: 'parent_firstname' },
            { data: 'parent_mobile_number' },
            { data: 'created_date' },
            { data: 'certificate_id' },
            { data: 'user_name' },
        ],
    });
  }


    $(document).ready(function () {        
      tabledata();
    });
    function getreport(){
      $('#input_buttons').DataTable().destroy();
      tabledata();
    }


       
    </script>