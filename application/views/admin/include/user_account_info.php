<div class="container">
                    <div class="user-avatar">
                        <img alt="" src="<?php echo base_url(); ?>img/users/blank.jpg" class="img-circle avatar" style="width:70px;">
                        <span class="user-status-circle <?php echo $account->status; ?>"></span>
                    </div>
                
                    <div class="user-info">
                        <div class="header">
                            <div class="col-md-12">
                                <h4 class="header-title">test1 </h4>
                                <p class="header-info">
                                    <?php echo $account->speed; ?> 
                                    / 20 GB Disk / 
                                    Last Online 
                                    <?php
                                        if($account->status=='offline' || $account->status == "expired"):
                                            echo $account->last_active->acctstoptime; 
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
                        <div class="info-box"><strong>Public IP:</strong> 103.23.12.25</div>
                        <div class="info-box"><strong>Device MAC:</strong> 103.23.12.25</div>
                        <div class="info-box"><strong>Device IP:</strong> 103.23.12.25</div>
                    </div>

                </div>