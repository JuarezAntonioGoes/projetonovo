<?php


$cont_cancelado = 0;
$concluido = 0;
?>
<div class="col container s10">


    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //$("#campo1").mask("00/00/0000");
            //$("#campo").mask("00/00/0000");



        })
    </script>

    <form method="POST" action="">

        Data inicial: <input type="date" class="" name="campo" id="campo1" required>
        Data final: <input type="date" class="" name="data_final" id="campo" required value="<?php echo date('Y-m-d') ?>">
        <input type="submit" value="Pesquisar" name="SendPesqUser" class="btn">


    </form>
    <br><br>
    <?php
    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
    if ($SendPesqUser) {



        $cont_cancelado = 0;
        $concluido = 0;


        $campo = filter_input(INPUT_POST, 'campo', FILTER_SANITIZE_STRING);;
        //echo $campo;





        $arraydata1 = explode('-', $campo);
        $data_ini = $arraydata1[2] . '/' . $arraydata1[1] . '/' . $arraydata1[0];



        $data_final = $_POST['data_final'];



        $arraydata1 = explode('-', $data_final);
        $data_fim = $arraydata1[2] . '/' . $arraydata1[1] . '/' . $arraydata1[0];
        //echo $data_fim;



        $sql = "SELECT * FROM adicionar_servico WHERE data >= '$campo' && data <= '$data_final'";
        $resultado = mysqli_query($connect, $sql);



        if (mysqli_num_rows($resultado) > 0) :

            while ($dados = mysqli_fetch_array($resultado)) :
    ?>

        <?php
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
                            title: 'Dados de pedidos feitos <?php echo $data_ini . ' - ' . $data_fim; ?>'
                        };
                    }
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
        </script>


    <?php

    } else {
        include "result_todo_periodo.php";
    }
    ?>
</div>