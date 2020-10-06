<?php
// Conexão
require_once '../php_action/db_connect.php';

// Header
include_once '../includes/header.php';



?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

<script>
    $(document).ready(function() {


        $(".cpfe").select2({

        });
    });


    function escola(id) {

        //$('#nome').val(id);
        $(document).ready(function() {
            $.post('listar_usuario.php', {
                idEsc: id
            }, function(retorna) {
                //Subtitui o valor no seletor id="conteudo"
                dados = retorna.split("/");
                $("#nome").val(dados[0]);
                $("#telefone").val(dados[1]);
            });

        });

    }
</script>
<div class="col container s10">



    <form action="../php_action/cadastrar_serviço.php" method="POST" enctype="multipart/form-data">

        <div class="input-field col s6 m6 l6">
            <select name="cpf" id="cpf" class="cpfe" onchange="escola(this.value)">
                <option value="">CPF</option>
                <?php
                $result_niveis_acessos = "SELECT * FROM adicionar_cliente";
                $result_niveis_acessos = mysqli_query($connect, $result_niveis_acessos);
                while ($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)) { ?>
                    <option value="<?php echo $row_niveis_acessos['cpf']; ?>"><?php echo $row_niveis_acessos['cpf']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="input-field col s12">
            Nome do Cliente<input type="text" name="nome" id="nome">

        </div>

        <div class="input-field col s12">
            Celular<input type="text" name="telefone" id="telefone">

        </div>

        <div class="input-field col s12">
            <input type="text" name="tec" id="tec">
            <label for="tec">Técnico</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="produto" id="produto">
            <label for="produto">Produto</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="serie" id="serie">
            <label for="serie">N° Série</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="defeito" id="defeito">
            <label for="defeito">Defeito</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="observacao" id="observacao">
            <label for="observacao">Observações</label>
        </div>

        <div class="input-field col s12">
            <input type="file" name="imagem" id="imagem">
        </div>

        <button type="submit" name="btn-add" class="btn red">CADASTRAR</button>

        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

    </form>
</div>