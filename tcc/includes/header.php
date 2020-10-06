 <?php include '../includes/verificacao_login.php'; ?>
 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
   <meta charset="utf-8">
   <title> Sistema de cadastro de clientes</title>

   <link rel="stylesheet" href="../modo_noturno/style.css">
   <!--Import Google Icon Font-->
   <link href="../includes/icon.css" rel="stylesheet">
   <!--Import materialize.css-->

   <link rel="stylesheet" href="../includes/materialize.min.css">

   <link rel="stylesheet" href="../includes/style.css">

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <script src="../includes/materialize.min.js"></script>
   <script src="../includes/jquery-3.4.1.min.js"></script>
   <script src="../includes/javascript.js"></script>


 </head>
 <script>
   document.addEventListener('DOMContentLoaded', function() {
     var elems = document.querySelectorAll('.sidenav');
     var instances = M.Sidenav.init(elems, options);
   });

   // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
   // var collapsibleElem = document.querySelector('.collapsible');
   // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

   // Or with jQuery

   $(document).ready(function() {


     $('.menu-departamento > ul').hide();

     $('.menu-departamento .lista').click(function() {
       $(this).next().toggle('slow, 1000');
     });

     $('.sidenav').sidenav();
   });
 </script>

 <style>
   @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

   * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     list-style: none;
     text-decoration: none;
   }

   .wrapper {
     display: flex;
     position: relative;
   }

   .wrapper .sidebar {
     width: 200px;
     height: 100%;
     background: #212121;
     padding: 10px 0px;
     position: fixed;
   }

   .wrapper .sidebar h2 {
     color: #fff;
     text-transform: uppercase;
     text-align: center;
     margin-bottom: 30px;
   }

   .wrapper .sidebar ul li {
     padding: 8px;
     border-bottom: 1px solid #bdb8d7;
     border-bottom: 1px solid rgba(0, 0, 0, 0.05);
     border-top: 1px solid rgba(255, 255, 255, 0.05);
   }

   .wrapper .sidebar ul li a {
     color: #bdb8d7;
     display: block;
   }

   .wrapper .sidebar ul li a .fas {
     width: 25px;
   }

   .wrapper .sidebar ul li:hover {
     background-color: #424242;
   }

   .wrapper .sidebar ul li:hover a {
     color: #fff;
   }

   .wrapper .sidebar .social_media {
     position: absolute;
     bottom: 0;
     left: 50%;
     transform: translateX(-50%);
     display: flex;
   }

   .wrapper .sidebar .social_media a {
     display: block;
     width: 40px;
     background: #424242;
     height: 40px;
     line-height: 45px;
     text-align: center;
     margin: 0 5px;
     color: #bdb8d7;
     border-top-left-radius: 2px;
     border-top-right-radius: 2px;
   }

   .wrapper .main_content {
     width: 100%;
     margin-left: 200px;
   }

   .wrapper .main_content .header {
     padding: 20px;
     background: #fff;
     color: #717171;
     border-bottom: 1px solid #e0e4e8;
   }

   .wrapper .main_content .info {
     margin: 20px;
     color: #717171;
     line-height: 25px;
   }

   .wrapper .main_content .info div {
     margin-bottom: 20px;
   }
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


 <body>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

   <div class="wrapper">
     <div class="sidebar">
       <!-- <div class="center">
         <img class="circle" src="../img/Foto_face.png" width="150px" style=" max-height: 150px;">
       </div> -->



       <ul>
         <li><a href="../menu/menu.php"><i class="fas fa-home"></i>Home</a></li>
         <div class="menu-departamento" style="color: white;">
           <li class="lista"><a class=' fas fa-user' href='#'> Clientes</a></li>
           <ul>
             <li><a href="#!">Cadastrar Clientes</a></li>
             <li><a href="../gerenciar_cliente">Gerenciar clientes</a></li>
           </ul>
           <li class="lista"><a class=' fas fa-address-card' href='#'> Serviços</a></li>
           <ul>
             <li><a href="../gerenciar_serviços/textselect.php">Cadastrar Serviço</a></li>
             <li><a href="../gerenciar_serviços/index.php">Serviços em análise</a></li>
             <li><a href="../gerenciar_serviços/servicos_validos.php">Serviços aprovados</a></li>
             <li><a href="../gerenciar_serviços/servicos_fechados_concluidos.php">Serviços concluidos</a></li>
             <li><a href="../gerenciar_serviços/servicos_fechados_cancelados.php">Serviços cancelados</a></li>
           </ul>
           <li class="lista"><a href="#"><i class="fas fa-user"></i>Usuários</a></li>
           <ul>
             <li><a href="../usuarios/cadastro_tela.php">Cadastrar</a></li>
             <li><a href="../usuarios/visualizar_usuarios.php">Gerenciar</a></li>
           </ul>

         </div>

         <li><a href="../calendar_2/index.php"><i class="fas fa-calendar"></i>Agenda</a></li>
         <!-- <li><a href="#"><i class="fas fa-address-book"></i>Contact</a></li> -->
    
       </ul>
     </div>
     <div class="main_content">
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
       <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>