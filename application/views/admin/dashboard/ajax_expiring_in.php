<table class="table table-hover">
    <thead>
    
    <tr>
        <th class="col-md-4">Username</th>
        <th class="col-md-4">Full Name</th>
        <th class="col-md-4">Number(s)</th>
        <th class="col-md-4">Extended</th>
        <th class="col-md-4">Expiration Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($expiring_accounts as $account):
    ?>
    <tr>
        <td><a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>"> #<?php echo $account->username; ?></a></td>
        <td><?php echo $account->user->first_name . " " . $account->user->last_name; ?></td>
        <td><?php echo $account->user->primary_phone; ?></td>
        <td><?php echo $account->extended_days; ?></td>
        <td><?php echo $account->value; ?></td>
    </tr>
    <?php
        endforeach;
    ?>
   
    </tbody>
</table>