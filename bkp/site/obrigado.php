<div class="row bg3">
	
	<div class="large-12 columns">		
	</div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
	<div class="large-12 columns ">
		<?php 
			$gen = $escolhido->genero == 'M' ? 'o' : 'a';
		?>
		<h1 style="color:#333; margin:0 0 0 50px;">Você é <?= $gen ?> <?= $escolhido->nome ?></h1>
	</div>
	<div class="large-5 columns">
		<section class="main">
			<div class="baraja-demo">
				<ul id="baraja-el" class="baraja-container">
					<li style="margin:0 0 0 -20px; width:300px; height:465px;"><img  src="<?= $this->data['baseUrl'] ?>/images/<?= $escolhido->image ?>" alt="<?= $escolhido->nome ?>"/></li>
				</ul>
			</div>
			
		</section>
	</div>
	<div class="large-6 column">
		<p class="descricao"><?= $escolhido->descricao ?> <p>
		<div class="small-6 columns">
			<?php echo CHtml::link('',"javascript:void(0)", array("class"=>'button large round alert embaralhar', 'id'=>'embaralhar', "target" => 'self')); ?>
	</div>
	
	<div class="small-6 columns">
			<?php echo CHtml::link('',array('site/obrigado'), array("class"=>'button large round alert compartilhar', 'id'=>'compartilhar', "target" => '_top')); ?>
	</div>
	</div>
	<div class="large-12 columns">
		<div class="small-3 small-centered columns">
			
		</div>
	</div>
	
	
</div>