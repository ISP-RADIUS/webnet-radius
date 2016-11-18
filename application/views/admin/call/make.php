<section class="content bordered-all">
                    
                    

    <div class="header">
            <div class="col-md-6">
                <h3 class="header-title">Make a Call</h3>
                <p class="header-info">Overview of all the accounts</p>

                

            </div>

            <div class="col-md-6 ">

                <a type="button" class="btn btn-warning pull_right"><i class="fa fa-random"></i> Random</a>
                <a type="button" class="btn btn-primary pull_right"><i class="fa fa-step-forward"></i> Skip</a>



            </div>


            
        
    </div>

   

    <!-- CONTENT -->
    <div class="main-content">

       

        



        <div class="row">
            
            <div class="col-md-5  " id="accounts">
              


                <form class="form-horizontal">
                    <fieldset>
                    
                    <div class="form-group">
                      <label class="col-md-4 control-label" >Name</label>  
                      <div class="col-md-8">
                        <input readonly class="form-control" value="<?php echo $user->first_name . " " . $user->last_name; ?>">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" >Username</label>  
                      <div class="col-md-8">
                        <input readonly class="form-control" value="<?php echo $user->username; ?>">
                        
                      </div>
                    </div>                    

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" >Primary Phone</label>
                      <div class="col-md-8">
                        <input readonly class="form-control" value="<?php echo $user->primary_phone; ?>">
                        <small>
                            <ul class="phone_status">
                                <li>
                                    <a href="">Not Reachable</a>
                                </li>
                                <li>
                                    <a href="">Switched Off</a>
                                </li>
                            </ul>
                            
                        </small> 
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" >Secondary Phone</label>
                      <div class="col-md-8">
                        <input readonly class="form-control" value="<?php echo $user->secondary_phone; ?>">
                        <small>
                            <ul class="phone_status">
                                <li>
                                    <a href="">Not Reachable</a>
                                </li>
                                <li>
                                    <a href="">Switched Off</a>
                                </li>
                            </ul>
                            
                        </small> 
                      </div>
                    </div>


                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" >Tertiary Phone</label>
                      <div class="col-md-8">
                        <input readonly class="form-control" value="<?php echo $user->tertiary_phone; ?>">
                        <small>
                            <ul class="phone_status">
                                <li>
                                    <a href="">Not Reachable</a>
                                </li>
                                <li>
                                    <a href="">Switched Off</a>
                                </li>
                            </ul>
                            
                        </small> 
                      </div>
                    </div>
                    <style>
                        
                        .phone_status{
                            padding-left: 0px;
                        }
                        .phone_status li{
                            list-style: none; 
                            display: inline-block;
                            padding-right: 10px;
                        }
                    </style>

                    

                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="comments">Comments</label>
                      <div class="col-md-8">                     
                        <textarea class="form-control" id="comments" name="comments" style=" height: 150px;"></textarea>
                      </div>
                    </div>

                   

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                      <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-default">Submit</button>
                      </div>
                    </div>

                    </fieldset>
                </form>

                           
                           
                        
            </div>

            <div class="col-md-4 col-md-offset-1  bordered">

                <a type="button" class="btn btn-primary new_ticket"><i class="fa fa-plus"></i> New Ticket</a>

                <div class="ticket_form">
                    <form class="form-horizontal">
                        <fieldset>
                        
                        <div class="form-group">
                          <label class="col-md-4 control-label" >Department</label>  
                          <div class="col-md-8">
                            <select name="department" class="form-control">
                                <option value="support">Support</option>
                                <option value="accounts">Accounts</option>
                                <option value="connection">connection</option>
                            </select>
                            
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Priority</label>  
                          <div class="col-md-8">
                            <select name="department" class="form-control">
                                <option value="critical">Critical</option>
                                <option value="high">High</option>
                                <option value="normal">Normal</option>
                            </select>
                            
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Username</label>  
                          <div class="col-md-8">
                            <input readonly class="form-control" value="<?php echo $user->username; ?>">
                            
                          </div>
                        </div>                    

                        

                        

                        <!-- Textarea -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="comments">Description</label>
                          <div class="col-md-8">                     
                            <textarea class="form-control" id="comments" name="comments" style=" height: 150px;"></textarea>
                          </div>
                        </div>

                       

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-default">Submit</button>
                          </div>
                        </div>

                        </fieldset>
                    </form>
                </div>

            </div>
            
            
        </div>
        

    </div>
    <!-- END: CONTENT -->
</section>


<style>
    .ticket_form{
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
   
    $(".new_ticket").click(function(e){
        e.preventDefault();
        $(".ticket_form").css('display','block');
    });


});
</script>
