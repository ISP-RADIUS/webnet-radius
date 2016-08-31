<?php $this->load->view('admin/include/header'); ?>


<?php 
    if(isset($account))
    $this->load->view('admin/include/user_account_info'); 
?>

<?php $this->load->view('admin/include/side_nav'); ?>


<?php $this->load->view('admin/'.$subview); ?>


<?php $this->load->view('admin/include/footer'); ?>