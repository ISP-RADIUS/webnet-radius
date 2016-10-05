<?php $this->load->view('admin/include/header'); ?>


<?php 
    if(isset($account)):
    	if(empty($account->device)):
    		$this->load->view('admin/include/dynamic_form');
    	endif;

    	$this->load->view('admin/include/user_account_info'); 
    endif;

	
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