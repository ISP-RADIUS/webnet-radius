
<?php

$menu =  $this->uri->segment(1);

if($menu=="accounts" || $menu == "account"):
?>

<!-- SIDEBAR -->
<aside class="sidebar">
    <ul class="nav nav-stacked">

        <li class="" ><a href="#"> <i class="fa fa-dashboard fa-fw"> </i> <span class="item-label">Dashboard</span></a></li>
        <li class="" ><a href="#"> <i class="fa fa-user fa-fw"> </i> <span class="item-label">User</span></a></li>
        <li class="" ><a href="#"> <i class="fa fa-database fa-fw"> </i> <span class="item-label">Sessions</span></a></li>
        <li class="" ><a href="#"> <i class="fa fa-inr fa-fw"> </i> <span class="item-label">Payments</span></a></li>
        <li class="" ><a href="#"> <i class="fa fa-bell fa-fw"> </i> <span class="item-label">Notifications</span></a></li>
        

        <li class="active" ><a href="index.html"> <i class="fa fa-cogs fa-fw"></i> <span class="item-label">Settings</span></a></li>
        
       
    </ul>
</aside>
<!-- END: SIDEBAR -->

<?php
	elseif($menu=="billing" || $menu == "billings"):

?>

<!-- SIDEBAR -->
<aside class="sidebar">
    <ul class="nav nav-stacked">

       
        <li class="active" ><a href="<?php echo base_url(); ?>billing/<?php echo $user->username; ?>/add_sale"> <i class="fa fa-cogs fa-fw"></i> <span class="item-label">Add Sale</span></a></li>
        <li class="active" ><a href="<?php echo base_url(); ?>billing/<?php echo $user->username; ?>/add_purchase"> <i class="fa fa-cogs fa-fw"></i> <span class="item-label">Add Purchase</span></a></li>
        <li class="active" ><a href="<?php echo base_url(); ?>billing/<?php echo $user->username; ?>/transactions"> <i class="fa fa-cogs fa-fw"></i> <span class="item-label">Transactions</span></a></li>
        
       
    </ul>
</aside>
<!-- END: SIDEBAR -->



<?php
	endif;
?>