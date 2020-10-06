
<?php

    #############################################PAGINACAO############################################




    //A quantidade de valor a ser exibida
    $quantidade = 10;
    //a pagina atual
    $pagina     = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
    //Calcula a pagina de qual valor será exibido
    $inicio     = ($quantidade * $pagina) - $quantidade;



    //SQL para saber o total


    $sqlTotal   = "SELECT id FROM adicionar_servico WHERE situacao_pedido = '$status_servico'";


    //Executa o SQL
    $qrTotal    = mysqli_query($connect, $sqlTotal) or die(mysqli_error($connect));
    //Total de Registro na tabela
    $numTotal   = mysqli_num_rows($qrTotal);
    //O calculo do Total de página ser exibido
    $totalPagina = ceil($numTotal / $quantidade);
    /**
     * Defini o valor máximo a ser exibida na página tanto para direita quando para esquerda
     */
    $exibir = 3;
    /**
     * Aqui montará o link que voltará uma pagina
     * Caso o valor seja zero, por padrão ficará o valor 1
     */
    $anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;
    /**
     * Aqui montará o link que ir para proxima pagina
     * Caso pagina +1 for maior ou igual ao total, ele terá o valor do total
     * caso contrario, ele pegar o valor da página + 1
     */
    $posterior = (($pagina + 1) >= $totalPagina) ? $totalPagina : $pagina + 1;
    /**
     * Agora monta o Link paar Primeira Página
     * Depois O link para voltar uma página
     */
    /**
     * Agora monta o Link para Próxima Página
     * Depois O link para Última Página
     */
    ?>
    <div id="navegacao" >
        <?php
        echo "<ul class='pagination '><li class='waves-effect' style='background-color: #fffff2 ;'><a href='?pagina=1' class='' >primeira</a></li>";
        echo "<li class='waves-effect' style='background-color: #fffff2;'><a href=\"?pagina=$anterior\" class='' ><i class='material-icons'>chevron_left</i></a></li>";
        ?>
        <?php
        /**
         * O loop para exibir os valores à esquerda
         */
        for ($i = $pagina - $exibir; $i <= $pagina - 1; $i++) {
            if ($i > 0)
                echo '<li class="waves-effect" style="background-color: #fffff2;"><a href="?pagina=' . $i . '"class="" > ' . $i . ' </a></li>';
        }

        echo '<li class="active blue"><a href="?pagina=' . $pagina . '"class="" ><strong>' . $pagina . '</strong></a></li>';

        for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
            if ($i <= $totalPagina)
                echo '<li class="waves-effect" style="background-color: #fffff2;"><a href="?pagina=' . $i . '"class="" style="background-color: #fffff2;"> ' . $i . ' </a></li>';
        }

        /**
         * Depois o link da página atual
         */
        /**
         * O loop para exibir os valores à direita
         */


        echo " <li class='waves-effect' style='background-color: #fffff2;'><a href=\"?pagina=$posterior\" class=''><i class='material-icons'>chevron_right</i></a></li> ";
        echo "  <li class='waves-effect' style='background-color: #fffff2;'><a href=\"?pagina=$totalPagina\" class=''>última</a></li></ul>";
        ?>


    </div>