<?php $this->load->view('admin/include/header'); ?>


<?php 
    if(isset($account))
    $this->load->view('admin/include/user_account_info'); 
?>

<?php 
	$segment =  $this->uri->segment(1);
    if($segment == 'ticket')
    $this->load->view('admin/ticket/top_ticket_info'); 
?>


<?php 
	$this->load->view('admin/include/side_nav'); 
?>


<?php $this->load->view('admin/'.$subview); ?>


<?php $this->load->view('admin/include/footer'); ?>