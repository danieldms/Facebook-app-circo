<div class="row bg2">
	<div class="large-12 columns">	
	</div>		

<div class="container">			
	<section class="main">
		<div class="baraja-demo">
			<ul id="baraja-el" class="baraja-container">
				<?php  foreach ($cartas as $key => $carta) {	?>
						<li><img src="<?= $this->data['baseUrl'] ?>/images/front.jpg" id="<?= $carta->idcartas ?>" class="verso" />
							<img src="<?= $this->data['baseUrl'] ?>/images/<?= $carta->image ?>" class="front" /></li>
				<?	}	?>
			</ul>
		</div>		
	</section>	
</div>

<div class="large-12 columns"><br><br><br><br><br><br><br><br><br>
	<div class="small-3 small-centered columns">
		<!-- <a href="javascript:void(0)" class="large button success round" id="embaralhar"><span>Embaralhar</span></a> -->
	</div>
</div>
</div>