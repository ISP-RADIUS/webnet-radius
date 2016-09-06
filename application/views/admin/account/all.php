<section class="content bordered-all">
                    
                    

    <div class="header">
            <div class="col-md-6">
                <h3 class="header-title">Accounts</h3>
                <p class="header-info">Overview of all the accounts</p>

                

            </div>

            <div class="col-md-6">
                <form  class="form-horizontal" role="form" style="padding:15px;">
                    <div class="form-group" style="margin-bottom:0px;">
                            <input type="text"  class="form-control" style="height: 49px;" placeholder="Search Account">
                            <span id="filter-count"></span>
                      
                    </div>
                    
                </form>
                

            </div>
        
    </div>

   

    <!-- CONTENT -->
    <div class="main-content">

        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <label for="">Account Status</label>
                    <select name="" id="account_status">
                        <option value="expired">Expired</option>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                        <option value="extended">Extended</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover " id="accounts">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Created</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                                foreach ($accounts as $account):
                            ?>
                                <tr>
                                    <td><a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>">#<?php echo $account->username; ?></a></td>
                                    <td></td>
                                    <td><a href="#">Sylvia Stingray</a></td>
                                    <td>
                                        <span class="label <?php echo $account->status; ?>"><?php echo $account->status; ?></span>
                                    </td>
                                    <td>$2,643.00</td>
                                    <td>
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                endforeach; 
                            ?>

                          
                          
                        </tbody>
                </table>
                <div class="pagination"></div>
            </div>
            
        </div>
        

    </div>
    <!-- END: CONTENT -->
</section>

<script>

 $("#account_status").change(function(e){
            e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/accounts",
                    data: { status: $("#account_status").val(), limit: 10 },
                    success:function(result){
                $("#accounts").html(result);

                $( ".last_updated_password" )
                .css("background-color", "#84ce84")
                .animate({
                    backgroundColor: "FFF",
                  }, 5000, function() {
                    // Animation complete.
                });

            }});
        });



</script>