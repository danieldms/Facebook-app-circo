<!-- Navigation info -->
<ul id="nav-info" class="clearfix">
    <li><a href="index.html"><i class="icon-home"></i></a></li>
    <li><a href="javascript:void(0)">Usuários</a></li>
    <li class="active"><a href="">Lista</a></li>
</ul>
<!-- END Navigation info -->
<!-- Default style -->
<h3 class="page-header page-header-top">Lista de Usuários
    <div class="btn-group pull-right">
        <?= CHtml::link('<i class="icon-cog"></i> Exportar', array('admin/export', 'class' => 'usuario'), array('class' => 'btn btn-success',  "data-toggle" => "tooltip", 'data-original-title' => "Exportar", 'target' => '_blank')); ?>
    </div>
</h3>

<table class="table table-condensed">
    <thead>
        <tr>
            <th class="span1 text-center">#</th>
            <th>Nome</th>
            <th class="hidden-phone"><i class="icon-envelope-alt"></i> Email</th>
            <th class="hidden-phone">Cidade</th>
            <th class="hidden-phone">Data Nasc.</th>
            <th class="hidden-phone">Sexo</th>
            <th class="hidden-phone">Criado Em</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($lista as $key => $value) { ?>
            <tr>
                <td class="span1 text-center"><?= $key+1 ?></td>
                <td> <?= $value->nome ?></td>
                <td class="hidden-phone"><?= $value->email ?></td>
                <td class="hidden-phone"><?= $value->cidade ?></td>
                <td class="hidden-phone"><?= date('d/m/Y', strtotime($value->birthday)); ?></td>
                <td class="hidden-phone"><?= $value->genero ?></td>
                <td class="hidden-phone"><?= date('d/m/Y H:i:s', strtotime($value->create_at)); ?></td>
            </tr>
        <? } ?>
    </tbody>
</table>
<!-- END Default style -->