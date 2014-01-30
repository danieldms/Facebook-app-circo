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


<!-- Row 3 -->
<div class="row-fluid">
    <!-- Column 1 of Row 2 -->
    <div class="span12">
        <!-- Statistics Tile -->
        <div class="dash-tile dash-tile-2x">
            <div class="dash-tile-header">
                <i class="icon-bar-chart"></i>
                Histórico de Acesso
            </div>
            <div class="dash-tile-content">
                <div id="dash-example-stats" class="dash-tile-content-inner"></div>
            </div>
        </div>
        <!-- END Statistics Tile -->
    </div>
    <!-- END Column 1 of Row 2 -->
</div>
<!-- END Row 3 -->


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

<style type="text/css">

#dash-example-stats .button {
        position: absolute;
        cursor: pointer;
}

#dash-example-stats div.button {
        font-size: smaller;
        color: #999;
        background-color: #eee;
        padding: 2px;
}
.message {
        padding-left: 50px;
        font-size: smaller;
}
</style>

<?php
Yii::app()->clientScript->registerScript('javascript','
    $(function(){
        // Dash example stats
        var dashChart = $("#dash-example-stats");

        var dashChartData1 = [
            '.$stats.'
        ];
        var dashChartData2 = [
            '.$stats.'
        ];

        // Initialize Chart
        var plot = $.plot(dashChart, [
            {data: dashChartData1, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.05}]}}, points: {show: true}, label: "Visitantes por dia"}],
        {
            legend: {
                position: "nw",
                backgroundColor: "#f6f6f6",
                backgroundOpacity: 0.8
            },
            colors: ["#555555", "#db4a39"],  
            grid: {
                borderColor: "#cccccc",
                color: "#999999",
                labelMargin: 5,
                hoverable: true,
                clickable: true
            },
            zoom: {
                interactive: true
            },
            pan: {
                interactive: false
            },
            yaxis: {
                ticks: 5,
                min: 0,
                minTickSize: 0,
            },
            xaxis: { 
                mode: "time", 
                tickSize: [1, "day"],
                min: (new Date("2013/12/30"))        
            }

        });
        // show pan/zoom messages to illustrate events 
       $(\'<div class="button" style="right:20px;top:20px">zoom out</div>\')
        .appendTo(dashChart)
        .click(function (event) {
                event.preventDefault();
                plot.zoomOut();
        });

        function addArrow(dir, right, top, offset) {
            $("<img class=\'button\' src=\'../images/admin/arrow-" + dir + ".gif\' style=\'right:" + right + "px;top:" + top + "px\'>")
                .appendTo(dashChart)
                .click(function (e) {
                        e.preventDefault();
                        plot.pan(offset);
            });
        }

        addArrow("left", 55, 60, { left: -100 });
        addArrow("right", 25, 60, { left: 100 });
        addArrow("up", 40, 45, { top: -100 });
        addArrow("down", 40, 75, { top: 100 });

        // Create and bind tooltip
        var previousPoint = null;
        dashChart.bind("plothover", function(event, pos, item) {

            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0],
                        y = item.datapoint[1];

                    var text = "Votos";
                    if(item.seriesIndex == 0){
                        text = "Visitantes";
                    } 

                    $("<div id=\"tooltip\" class=\"chart-tooltip\"><strong>" + y + "</strong> "+ text +"</div>")
                        .css({top: item.pageY - 30, left: item.pageX + 5})
                        .appendTo("body")
                        .show();
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    });
',CClientScript::POS_BEGIN);          
?>
