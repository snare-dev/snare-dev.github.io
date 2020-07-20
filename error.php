<?php 

if(count($error) > 0) : ?>

	<div>
		
		<?php foreach ($error as $error ) : ?>

			<p style="color: red; font-size: 20px; font-weight: bold;">
				<?php echo $error ?>
			</p>

		<?php endforeach ?>

	</div>

<?php endif ?>