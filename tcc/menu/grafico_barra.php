<?php
// Conexão
require_once '../php_action/db_connect.php';

$sql = "SELECT * FROM adicionar_servico order by id ";
$resultado = mysqli_query($connect, $sql);
$mes = [11];
$mes_cancelado = [11];

for($k= 0 ; $k<12; $k++){
  $mes[$k] = 0;
  $mes_cancelado[$k] = 0;
}

$ano = date('Y');


if (mysqli_num_rows($resultado) > 0) :

  while ($dados = mysqli_fetch_array($resultado)) :
    $campo_mes = $dados['data'];
    $arraydata1 = explode('-', $campo_mes);

    if ($arraydata1[0] == $ano && $dados['situacao_pedido'] == 3) {
      for ($i = 0; $i < 12; $i++) {
        if ($arraydata1[1] == $i) {
          $mes[$i] = $mes[$i] + 1;
        }
      }
      
    }

    if ($arraydata1[0] == $ano && $dados['situacao_pedido'] == 1) {
      for ($i = 0; $i < 12; $i++) {
        if ($arraydata1[1] == $i) {
          $mes_cancelado[$i] += 1;
        }
      }
      
    }

  endwhile;
endif;
?>
<script>
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Mes', 'Concluídos', 'Cancelados'],
      ['Janeiro', <?php $j=0; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Fevereiro', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Março', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Abril', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Maio', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Junho', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Julho', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Agosto', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Setembro', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Outubro', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Novembro', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>],
      ['Dezembro', <?php $j+=1; echo $mes[$j] ?>, <?php echo $mes_cancelado[$j] ?>]
    ]);

    var options = {
      title: 'Acompanhamento Anual',
      hAxis: {
        title: <?php echo $ano;?>,
        titleTextStyle: {
          color: '#333'
        }
      },
      vAxis: {
        minValue: 0
      }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>