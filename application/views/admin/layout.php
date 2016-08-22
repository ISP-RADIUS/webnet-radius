<?php $this->load->view('admin/include/header'); ?>

<div class="container">
                    <div class="user-avatar">
                        <img alt="" src="<?php echo base_url(); ?>img/users/blank.jpg" class="img-circle avatar" style="width:70px;">
                        <span class="user-status-circle online"></span>
                    </div>
                
                    <div class="user-info">
                        <div class="header">
                            <div class="col-md-12">
                                <h4 class="header-title">test1 </h4>
                                <p class="header-info">512 kbps / 20 GB Disk / Last online 24 minutes ago</p>
                            </div>
                        </div>

                    </div>

                    <div class="account-status">
                        <button type="button" class="btn btn-success">Online</button>
                    </div>
                    

                </div>

                <div class="container bordered">
                    <div class="tech-info">
                        <div class="info-box"><strong>Public IP:</strong> 103.23.12.25</div>
                        <div class="info-box"><strong>Device MAC:</strong> 103.23.12.25</div>
                        <div class="info-box"><strong>Device IP:</strong> 103.23.12.25</div>
                    </div>

                </div>

<?php $this->load->view('admin/include/side_nav'); ?>


<?php $this->load->view('admin/'.$subview); ?>


<?php $this->load->view('admin/include/footer'); ?>