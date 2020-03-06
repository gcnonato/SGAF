<?php
require("templates/Template.class.php");
?>
<html>
    <head>
        <title>SGAF</title>
        <meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="classes.css" />
        <link rel="stylesheet" type="text/css" href="templates/geral.css">        
        <script language="JavaScript" src="js/shortcut.js"></script>
        <script language="JavaScript" src="atalhos_teclado.js"></script>
        <script language="JavaScript" src="funcoes.js"></script>        
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>
        <script src="mascaras.js" type="text/javascript"></script>       
        <link href="js/_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/_scripts/jquery.click-calendario-1.0-min.js"></script>       
        <script type="text/javascript" src="js/_scripts/exemplo-calendario.js"></script>        
        <script type="text/javascript" src="js/jquery.price_format.1.5.js"></script>
        <script type="text/javascript" src="login_atualizarsessao.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>        
        <style >
            .relpagina  {
                font-family: Arial;
                font-size: 10pt;
                color: black;
                width: 800px;
                border: 1px transparent solid; 
            }

            .relcorpo  {
                padding:0px;	
            }
        </style>
      
    </head>
    <body>        
        <div class="relpagina">
            <?php
            include "controle/conexao.php";
            include "controle/conexao_tipo.php";
            include "funcoes.php";
            include "includes_dadosglobais.php";  
            ?>
            <div class="relcorpo">