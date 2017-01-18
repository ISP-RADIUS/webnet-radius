<section class="content bordered-all">
                    
       

    <!-- CONTENT -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <h3>User Details</h3>
                
               
               
            </div>
           
        </div>

        <div class="row">
          <div class="col-md-12">
              <div class="panel ">
                  <div class="panel-heading">
                      <div class="panel-actions">
                          
                      </div>
                      <h3 class="panel-title"> Extend Account</h3>
                  </div>

                  <div class="panel-body">

                      <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>account/<?php echo $account->username; ?>/user_edit">
                        <fieldset>
                        <div class=" col-sm-6">
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Username">Username</label>
                              <div class="col-md-6">
                                <input id="username" name="username" type="text" placeholder="Username" required="" value="<?php echo $account->username; ?>" readonly class="form-control input-md">
                              </div>
                            </div>

                           

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="First Name">First Name</label>
                              <div class="col-md-6">
                                <input id="textinput" name="first_name" type="text" placeholder="First Name" value="<?php echo $account->user->first_name ; ?>" required="" class="form-control input-md">
                              </div>
                            </div>

                        

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Last Name">Last Name</label>
                              <div class="col-md-6">
                                <input id="textinput" name="last_name" type="text" placeholder="Last Name" required="" value="<?php echo $account->user->last_name ; ?>"  class="form-control input-md">
                              </div>
                            </div>

                            
                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Description">Description</label>
                              <div class="col-md-6">
                                <textarea class="form-control" id="textarea" name="description" required=""   placeholder="Description"><?php echo $account->user->description ; ?></textarea>
                              </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Remarks">Remarks</label>
                              <div class="col-md-6">
                                <textarea class="form-control" id="textarea" name="remarks" required="" rows="10"  placeholder="Remarks"><?php echo $account->user->remarks ; ?></textarea>
                              </div>
                            </div>


                        </div>

                        <div class="col-sm-6 ">
                            

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Email">Email</label>
                              <div class="col-md-6">
                                <input id="textinput" name="email" type="text" placeholder="Email" value="<?php echo $account->user->email ; ?>"  class="form-control input-md">
                              </div>
                            </div>

                             <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Secondary Email">Secondary Email</label>
                              <div class="col-md-6">
                                <input id="textinput" name="secondary_email" type="text" placeholder="Secondary Email" value="<?php echo $account->user->secondary_email ; ?>"  class="form-control input-md">
                              </div>
                            </div>
                          
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Primary Phone">Primary Phone</label>
                              <div class="col-md-6">
                                <input id="textinput" name="primary_phone" type="text" placeholder="Primary Phone" value="<?php echo $account->user->primary_phone ; ?>"  required="" class="form-control input-md primary_phone txtPhone">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Secondary Phone">Secondary Phone</label>
                              <div class="col-md-6">
                                <input id="textinput" name="secondary_phone" type="text" placeholder="Secondary Phone" value="<?php echo $account->user->secondary_phone ; ?>"  class="form-control input-md secondary_phone txtPhone">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Tertiary Phone">Tertiary Phone</label>
                              <div class="col-md-6">
                                <input id="textinput" name="tertiary_phone" type="text" placeholder="Tertiary Phone" value="<?php echo $account->user->tertiary_phone ; ?>"  class="form-control input-md">
                              </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Address">Address</label>
                              <div class="col-md-6">
                                <textarea class="form-control" id="textarea" name="address" required="" placeholder="Address"><?php echo $account->user->address ; ?></textarea>
                              </div>
                            </div>



                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Node">Node</label>
                              <div class="col-md-6">
                                <select name="node" class="form-control">
                                                          <option value="1">BTL</option>
                                                            <option value="2">KPL</option>
                                    
                                </select>
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Zone">Zone</label>
                              <div class="col-md-6">
                                <input id="textinput" name="zone" type="text" placeholder="Zone" value="<?php echo $account->user->zone ; ?>" class="form-control input-md">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Country">Country</label>
                              <div class="col-md-6">
                                <input id="textinput" name="country" type="text" placeholder="Country" value="<?php echo $account->user->country ; ?>"  class="form-control input-md">
                              </div>
                            </div>
                        </div>









                        <!-- Button (Double) -->
                        <div class="form-group">
                            <div class="col-md-12">
                              <button id="submit" name="submit" class="btn btn-success">Update User</button>
                            </div>
                        </div>

                        </fieldset>
                      </form>





                      
                  </div>
              </div>
          </div>
          
      </div>


    </div>

</section>


<script type="text/javascript">
  
  $( document ).ready(function() {
    
    
    $('.txtPhone').change(function(e) {
      var phone =  $(this).val();
       if (validatePhone(phone)) {
           $(this).css('color', 'green');
       }
       else {
           $(this).css('color', 'red');
       }
    });



  });

  function validatePhone(a) {
        
        var filter = /^[0-9-+]+$/;
        if ((filter.test(a)) && (a.length==10)) {
            return true;
        }
        else {
            return false;
        }
  }
    

</script>