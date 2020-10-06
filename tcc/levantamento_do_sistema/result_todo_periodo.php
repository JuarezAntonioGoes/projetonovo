<?php




$sql = "SELECT * FROM adicionar_servico order by id DESC";
$resultado = mysqli_query($connect, $sql);

if (mysqli_num_rows($resultado) > 0) :

    while ($dados = mysqli_fetch_array($resultado)) :





        if ($dados['situacao_pedido'] == 1) {
            $cont_cancelado += 1;
        } elseif ($dados['situacao_pedido'] == 3) {
            $concluido += 1;
        }

    endwhile;

endif;

?>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="piechart" style="width: 900px; height: 500px;"></div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Consertados', <?php echo $concluido; ?>],
            ['Cancelados', <?php echo $cont_cancelado; ?>]
        ]);

        var concluido = <?php echo $concluido; ?>;
                var cancelado = <?php echo $cont_cancelado; ?>;
                if (concluido == 0 && cancelado == 0) {
                    var options = {
                        title: 'Nenhuma informação encontrada...'
                    };
                    }else {
                        var options = {
                            title: 'Levantamento de todo o histórico'
                        };
                    }

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>


<?php
