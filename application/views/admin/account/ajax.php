<div class="" id="accounts">
<tr>count : <?php echo count($accounts); ?></tr>
<table class="table table-striped table-hover " >
	
    <thead>

        <tr>
            <th>Username</th>
            <th>Created</th>
            <th>User</th>
            <th>Status</th>
            <th>Amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody >
        <?php
            foreach ($accounts as $account):
        ?>
            <tr>
                <td><?php //echo $count; ?></td>
                <td><a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>">#<?php echo $account->username; ?></a></td>
                <td></td>
                <td><a href="#"><?php echo $account->user->first_name . " " .$account->user->last_name; ?></a></td>
                <td>
                    <span class="label <?php echo $account->status; ?>"><?php echo $account->status; ?></span>
                </td>
                <td> <i class="fa fa-rupee"></i> <?php echo $account->balance; ?></td>
                <td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </td>
            </tr>
        <?php
            endforeach; 
        ?>

      
      
    </tbody>
</table>
</div>