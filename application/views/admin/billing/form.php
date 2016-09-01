<section class="content bordered-all">

    <!-- CONTENT -->
    <div class="main-content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <div class="panel-actions">
                            
                        </div>
                        <h3 class="panel-title"> Add new Sale</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <input type="hidden" name="username" class="username" value="<?php echo $user->username; ?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sale of</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="username" value="">
                                    <select name="" id="" class="form-control sale_of">
                                        <option value="" disabled selected> Sale For</option>
                                        <option value="internet">Internet</option>
                                        <option value="device_sale">Device Sale</option>
                                    </select>
                                </div>
                               
                            </div>

                            <div class="ajax_form_load">
                                
                            </div>

                            
                           
                            
                        </form>

                        
                    </div>

                   
                </div>
            </div>
            
        </div>

       


      



        

    </div>
    <!-- END: CONTENT -->
</section>


<script>
    $(document).ready(function(){

        $(".no_of_months").hide();

        $(".sale_of").change(function(){
           var sale_of = $(".sale_of").val();
           if(sale_of=='internet')
           {
            $(".no_of_months").show();
           }
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/calculate_price",
                    data: { sale_of: $(".sale_of").val(), username: $(".username").val() },
                    success:function(result){




                $(".ajax_form_load").val(result);


               

            }});
        });

      
    });
   
</script>