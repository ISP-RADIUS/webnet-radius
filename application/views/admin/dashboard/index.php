<section class="content bordered-all">

    <!-- CONTENT -->
<div class="main-content">

    <div class="row">

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
