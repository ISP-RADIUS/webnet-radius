<?php
					foreach ($sessions as $session):
				?>

				<li> Date : <?php echo time_ago($session->date); ?>|  <?php echo $session->date; ?> | upload : <?php echo ($session->upload)  ; ?> | Download : <?php echo ($session->download) ; ?></li>

		      
				<?php
					endforeach;
				?>