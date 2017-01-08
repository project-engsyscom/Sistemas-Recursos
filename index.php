<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CIA S.C.</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/javascript.js" type="text/javascript"></script>
    </head>
    <body onload="<?php echo ($ci); ?>">
        <div id="agrupar">
            <header id="cabecera">
                <h1>Consultores e Investigadores en Administración, S.C.</h1>
            </header>
            <div id="seccion0" <?php echo(@$c0); ?>>
                <form class="form_inicio" method="post" action="php/funciones.php" enctype="multipart/form-data">
                    <h1>Inicio de Sesión</h1>
                    <input type="text" name="usuario" placeholder="Usuario" required>
                    <input type="password" name="contrasena" placeholder="Contrasena" required>
                    <button type="submit" name="btn_iniciar" onclick="iniciar_sesion()">Iniciar Sesión</button>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>"/>
                </form>
            </div>
            <footer id="pie">
                Derechos Reservados &copy; 2017, Ing. Marco Antonio Santiago Hernández
            </footer>
        </div>
    </body>
</html>
