<!-- Navigation info -->
<ul id="nav-info" class="clearfix">
    <li><a href="index.html"><i class="icon-home"></i></a></li>
    <li><a href="javascript:void(0)">Votos</a></li>
    <li class="active"><a href="">Lista</a></li>
</ul>
<!-- END Navigation info -->
<!-- Default style -->
<h3 class="page-header page-header-top">Lista de Votos
    <div class="btn-group pull-right">
        <?= CHtml::link('<i class="icon-cog"></i> Exportar', array('admin/export', 'class' => 'votos'), array('class' => 'btn btn-success',  "data-toggle" => "tooltip", 'data-original-title' => "Exportar", 'target' => '_blank')); ?>
    </div>
</h3>

<table class="table table-condensed">
    <thead>
        <tr>
            <th class="span1 text-center">#</th>
            <th>Nome</th>
            <th class="hidden-phone"><i class="icon-envelope-alt"></i> Email</th>
            <th class="hidden-phone">Instituição</th>
        </tr>
    </thead>
    <tbody>
    	<?
        $i = 1; 
        foreach ($lista as $key => $value) {  
            foreach ($value->instituicao as $key1 => $value1) { ?>
    	        <tr>
    	            <td class="span1 text-center"><?= $i ?></td>
    	            <td> <?= $value->nome ?></td>
    	            <td class="hidden-phone"><?= $value->email ?></td>
    	            <td class="hidden-phone"><?= $value1->nome ?></td>

    	        </tr>
        <?  $i++;
            } 
        } ?>
    </tbody>
</table>
<!-- END Default style -->