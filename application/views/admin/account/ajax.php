<table class="table table-striped table-hover " id="accounts">
	<tr>count : <?php echo count($accounts); ?></tr>
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
                <td><a href="<?php echo base_url(); ?>account/<?php echo $account->username; ?>">#<?php echo $account->username; ?></a></td>
                <td></td>
                <td><a href="#">Sylvia Stingray</a></td>
                <td>
                    <span class="label <?php echo $status; ?>"> <?php echo $status; ?></span>
                </td>
                <td>$2,643.00</td>
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