<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';


$i = 0;
$j = 0;
$sql = "SELECT * FROM adicionar_servico order by id ";
$resultado = mysqli_query($connect, $sql);

if (mysqli_num_rows($resultado) > 0) :

    while ($dados = mysqli_fetch_array($resultado)) :
        if ($dados['situacao_pedido'] == 2) {
            $i += 1;
        } elseif ($dados['situacao_pedido'] == 0) {
            $j += 1;
        }
    endwhile;
endif;


?>
<link rel="stylesheet" type="text/css" href="menuu.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

<br><br>

<div class="row center">



    <a href="../gerenciar_serviços/index.php">
        <div class="col s12 m6 l6 tile">
            <div class="card medium">

                <div class="card-content">
                    <p class="center" style="color:#ef6c00 ; font-size: 200px;"><?php echo $j; ?></p>
                    <span class="card-title activator grey-text text-darken-4 center">Serviços em análise</span>
                </div>

            </div>

        </div>
    </a>

    <a href="../gerenciar_serviços/servicos_validos.php">
        <div class="col s12 m6 l6 tile">

            <div class="card medium">

                <div class="card-content">
                    <p class="center" style="color: #00c853; font-size: 200px;"><?php echo $i; ?></p>
                    <span class="card-title activator grey-text text-darken-4 center">Serviços válidados para conserto</span>
                </div>

            </div>

        </div>
    </a>

    <a href="../gerenciar_serviços/textselect.php">
        <div class="col s12 m12 l12 tile">
            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../img/cadastrar_servico.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4" style="font-size: 35px;">CADASTRAR SERVICOS</span>
                    <p style="color:#ff7043; font-size: 15px;">Clique para cadastrar novos serviços</p>
                </div>

            </div>

        </div>
    </a>

</div>


<?php include "../levantamento_do_sistema/index.php"; ?>
<?php include "./grafico_barra.php"; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" style="width: 100%; height: 500px;"></div>


<?php
// Footer
include_once '../includes/footer.php';
?>