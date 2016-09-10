<section class="content bordered-all">

    <!-- CONTENT -->
    <div class="main-content">

        <div class="row">
           
            <p style="text-align:center;">Home for something awesome</p>
        </div>

      
		<?php 	echo count($account->sessions);  ?>


		<?php
			foreach ($account->sessions as $session):
		?>

		<li> Date : <?php echo $session->date; ?> | upload : <?php echo ($session->upload)  ; ?> | Download : <?php echo ($session->download) ; ?></li>

      
		<?php
			endforeach;
		?>


        

    </div>
    <!-- END: CONTENT -->
</section>

