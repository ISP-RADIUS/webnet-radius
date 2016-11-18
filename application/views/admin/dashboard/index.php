<section class="content ">

    <!-- CONTENT -->
<div class="main-content">

    <div class="panel ">
                   

        <div class="panel-body">

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        
                        <h5>New Accounts</h5>
                    </div>
                    <div class="ibox-content">
                        <h4 class="no-margins"><?php echo count($accounts['this_month']); ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        
                        <h5>Online Accounts</h5>
                    </div>
                    <div class="ibox-content">
                        <h4 class="no-margins"><?php echo count($accounts['online']); ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        
                        <h5>Expired Accounts</h5>
                    </div>
                    <div class="ibox-content">
                        <h4 class="no-margins"><?php echo count($accounts['expired']); ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        
                        <h5>Connection Pending</h5>
                    </div>
                    <div class="ibox-content">
                        <h4 class="no-margins">N/A</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    <div class="row">

        <div class="col-md-12">

            <?php
                $group = 'customer_service';
                if ($this->ion_auth->in_group($group) || $this->ion_auth->is_admin()):
               
            ?>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>call/make?department=customer_service&purpose=expiration">Make a Call </a>
            <?php
                endif;

            ?>
            
        </div>

    	<div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        Expiring in <input style="width:40px;" type="" class="days" value="1" name="days"> days. <input type="submit" class="expiring_in_submit" name="">
                    </div>
                    <h3 class="panel-title">Expiring Accounts</h3>
                </div>
                <div class="panel-body expiring_in_data">

                    <table class="table table-hover">
                        <thead>
                        
                        <tr>
                            <th class="col-md-4">Username</th>
                            <th class="col-md-4">Full Name</th>
                            <th class="col-md-4">Number(s)</th>
                            <th class="col-md-4">Extended</th>
                            <th class="col-md-4">Expiration Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        	foreach ($expiring_accounts as $account):
                        ?>
                        <tr>
                            <td><a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>"> #<?php echo $account->username; ?></a></td>
                            <td><?php echo $account->user->first_name . " " . $account->user->last_name; ?></td>
                            <td><?php echo $account->user->primary_phone; ?></td>
                            <td><?php echo $account->extended_days; ?></td>
                            <td><?php echo $account->value; ?></td>
                        </tr>
                        <?php
                        	endforeach;
                        ?>
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
</div>
<!-- END: CONTENT -->
</section>

<script>
    $(document).ready(function(){

      

        $(".expiring_in_submit").click(function(e){
            e.preventDefault();
            $('.expiring_in_data').html('Fetching Data...');
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/expiring_in",
                    data: { days: $(".days").val() },
                    success:function(result){
                $(".expiring_in_data").html(result);

               
            }});
        });

      
    });
   
</script>
