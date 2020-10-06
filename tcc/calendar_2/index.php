<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />


    <link href='./lib/main.css' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src='./lib/main.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {

                locale: 'pt-br',
                height: '100%',
                expandRows: true,
                slotMinTime: '00:00',
                slotMaxTime: '24:00',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
                //initialDate: '2020-06-12',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: 'list_eventos.php',
                extraParams: function() {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                },
                eventClick: function(info) {
                    $('.btn-delete').attr('href', 'delete.php?id=' + info.event.id)
                    info.jsEvent.preventDefault();

                    var start = info.event.start.toLocaleString()
                    starte = start.split(' ');
                    data_start = starte[0];
                    hora_start = starte[1];


                    data_start = data_start.split('/');
                    data_start = data_start[2] + '-' + data_start[1] + '-' + data_start[0];

                    start_result = data_start + 'T' + hora_start;

                    end = info.event.end.toLocaleString()
                    end = end.split(' ');
                    data_end = end[0];
                    hora_end = end[1];

                    data_end = data_end.split('/');
                    data_end = data_end[2] + '-' + data_end[1] + '-' + data_end[0];

                    end_result = data_end + 'T' + hora_end;




                    $('#visualizar #id').text(info.event.id);
                    $('#visualizar #id').val(info.event.id);
                    $('#visualizar #title').text(info.event.title);
                    $('#visualizar #title').val(info.event.title);
                    $('#visualizar #start').text(info.event.start.toLocaleString());
                    $('#visualizar #end').text(info.event.end.toLocaleString());
                    $('#visualizar #start').val(start_result);
                    $('#visualizar #end').val(end_result);
                    $('#visualizar #color').val(info.event.backgroundColor);
                    $('#visualizar').modal('open');
                },
                selectable: true,
                select: function(info) {
                    var start = info.start.toLocaleString()
                    starte = start.split(' ');
                    data_start = starte[0];
                    hora_start = starte[1];


                    data_start = data_start.split('/');
                    data_start = data_start[2] + '-' + data_start[1] + '-' + data_start[0];

                    start_result = data_start + 'T' + hora_start;

                    end = info.end.toLocaleString()
                    end = end.split(' ');
                    data_end = end[0];
                    hora_end = end[1];

                    data_end = data_end.split('/');
                    data_end = data_end[2] + '-' + data_end[1] + '-' + data_end[0];

                    end_result = data_end + 'T' + hora_end;


                    $('#cadastrar #start').val(start_result);
                    $('#cadastrar #end').val(end_result);
                    $('#cadastrar').modal('open');

                }
            });

            calendar.render();
        });

        $(document).ready(function() {
            $('#addevent').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "cadastrar_action.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(retorna) {
                        if (retorna['sit']) {
                            //$("#msg-cad").html(M.toast({ 'success' }));
                            location.reload();

                        } else {
                            $("#msg-cad").html(M.toast({
                                html: retorna['msg']
                            }));
                        }
                    }
                })
            });

            $('.btn-canc-vis').on('click', function() {
                $('.visevent').slideToggle();
                $('.formedit').slideToggle();
            });

            $('.btn-canc-edit').on('click', function() {
                $('.formedit').slideToggle();
                $('.visevent').slideToggle();
            });

            $('#editevent').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "editar_action.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(retorna) {
                        if (retorna['sit']) {
                            //$("#msg-cad").html(M.toast({ 'success' }));
                            location.reload();

                        } else {
                            $("#msg-cad").html(M.toast({
                                html: retorna['msg']
                            }));
                        }
                    }
                })
            });

            $('.menu-departamento > ul').hide();

            $('.menu-departamento .lista').click(function() {
                $(this).next().toggle('slow, 1000');
            });

            $('.sidenav').sidenav();
        });
    </script>
    <style>
        html,
        body {
            overflow: hidden;
            /* don't do scrollbars */
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar-container {
            position: absolute;
            top: 5%;
            left: 0;
            right: 0;
            bottom: 0;
            max-width: 1100px;
            margin: 40px auto;
        }

        .fc-header-toolbar {
            /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
            padding-top: 80px; /* Estava em 1em */
            padding-left: 1em;
            padding-right: 1em;
        }

        a {
            color: black;
        }
    </style>
</head>

<body>



    <nav>
        <div class="nav-wrapper" style="background-color: #424242;">
            <ul>
                <li><a href="../menu/menu.php">Home</a></li>
                <div class="menu-departamento" style="color: white;">
                    <li class="lista"><a class='' href='#'> Clientes</a></li>
                    <ul>
                        <li><a href="#!">Cadastrar Clientes</a></li>
                        <li><a href="../gerenciar_cliente">Gerenciar clientes</a></li>
                    </ul>
                    <li class="lista"><a class='' href='#'> Serviços</a></li>
                    <ul>
                        <li><a href="../gerenciar_serviços/textselect.php">Cadastrar Serviço</a></li>
                        <li><a href="../gerenciar_serviços/index.php">Serviços em análise</a></li>
                        <li><a href="../gerenciar_serviços/servicos_validos.php">Serviços aprovados</a></li>
                        <li><a href="../gerenciar_serviços/servicos_fechados_concluidos.php">Serviços concluidos</a></li>
                        <li><a href="../gerenciar_serviços/servicos_fechados_cancelados.php">Serviços cancelados</a></li>
                    </ul>
                    <li class="lista"><a href="#">Usuários</a></li>
                    <ul>
                        <li><a href="../usuarios/cadastro_tela.php">Cadastrar</a></li>
                        <li><a href="../usuarios/visualizar_usuarios.php">Gerenciar</a></li>
                    </ul>

                </div>

                <li><a href="../calendar_2/index.php">Agenda</a></li>
               

            </ul>
    </nav>
    <section style="background-color: #333333;">
  <div class="center">
    <div  style="font-size: 50px; color: white; font-family: Times, 'Times New Roman', Georgia, serif;">JobManager</div>
  </div>
</section>

    <?php if (isset($_SESSION['msg'])) {
        echo "<script>M.toast({html: '$_SESSION[msg]'});</script>";
    }

    unset($_SESSION['msg']);
    ?>

    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>


    <!-- Modal Structure -->
    <div id="visualizar" class="modal">
        <div class="visevent" style="display: block;">
            <div class="modal-content">
                <table>

                    <tr>
                        <td>ID:</td>
                        <td id="id"></td>
                    </tr>

                    <tr>
                        <td>Evento:</td>
                        <td id="title"></td>
                    </tr>


                    <tr>
                        <td>Início:</td>
                        <td id="start"></td>
                    </tr>


                    <tr>
                        <td>Termino:</td>
                        <td id="end"></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <a href="#!" class="btn-canc-vis waves-effect waves-green btn green">Editar</a>
                <a href="#!" class="btn-delete waves-effect red waves-green btn">Excluir</a>

            </div>
        </div>
        <div class="formedit" style="display: none;">
            <div class="modal-content">
                <form action="" method="POST" id="editevent">

                    Evento:<input type="text" name="title" id="title">


                    Começo do Evento <input type="datetime-local" id="start" value="" name="start">


                    Final do Evento<input type="datetime-local" name="end" id="end">

                    <select name="color" class="browser-default" id="color">
                        <option value="" disabled selected>Etiqueta</option>
                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                        <option style="color:#228B22;" value="#228B22">Verde</option>
                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                    </select>

                    <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <input type="submit" value="Alterar" class="btn" name="CadEvent" id="CadEvent">
                <a href="#!" class="btn-canc-edit waves-effect waves-green btn-flat">Cancelar</a>
            </div>
        </div>


        </form>
    </div>
    </div>

    <!-- Modal Structure -->
    <div id="cadastrar" class="modal">
        <div class="modal-content">
            <form action="" method="POST" id="addevent">

                Evento:<input type="text" name="title">


                Começo do Evento <input type="datetime-local" id="start" value="" name="start">


                Final do Evento<input type="datetime-local" name="end" id="end">
                <div class="input-field col s12">
                    <select name="color" class="browser-default" id="color">
                        <option value="" disabled selected>Etiqueta</option>
                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                        <option style="color:#228B22;" value="#228B22">Verde</option>
                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
            <input type="submit" value="Cadastrar" class="btn" name="CadEvent" id="CadEvent">
        </div>

        </form>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--JavaScript at end of body for optimized loading-->


    <script>
        M.AutoInit();
    </script>

</body>

</html>