<?php

// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-edit'])) :

    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $tec = mysqli_escape_string($connect, $_POST['tec']);
    $produto = mysqli_escape_string($connect, $_POST['produto']);
    $serie = mysqli_escape_string($connect, $_POST['serie']);
    $defeito = mysqli_escape_string($connect, $_POST['defeito']);
    $observacao = mysqli_escape_string($connect, $_POST['observacao']);
    //echo $_POST['cpf_edit'];




    $login = $_POST['cpf'];
    $sqll = "SELECT cpf FROM adicionar_cliente WHERE cpf = '$login'";

    $resultado = mysqli_query($connect, $sqll);



    if (mysqli_num_rows($resultado) == 1) {


        $nick = 1;
    } else {
        $nick = 0;

?><script>
            alert('Este CPF não está vinculado a nenhum cliente no sistema');
            window.location.href = "../../gerenciar_serviços";
        </script><?php

                }


                $id = mysqli_escape_string($connect, $_GET['id']);


                if ($nick == 1) {
                    $sql = "UPDATE adicionar_servico SET nome = '$nome',cpf = '$cpf',tecnico = '$tec', produto = '$produto', serie = '$serie', defeito='$defeito', observacao='$observacao'  WHERE id = '$id'";
                    $sqll = "SELECT * FROM adicionar_servico WHERE id = '$id'";
                    $resultado_situacao = mysqli_query($connect, $sqll);
                    $dados = mysqli_fetch_array($resultado_situacao);
                    

                    if (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 0) :
                        $_SESSION['mensagem'] = "Atualizado com sucesso!";
                    header('Location: ../../gerenciar_serviços');
                    elseif (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 2) :
                        $_SESSION['mensagem'] = "Erro ao atualizar";
                     header('Location: ../../gerenciar_serviços/servicos_validos.php');
                    endif;
                }
            endif;
