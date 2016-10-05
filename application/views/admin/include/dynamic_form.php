<div class="row dynamic_form">
   
    <div class="col-lg-12">
        <div class="dynamic_form">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Device IP</label>
                    <div class="col-sm-6">
                        <input type="hidden" class="username" value="<?php echo $account->username; ?>">
                        <input type="hidden" class="mac" value="<?php echo $account->mac_address; ?>">
                        <input type="text" class="form-control ip" id="" placeholder="Device IP" >
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary ark-ex-loading change_ip" data-loading-text="Saving...">Save</button>
                    </div>
                </div>
                <div class="updated_time_password">
                    
                </div>
               
                
            </form>
        </div> 
    </div>
</div>


<style>
    .dynamic_form{
        background-color: #CCC;
        padding: 30px;
        margin:5px 0px;
    }
</style>

<script>
    $(document).ready(function(){

      

        $(".change_ip").click(function(e){
            e.preventDefault();
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/change_ip",
                    data: { username: $(".username").val(), ip: $(".ip").val(), mac: $(".mac").val() },
                    success:function(result){

                // $(".updated_time_password").html(result);

              

                $(".dynamic_form").fadeOut(3000)
                .css("background-color", "#84ce84")
                .animate({
                    backgroundColor: "FFF",
                  }, 3000, function() {
                    // Animation complete.
                });

            }});
        });

       
    });
   
</script>