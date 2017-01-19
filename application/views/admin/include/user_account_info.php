
<div class="container">
                    <div class="user-avatar">
                        <img alt="" src="<?php echo base_url(); ?>img/users/blank.jpg" class="img-circle avatar" style="width:70px;">
                        <span class="user-status-circle <?php echo $account->status; ?>"></span>
                    </div>
                
                    <div class="user-info">
                        <div class="header">
                            <div class="col-md-12">
                                <h4 class="header-title"><?php echo $account->username; ?> </h4>
                                <p class="header-info">
                                    <?php echo $account->speed; ?> 
                                    / 
                                    
                                    <?php
                                        if(!$account->session->current):
                                            if(!$account->session->last):
                                                echo "N/A";
                                            else:
                                                echo "Last Online : " . $account->session->last->AcctStopTime; 
                                            endif;
                                        elseif($account->session->current):
                                            echo "Online since: " . $account->session->current->AcctStartTime;
                                        endif;
                                    ?>
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="account-status">
                        <button type="button" class="btn <?php echo $account->status; ?>"><?php echo $account->status; ?></button>
                    </div>
                    

                </div>

                <div class="container bordered">
                    <div class="tech-info">
                        <div class="info-box"><strong>Public IP:</strong> <?php echo $account->public_ip; ?></div>
                        <div class="info-box"><strong>Device MAC:</strong> <?php echo $account->mac_address; ?></div>
                        <div class="info-box"><strong>Online IP:</strong> <a  target="_blank" href="https://<?php echo $account->client_ip; ?>"><?php echo $account->client_ip; ?> <i class="fa fa-external-link"></i> </a></div>

                        <?php
                            if(empty($account->device)):
                                $ip = "Setup IP";
                                $text = base_url() ."account/".$account->username."/settings#device_ip";
                            else:
                                $ip = $account->device->ip;
                                $text = "https://".$ip;
                            endif;
                        ?>
                        <div class="info-box">
                            <i class="icon-spinner icon-spin icon-large"> </i>
                            <strong>Device IP:</strong> 
                                <a  target="_blank" href="<?php echo $text; ?>"> <i class="fa fa-external-link"></i> <?php echo $ip; ?> </a> <span class="device-status-rectangle " id="tt"> <span id="ttl" class="small"></span> </span>  </div>
                    </div>

                </div>








<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript">
    function test(host) {
        // Fork it
        var request;
        // fire off the request to /form.php
        request = $.ajax({
            url: "<?php echo base_url(); ?>monitor/device_ip",
            type: "get",
            data: {
                host: host
            },
            beforeSend: function () {
                $('#tt').children().children().css({'visibility': 'visible'});
            }
        });
        // callback handler that will be called on success

       
        request.done(function (response, textStatus, jqXHR) {


            var response = jQuery.parseJSON(response)
            console.log(response);
            var status = response.status;
            var statusClass;
            if (status) {
                statusClass = 'connected';
                $('#ttl').text(response.ttl);
            } else {
                statusClass = 'disconnected';
                $('#ttl').text('failure');
            }
            $('#tt').removeClass('connected disconnected').addClass(statusClass);
        });




        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // log the error to the console
            console.error(
                "The following error occured: " +
                    textStatus, errorThrown
            );
        });
        // request.always(function () {
        //     $('#tt').css({'visibility': 'hidden'});
        // })
    }
    $(document).ready(function () {
        var server = '<?php echo $ip; ?>';
        test(server);
        (function loop(server) {
            setTimeout(function () {
                test(server);
                loop(server);
            }, 6000);
        })(server);
    });
</script>


