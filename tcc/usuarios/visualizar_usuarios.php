<?php

include_once '../includes/header.php';

require_once '../php_action/db_connect.php';


?>



<div class="container">
    <div class="row">



        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>Tipo</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM tela_login order by nome ASC";
                $resultado = mysqli_query($connect, $sql);



                if (mysqli_num_rows($resultado) > 0) {
                    while ($dados = mysqli_fetch_array($resultado)) {


                ?>
                        <tr>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['login']; ?></td>
                            <td><?php echo $dados['tipo']; ?></td>
                            <td><a href="#modal_visu<?php echo $dados['id']; ?>" class="btn-floating  blue accent-4 modal-trigger"><i class="material-icons">event_note</i></a></td>

                            <?php if ($dados['nome'] != 'Admin') { ?>
                                <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating  yellow accent-4"><i class="material-icons">edit</i></a></td>
                                <td><a href="#modal_excluir<?php echo $dados['id']; ?>" class="btn-floating  red modal-trigger"><i class="material-icons">delete</i></a></td>
                            <?php }

                            ?>

                        </tr>


                        <!-- Modal Structure -->
                        <div id="modal_visu<?php echo $dados['id']; ?>" class="modal">

                            <div class="modal-content">




                                <label for="nome" class="active">Nome</label>
                                <input id="nome" type="text" class="validate" name="nome" value="<?php echo $dados['nome']; ?>" readonly>


                                <label for="user" class="active">Usuário</label>
                                <input id="user" type="text" class="validate" name="user" value="<?php echo $dados['login']; ?>" readonly>




                                <label for="tipo">Função</label>
                                <input type="text" name="tipo" value="<?php echo $dados['tipo']; ?>" readonly>



                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </div>

                                </form>
                            </div>

                        </div>



                        <!-- Modal Structure -->
                        <div id="modal_excluir<?php echo $dados['id']; ?>" class="modal">
                            <form action="delete_user.php?id=<?php echo $dados['id']; ?>" method="POST">
                                <div class="modal-content">
                                    <h4>Excluir usuário</h4>
                                    <p>Deseja mesmo exluir o usuário <?php echo $dados['nome']; ?>? </p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    <button name="delete_user" class="btn red">Excluir</button>
                                </div>
                            </form>
                        </div>

                <?php

                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php

include_once '../includes/footer.php';
