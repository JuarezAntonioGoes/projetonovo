<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';

// Contador de serviços de serviços em analise



?>



<br><br>

<div class="col container">
    <a href="./textselect.php" class="waves-effect  btn modal-trigger grey darken-3">Cadastrar Serviço</a>
    <BR></BR>

    <h2>Serviços concluidos com sucesso</h2>
    <br>

    <?php
    $status_servico = 3;
    include_once './paginacao_servicos/index.php';
    ?>


    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome:</th>
                <th>Detalhes do fechamento do serviço:</th>

            </tr>
        </thead>

        <tbody>
            <?php

            $sql = "SELECT * FROM adicionar_servico WHERE situacao_pedido = '3' order by id DESC LIMIT $inicio, $quantidade";
            $resultado = mysqli_query($connect, $sql);

            if (mysqli_num_rows($resultado) > 0) :

                while ($dados = mysqli_fetch_array($resultado)) :
            ?>
                    <tr>
                        <td><i class="material-icons" style="color: #00e676 ;">done_all</i></td>
                        <td><?php echo $dados['nome'];    ?></td>
                        <td><?php echo $dados['defeito'];    ?></td>






                        <td><a href="#modal1<?php echo $dados['id']; ?>" class="btn red modal-trigger"><i class="material-icons">delete</i></a></td>

                        <!-- Modal Structure -->

                        <div id="modal1<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Opa!</h4>
                                <p>Tem certeza que deseja excluir esse pedido?</p>
                            </div>
                            <div class="modal-footer">

                                <form action="../php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit" name="btn-deletar-fechamento" class="btn red">Sim, quero deletar</button>

                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                                </form>

                            </div>
                        </div>




                    </tr>
                <?php
                endwhile;
            else : ?>


                <tr>
                    <td>-</td>
                    <td>-</td>
                </tr>

            <?php
            endif;

            ?>

        </tbody>
    </table>



    <br>
    <a href="status_servico.php" class="btn teal darken-4">Voltar</a>
</div>


<br><br><br>

<?php

// Footer
include_once '../includes/footer.php';
?>
</div>