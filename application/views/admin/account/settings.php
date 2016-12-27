<section class="content bordered-all">

    <!-- CONTENT -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="panel-actions">
                            
                        </div>
                        <h3 class="panel-title"> Account Settings</h3>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h3 class="panel-title"> Extend Account</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>accountsettings/extend">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 col-md-2 control-label"> Days</label>
                                                    <div class="col-sm-6 col-md-3">
                                                        <input type="hidden" name="username" class="username" value="<?php echo $account->username; ?>">
                                                        <input type="text" class="form-control " name="days" id="" placeholder="Days">
                                                      
                                                    </div>
                                                    <label for="inputEmail3" class="col-sm-2 col-md-2 control-label">Reason</label>
                                                    <div class="col-sm-6 col-md-3">
                                                        <input type="text" class="form-control " name="reason" id="" placeholder="Reason">
                                                       
                                                    </div>
                                                    <div class="col-sm-4 col-md-2">
                                                        <button class="btn btn-primary ark-ex-loading" data-loading-text="Working...">Extend</button>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2 col-md-2"> </div>
                                                    <div class="col-sm-10">  <span class="small last_updated_password">  <?php echo $account->extended_days; ?> days extended. <span style="text-decoration: underline;"> <a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>/logs/extend">View extend Log</a></span></span>  </div>
                                                    

                                                </div>
                                               
                                                
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h3 class="panel-title"> Device IP</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>accountsettings/change_ip">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2  control-label"> Device IP</label>
                                                    <div class="col-sm-6 ">
                                                        <input type="hidden" name="username" class="username" value="<?php echo $account->username; ?>">
                                                        <input type="hidden" class="mac" value="<?php echo $account->mac_address; ?>">
                                                        <input type="text" class="form-control " value="<?php if(isset($account->device)): echo $account->device->ip; endif; ?>" name="ip" id="" placeholder="IP Address">
                                                        <span class="small last_updated_password"> <i class="fa fa-clock-o" style="color:#999;"></i> Last updated <span class=""><?php if(isset($account->device)): echo $account->device->updated_at; endif; ?></span> <span style="text-decoration: underline;"> <a href="#">View Change Log</a></span></span> 
                                                      
                                                    </div>
                                                   
                                                    <div class="col-sm-4 col-md-2">
                                                        <button class="btn btn-primary ark-ex-loading" data-loading-text="Saving...">Save</button>
                                                    </div>

                                                </div>
                                               
                                                
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h3 class="panel-title"> Password</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" class="username" value="<?php echo $account->username; ?>">
                                                        <input type="text" class="form-control password" id="" placeholder="Password">
                                                        <span class="small last_updated_password"> <i class="fa fa-clock-o" style="color:#999;"></i> Last updated <span class="updated_time_password">10 days ago</span></span> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button class="btn btn-primary ark-ex-loading change_password" data-loading-text="Saving...">Save</button>
                                                    </div>
                                                </div>
                                               
                                                
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h3 class="panel-title">MAC</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">MAC</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control mac" name="" id="">
                                                            <option value="1">YES</option>
                                                            <option value="0">NO</option>
                                                        </select>
                                                        <span class="small last_updated_mac"> <i class="fa fa-clock-o" style="color:#999;"></i> Last updated <span class="updated_time_mac">10 days ago</span></span> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button class="btn btn-primary ark-ex-loading change_mac" data-loading-text="Saving...">Save</button>
                                                    </div>
                                                </div>
                                                
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel ">
                                        <div class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h3 class="panel-title">Plan</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Plan</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control speed" name="speed" id="">
                                                            <option value="284k/284k">256 kbps</option>
                                                            <option value="512k/512k">512 kbps</option>
                                                            <option value="1024k/1024k">1 mbps</option>
                                                        </select>
                                                        <span class="small last_updated_speed"> <i class="fa fa-clock-o" style="color:#999;"></i> Last updated <span class="updated_time_speed">10 days ago</span></span> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button class="btn btn-primary ark-ex-loading change_speed" data-loading-text="Saving...">Save</button>
                                                    </div>
                                                </div>
                                                
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                


            </div>
        </div>

        



      



        

    </div>
    <!-- END: CONTENT -->
</section>


<script>
    $(document).ready(function(){

      

        $(".change_password").click(function(e){
            e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/change_password",
                    data: { username: $(".username").val(), password: $(".password").val() },
                    success:function(result){
                $(".updated_time_password").html(result);

                $( ".last_updated_password" )
                .css("background-color", "#84ce84")
                .animate({
                    backgroundColor: "FFF",
                  }, 5000, function() {
                    // Animation complete.
                });

            }});
        });

        $(".change_mac").click(function(e){
            e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/change_mac",
                    data: { username: $(".username").val(), mac: $(".mac").val() },
                    success:function(result){
              $(".updated_time_mac").html(result);

              $( ".last_updated_mac" )
                .css("background-color", "#84ce84")
                .animate({
                    backgroundColor: "FFF",
                  }, 5000, function() {
                    // Animation complete.
                });

            }});
        });

        $(".change_speed").click(function(e){
            e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/change_speed",
                    data: { username: $(".username").val(), speed: $(".speed").val() },
                    success:function(result){
              $(".updated_time_speed").html(result);

              $( ".last_updated_speed" )
                .css("background-color", "#84ce84")
                .animate({
                    backgroundColor: "FFF",
                  }, 5000, function() {
                    // Animation complete.
                });

            }});
        });
    });
   
</script>