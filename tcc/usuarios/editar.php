<?php
include_once '../includes/header.php';

require_once '../php_action/db_connect.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM tela_login WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);




?>
    <style type="text/css">
        .valid {
            border: 1px solid green;
        }

        .error {
            font-size: 15px;
            color: red;
        }

        .resultado {
            color: red;
        }
    </style>
    <script>
        $('document').ready(function() {


            $('#form').validate({
                rules: {
                    conf_senha: {
                        equalTo: '#senha'
                    },
                    nome: {
                        required: true,
                        minlength: 3,
                        maxlength: 33
                    },
                    user: {
                        required: true,
                        minlength: 3,
                        maxlength: 15,

                    },
                    senha: {
                        required: true,
                        rangelength: [6, 13]
                    }

                },
                messages: {
                    conf_senha: {
                        equalTo: 'As senhas não se coincidem'
                    },
                    nome: {
                        required: 'Campo Obrigatório',
                        minlength: 'Mínimo 3 caracteres',
                        maxlength: 'Máximo 33 caracteres'
                    },
                    user: {
                        required: 'Campo Obrigatório',
                        minlength: 'Mínimo 3 caracteres',
                        maxlength: 'Máximo 15 caracteres'
                    },
                    tipo: {
                        required: 'Campo Obrigatório'
                    },
                    senha: {
                        required: 'Campo Obrigatório',
                        rangelength: 'O campo deve conter entre 6 e 13 caracteres'
                    }

                }
            });


            $('#check_senha').on('click', function() {
                if ($('#check_senha').is(':checked')) {
                    $("#password").prop("disabled", false);
                    $("#conf_password").prop("disabled", false);
                } else {
                    $("#password").prop("disabled", true);
                    $("#conf_password").prop("disabled", true);
                }
            });
        });
    </script>

    <div class="container">
        <form action="editar_action.php?id=<?php echo $dados['id'] ?>" id="form" method="POST">
            <div class="row">

                <div class="input-field col s12">
                    <label for="nome" class="active">Nome</label>
                    <input id="nome" type="text" class="validate" name="nome" value="<?php echo $dados['nome']; ?>">
                    <div id="id-error">
                        <label for="nome" class="error" generated="true"></label>
                    </div>
                </div>
                <div class="input-field col s12">
                    <label for="user" class="active">Usuário</label>
                    <input id="user" type="text" class="validate" name="user" value="<?php echo $dados['login']; ?>">
                    <div id="id-error">
                        <label for="user" class="error" generated="true"></label>
                    </div>
                </div>


                <div class="input-field col s12">

                    <select class="browser-default" required name="tipo" id="tipo">

                        <?php echo '<option value="administrador">' . $dados["tipo"] . '</option>'; ?>
                        <option value="administrador">administrador</option>
                        <option value="atendente">atendente</option>
                        <option value="tecnico">tecnico</option>
                    </select>
                </div>


                <label>
                    <input type="checkbox" id="check_senha" />
                    <span>Alterar senha</span>
                </label>
                <div class="input-field col s12">

                    <label for="senha" class="active">Senha</label>
                    <input id="senha" type="text" class="validate" name="senha" disabled>
                    <div id="id-error">
                        <label for="senha" class="error" generated="true"></label>
                    </div>
                </div>

                <div class="input-field col s12">

                    <label for="conf_password" class="active">Confirmar Senha</label>
                    <input id="conf_password" type="text" class="validate" name="conf_senha" disabled>
                    <div id="id-error">
                        <label for="conf_password" class="error" generated="true"></label>
                    </div>
                </div>


                <div class="input-field col s12">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    <button type="submit" name="btn-editar" class="btn red">Editar</a>
                </div>
            </div>
        </form>
    </div>
<?php

} else {
    echo "ERRO";
}
include_once '../includes/footer.php';
?>