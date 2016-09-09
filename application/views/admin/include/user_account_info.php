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
                                            echo "Last Online : " . $account->session->last->acctstoptime; 
                                        elseif($account->session->current):
                                            echo "Online since: " . $account->session->current->acctstarttime;
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
                        <div class="info-box"><strong>Device IP:</strong> <a  target="_blank" href="https://<?php echo $account->client_ip; ?>"><?php echo $account->client_ip; ?> <i class="fa fa-external-link"></i> </a></div>
                    </div>

                </div>