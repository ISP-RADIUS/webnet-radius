<section class="content bordered-all">
                    
       

    <!-- CONTENT -->
    <div class="main-content">
            <div class="panel ">
                   

                    <div class="panel-body">

                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    
                                    <h5>Account Status</h5>
                                </div>
                                <div class="ibox-content">
                                    <h4 class="no-margins"><?php echo $account->status; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    
                                    <h5>Extended Days</h5>
                                </div>
                                <div class="ibox-content">
                                    <h4 class="no-margins"><?php echo $account->extended_days; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    
                                    <h5>Expiration</h5>
                                </div>
                                <div class="ibox-content">
                                    <h4 class="no-margins"><?php echo $account->expiration_date; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    
                                    <h5>Active Until</h5>
                                </div>
                                <div class="ibox-content">
                                    <h4 class="no-margins"><?php echo $account->active_until; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>          
    </div>

</section>

