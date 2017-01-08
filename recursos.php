<?php
include_once './php/conexion.php';
include './php/seguridad.php';
@$ncapa = $_REQUEST['ncapa'];
if ($ncapa == '') {
    $ci = "ver = document.getElementById('seccion2');"; //Registro de Empleados
} else {
    $ci = "ver = document.getElementById('seccion" . $ncapa . "');";
    if ($ncapa != 2) {
        $c2 = ' style="display:none"';
    }
}
?>

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
            <nav id="top_menu">
                <ul>
                    <li><a href="#"><?php echo $_SESSION["autentificado"]; ?></a></li>
                    <li><a href="javascript:cerrar_sesion()">Cerrar Sesi&oacute;n</a></li>
                </ul>
            </nav>
            <header id="cabecera">
                <h1>Consultores e Investigadores en Administración, S.C.</h1>
            </header>
            <nav id="menu">
                <ul>
                    <a href="#" onmouseup="mostrar(this.name)" name="2"><li>Empleados</li></a>
                </ul>
            </nav>

            <section id="seccion2" <?php echo(@$c2); ?>>
                <form class="form_empleado" method="post" action="files/functions.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend><h1>Registro de Empleados</h1></legend>
                        No. de Empleado: <input type="number" name="no_empleado" min="1" max="99999" required>
                        Fecha de Ingreso: <input type="date" name="fecha_ingreso" required>
                        RFC:<input type="text" name="rfc" maxlength="13"><br>
                        Área: <select>
                            <option value="1">Recursos Humanos</option>
                            <option value="2">Sistemas</option>
                            <option value="3">Investigación de Crédito</option>
                            <option value="4">Recuperacion de Cartera</option>
                        </select>
                        Puesto:<select>
                            <option value="1">Encargado de Sistemas</option>
                            <option value="2">Supervisor de Recuperacion de Cartera</option>
                        </select><br>
                        Nombre: <input type="text" name="nombre" maxlength="25" required>
                        Apellido Paterno: <input type="text" name="apellido_paterno" maxlength="25" required>
                        Apellido Materno: <input type="text" name="apellido_materno" maxlength="25" required><br>
                        F. de Nacimiento: <input type="date" name="fecha_nacimiento" required>
                        Sexo: <select>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                        Estado Civil: <select>
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="3">Divorciado</option>
                        </select><br>
                        Domicilio: <input id="domicilio" type="text" name="domicilio" maxlength="110" required><br>
                        Telefono: <input type="tel" name="telefono" maxlength="15">
                        E-Mail: <input type="email" name="email" maxlength="50">
                        <div id="botones">
                            <button type="reset" name="btn_resetear" onclick="limpiar()">Limpiar</button>
                            <button type="button" name="btn_cancelar" onclick="cancelar()">Cancelar</button>
                            <button type="submit" name="btn_registrar" onclick="registrar()">Registrar</button>
                        </div>
                    </fieldset>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>"/>
                </form>
            </section>

            <footer id="pie">
                Derechos Reservados &copy; 2017, Ing. Marco Antonio Santiago Hernández
            </footer>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>

