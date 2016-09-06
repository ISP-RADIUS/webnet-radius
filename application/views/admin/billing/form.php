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
                        <form class="form-horizontal" method="POST" role="form" action="<?php echo base_url(); ?>billing/<?php echo $user->username; ?>/add_sale">
                            <input type="hidden" name="username" class="username" value="<?php echo $user->username; ?>">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Sale of</label>
                                <div class="col-sm-6">
                                    <select name="payment_for" id="" class="form-control sale_of">
                                        <option value="" disabled selected> Sale For</option>
                                        <option value="internet">Internet</option>
                                        <option value="device">Device Sale</option>
                                        <option value="installation">Installation</option>
                                        <option value="deposit">Deposit</option>
                                       
                                    </select>
                                </div>
                               
                            </div>

                            <div class="form-group internet_form">
                                <div class="form-group ">
                                    <label for="" class="col-sm-2 control-label">Plan</label>
                                    <div class="col-sm-6">
                                        <select name="internet_plan" id="" class="form-control plan">
                                            <option value="Plan" disabled selected> Plan</option>
                                            <option value="Night 1">Night 1</option>
                                            <option value="Unlimited 256">Unlimited 256</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="" class="col-sm-2 control-label">Months</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="months" class="form-control months" value="1" id="" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6">
                                        <select name="renew" id="">
                                            <option value="1">Renew</option>
                                            <option value="0">Dont Renew</option>
                                        </select>
                                        this account for <span class="jquery_months"> 1 </span> months.
                                    </div>
                                </div>



                                
                            </div>

                            <div class="device_form">
                                
                            </div>

                           
                           <div class="form-group ">
                                <label for="" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-6">
                                    <input type="number" name="total_amount" class="form-control total_amount" id=""  placeholder="">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="" class="col-sm-2 control-label">Amount Received</label>
                                <div class="col-sm-6">
                                    <input type="number" name="amount_received" class="form-control amount_received"  id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="" class="col-sm-2 control-label">Remaining Balance</label>
                                <div class="col-sm-6">
                                    <input type="number" name="remaining_balance" class="form-control remaining_balance" id="" placeholder="">
                                </div>
                            </div>






                            <div class="form-group ">
                                <label for="" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-6">
                                    <textarea name="description" class="form-control description">
                                        
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <input type="submit" class="form-control ">
                                </div>
                            </div>
                            
                        </form>

                      

                        
                    </div>

                   
                </div>
            </div>
            
        </div>

       


      



        

    </div>
    <!-- END: CONTENT -->
</section>

<style>
    .internet_form{
        display: none;
        background: #eee;
        padding: 10px 0px;
    }
    .device_form{
        display: none;
        background: #eee;
        padding: 10px 0px;
    }
</style>

<script>
    $(document).ready(function(){

      

        var username = $(".username").val();
        

      

        $(".sale_of").change(function(){
           var sale_of = $(".sale_of").val();
           if(sale_of=='internet')
           {
            $(".internet_form").css('display','block');
            $(".device_form").hide();

            



           }
           else if(sale_of=='device')
           {
            $(".internet_form").hide();
            $(".device_form").show();


           }
            $.ajax({type: "POST",
                    url: "<?php echo base_url(); ?>ajax/calculate_price",
                    data: { sale_of: $(".sale_of").val(), username: $(".username").val() },
                    success:function(result){




                $(".price").val(result);


               

            }});

            
        });

        $('.months').bind('keyup keypress', function() { 
            $('.jquery_months').html($(".months").val());
        });

       


         
       
         
        $(".total_amount").bind('keyup keypress', function(){
            calculateCost()
        });
        $(".amount_received").bind('keyup keypress', function(){
            calculateCost()
        });
         
        function calculateCost(e) {
            var total_amount = $('.total_amount').val();
            var amount_received = $('.amount_received').val();


            var remaining_balance =  amount_received - total_amount;

            $('.remaining_balance').val(remaining_balance);
        }
      
    });




    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
   
</script>

<div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mac[]"></div>
</div>