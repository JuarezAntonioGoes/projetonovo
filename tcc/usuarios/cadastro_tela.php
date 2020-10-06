<?php

include '../includes/header.php';
?>
<script type="text/javascript" src="jquery.pstrength.js"></script>

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
<div class="container">
    <div class="row">

        <script type="text/javascript">
            $('document').ready(function() {

                
                //blur
                $("input[name='user']").on('keyup', function() {
                    var user = $('#user').val()

                    var nomeUsuario = $(this).val();
                    $.get('usuario.php?nomeUsuario=' + nomeUsuario, function(data) {
                        $('#resultado').html(data);
                        var result = data;

                        if (data == 'Usuário existente') {
                            $("#cadastrar_btn").attr("disabled", true);

                        } else {
                            $("#cadastrar_btn").attr("disabled", false);
                        }
                    });
                });
                

                $('#senha').pstrength();

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

                if ($('#showPassword').is(':checked')) {
                    $('.visi_on').show();
                    $('.visi_off').hide();
                }

                $('#showPassword').on('click', function() {
                    if ($('#showPassword').is(':checked')) {
                        $('.visi_on').show();
                        $('.visi_off').hide();
                    } else {
                        $('.visi_on').hide();
                        $('.visi_off').show();
                    }

                    var passwordField = $('#senha');
                    var passwordFieldType = passwordField.attr('type');
                    if (passwordFieldType == 'password') {
                        passwordField.attr('type', 'text');
                        $(this).val('Hide');
                    } else {
                        passwordField.attr('type', 'password');
                        $(this).val('show');
                    }
                });

            });
        </script>

        <h2>CADASTRO DE USUÁRIOS</h2>
        <form action="cadastar_action.php
        " method="POST" id="form">
            <div class="input-field col s12">
                <label for="nome" class="active">Nome <span style="color: red">*</span></label>
                <input type="text" name="nome" id="nome">

            </div>
            <div id="id-error">
                <label for="nome" class="error" generated="true"></label>
            </div>

            <div class="input-field col s12">
                <label for="user">Nome do Usuário <span>*</span></label>
                <input type="text" name="user" id="user">
                <div id="resultado" style="color: red;"></div>
                <input type="hidden" id="user_hidden">

            </div>
            <div id="id-error">
                <label for="user" class="error" generated="true"></label>
            </div>
            <div class="input-field col s1">
                <label>
                    <input type="checkbox" id="showPassword" value="show" class=" btn red" />
                    <span value=""><i class="material-icons visi_on" style="display: none;">visibility</i><i class="material-icons visi_off" style="display: block;">visibility_off</i></span>
                </label>
            </div>
            <div class="input-field col s11">
                <label for="senha">Senha <span style="color: red">*</span></label>
                <input type="password" name="senha" id="senha">
                <div id="id-error">
                    <label for="senha" class="error" generated="true"></label>
                </div>

            </div>



            <div class="input-field col s12">
                <label for="conf_senha">Confirmar senha <span style="color: red">*</span></label>
                <input type="password" name="conf_senha" id="conf_senha">

            </div>
            <div id="id-error">
                <label for="conf_senha" class="error" generated="true"></label>
            </div>

            <div class="input-field col s12">
                <select class="browser-default" required name="tipo" id="tipo">
                    <option value="" disabled selected>Tipo de Usuário</option>
                    <option value="administrador">Administrador</option>
                    <option value="atendente">Atendente</option>
                    <option value="tecnico">Tecnico</option>
                </select>
            </div>
            <div id="id-error">
                <label for="tipo" class="error" generated="true"></label>
            </div>


           <input type="submit" value="Cadastrar" id="cadastrar_btn" class="btn red " name="cadastrar">

        </form>
    </div>
</div>

<?php


include '../includes/footer.php';
