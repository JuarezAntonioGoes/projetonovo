
<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';


?>
<link rel="stylesheet" type="text/css" href="status_servico_1.css">


<br><br>

<div class="row">

    

    <a href="servicos_fechados_cancelados.php">
        <div class="col s12 m6 l6 div1">
            <div class="card medium ">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../img/concluido_sucesso.jpg">
                </div>
                <div class="card-content div4">
                    <span class="card-title activator grey-text text-darken-4">Serviços cancelados</span>
                    <p style="color:#b71c1c ;"><strong>Todos os servicos cancelados</strong></p>
                </div>

            </div>

        </div>
    </a>
    <div class="col s12 m6 l6 div1" >
        <a href="servicos_fechados_concluidos.php">
            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../img/pedido_cancelado.jpg">
                </div>
                <div class="card-content  div4">
                    <span class="card-title activator grey-text text-darken-4">Serviços concluidos com sucesso</span>
                    <p style="color:#00c853  ;"><strong>Todos os servicos concluidos</strong></p>
                </div>

            </div>
        </a>


    </div>
    
</div>
<a href="../menu/menu.php" style="margin: 10px 10px 10px 20px" class="btn teal darken-4">Inicio</a>

<?php
// Footer
include_once '../includes/footer.php';
?>