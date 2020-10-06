<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';






if (isset($_GET['id'])) {
    $id = $_GET['id'];



?>
    <link rel="stylesheet" type="text/css" href="acompanhar_pedido.css">

    <br><br>


    <div class="col container">


        <br><br>


        <div class="div-sel" id="div1">
            <table class="striped">
                <thead>
                    <tr>

                        <th>ID:</th>
                        <th>CPF/CNPJ:</th>
                        <th>Defeito informado pelo cliente:</th>

                    </tr>
                </thead>

                <tbody>
                    <?php




                    $sql = "SELECT * FROM adicionar_servico WHERE id = '$id'";
                    $resultado = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($resultado) > 0) :

                        while ($dados = mysqli_fetch_array($resultado)) :
                    ?>
                            <tr>


                                <td><?php echo $dados['id'];
                                    $identificado = $dados['id'];    ?></td>
                                <td><?php echo $dados['cpf'];    ?></td>
                                <td><?php echo $dados['defeito'];    ?></td>
                                <?php
                                $data = $dados['data'];

                                $hora = $dados['hora'];

                                $situacao_pedido = $dados['situacao_pedido'];

                                $imagem = $dados['imagem'];

                                $observacao = $dados['observacao'];
                                ?>
                                <td>
                                    <strong>
                                        <div style="font-size: 25px; font-weight: normal" id="dday"></div>
                                    </strong>
                                </td>

                                <td>
                                    <div style="color:#b71c1c; font-size: 25px; font-weight: normal" id="dday_expirado"></div>
                                </td>



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

            <form action="">
                <?php



                /////////////////////////ola
                $sql = "SELECT * FROM observacao_servico order by id ASC";
                $resultado_obs = mysqli_query($connect, $sql);
                ?>
                <br>


                <h4>Acompanhar pedido:</h4>
                <div class="div1 intro" style="padding: 15px;background-color: #263238 ;color:white;">
                    <br><img src="../upload/<?php echo $imagem ?>" alt="" width="600" height="300" style="align-self: center;">
                    <br>
                    <?php
                    echo $observacao;    
                    ?>
                </div>


                <?php

                if (mysqli_num_rows($resultado_obs) > 0) :

                    while ($dados_obs = mysqli_fetch_array($resultado_obs)) :

                        if (isset($identificado)) {
                        } else {
                            $identificado = $_GET['id'];
                        }

                        if ($identificado == $dados_obs['id_servico']) {

                ?>
                            <div class="div1 intro" style="padding: 15px;background-color: #263238 ;color:white;">
                                <div style="width: 85%;">
                                    <?php
                                    echo $dados_obs['observacao'];    ?>
                                </div>
                                <div>
                                    <a href="#modal1<?php echo $dados_obs['id']; ?>" class="btn red modal-trigger botao" style="bottom: 25px;"><i class="material-icons">delete</i></a>
                                </div>

                            </div>
                            <div style="height: 5px;">

                            </div>
                            <!-- Modal Structure -->

                            <div id="modal1<?php echo $dados_obs['id']; ?>" class="modal">
                                <div class="modal-content">

                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse pedido?</p>
                                </div>
                                <div class="modal-footer">

                                    <form action="" method="POST">

                                        <a href="../php_action/delete_acompanhar_pedido.php?id=<?php echo $dados_obs['id']; ?>&id_ser=<?php echo $dados_obs['id_servico']; ?>" class="btn red">Sim, quero deletar</a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                                    </form>

                                </div>
                            </div>


                <?php

                        }
                    endwhile;
                endif;
            } else {
                ?>
                <br><br><br>
                <h1>Está página não existe!</h1>

            <?php
            }

            ?>
            </form>
        </div>

        <br>



        <br>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Adicionar nova observação</a>

        <!-- Modal Structure -->
        <div id="modal2" class="modal">
            <div class="modal-content">


                <img src="../upload/<?php echo $imagem ?>" alt="" width="220" height="220">

                <form action="../php_action/cadastrar_obs.php" method="POST">

                    <div class="input-field col s12">
                        <label for="obs">Adicionar nova observação</label>
                        <input type="text" name="obs" id="obs" style="height: 50px;" maxlength="500">

                    </div>

                    <input type="hidden" name="id_servico" value="<?php echo $identificado; ?>">

                    <button type="submit" name="btn-add-obs" class="btn green">CONCLUIR</button>

                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                </form>
            </div>
        </div>



        <a href="status_servico.php" class="btn teal darken-4">Voltar</a>

    </div>
    <br><br><br>
    <?php
    #echo $data;
    $arraydata1 = explode('-', $data);

    #echo $hora;
    $arrayhora = explode(':', $hora);
    #echo $arrayhora[2];


    ?>


    <?php
    // Tempo restante para terminar o servico
    include_once 'acompanhar_pedido_script.php';

    // Footer
    include_once '../includes/footer.php';
    ?>