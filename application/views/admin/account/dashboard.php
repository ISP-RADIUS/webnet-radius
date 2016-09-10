<section class="content bordered-all">

    <!-- CONTENT -->
    <div class="main-content">

        <div class="row">
           
            <p style="text-align:center;">Home for something awesome</p>
        </div>

        <input type="" class="username" value="<?php echo $account->username; ?>" name="">
        <div class="sample">
        	<div class="panel-heading">
                <div class="panel-actions">
                    <div id="reportrange1" class="pull-right">
                        <i class="fa fa-calendar"></i>
                        <span>This month</span> <b class="caret"></b>
                    </div>
                </div>
                <h3 class="panel-title">Conversions</h3>
            </div>
        </div>

      
		<?php 	echo count($account->sessions);  ?>

		<div class="session_data">
				<?php
					foreach ($account->sessions as $session):
				?>

				<li> Date : <?php echo time_ago($session->date); ?>|  <?php echo $session->date; ?> | upload : <?php echo ($session->upload)  ; ?> | Download : <?php echo ($session->download) ; ?></li>

		      
				<?php
					endforeach;
				?>
		</div>

		


        

    </div>
    <!-- END: CONTENT -->
</section>



<script>
	$(document).ready(function() {

		$(".datepicker").datepicker({
            autoclose: !0
        }), $("#reportrange1").daterangepicker({
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                "Last 7 Days": [moment().subtract("days", 6), moment()],
                "Last 30 Days": [moment().subtract("days", 29), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
            },
            startDate: moment().startOf("month"),
            endDate: moment().endOf("month")
        }, function(start, end) {
            $("#reportrange1 span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"))
        })
   

	    $(".applyBtn").click(function(){
	    	var start = $("input[name=daterangepicker_start]").val();
	    	var end = $("input[name=daterangepicker_end]").val();

		       e.preventDefault();
	            $.ajax({type: "POST",
	                    url: "<?php echo base_url(); ?>ajax/sessions",
	                    data: { username: $(".username").val(), start: start, end: end },
	                    success:function(result){
	              $(".session_data").html(result);

	             

	            }});
	    });
	    $(".ranges").click(function(e){
	    	var start = $("input[name=daterangepicker_start]").val();
	    	var end = $("input[name=daterangepicker_end]").val();

	       e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/sessions",
                    data: { username: $(".username").val(), start: start, end: end },
                    success:function(result){
              $(".session_data").html(result);

             

            }});
	    });

	    

	});

</script>

