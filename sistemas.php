<?php
include_once './php/conexion.php';
include './php/seguridad.php';
@$ncapa = $_REQUEST['ncapa'];
if ($ncapa == '') {
    $ci = "ver = document.getElementById('seccion3');"; //Registro de Empleados
    $c4 = 'style="display:none"'; //Registro de Usuarios
    $c5 = 'style="display:none"'; //Registro de Activos
    $c6 = 'style="display:none"'; //Inventario
} else {
    $ci = "ver = document.getElementById('seccion" . $ncapa . "');";
    if ($ncapa != 3) {
        $c3 = ' style="display:none"';
    }
    if ($ncapa != 4) {
        $c4 = ' style="display:none"';
    }
    if ($ncapa != 5) {
        $c5 = ' style="display:none"';
    }
    if ($ncapa != 6) {
        $c6 = ' style="display:none"';
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
                    <a href="#" onmouseup="mostrar(this.name)" name="3"><li>Empleados</li></a>
                    <a href="#" onmouseup="mostrar(this.name)" name="4"><li>Usuarios</li></a>
                    <a href="#" onmouseup="mostrar(this.name)" name="5"><li>Activos</li></a>
                    <a href="#" onmouseup="mostrar(this.name)" name="6"><li>Inventario</li></a>
                </ul>
            </nav>

            <section id="seccion3" <?php echo(@$c3); ?>>
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

            <section id="seccion4" <?php echo(@$c4); ?>>
                <form class="form_cuentas" method="post" action="files/functions.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend><h1>Registro de Cuentas</h1></legend>
                        No. de Empleado: <input type="number" name="no_empleado" min="0" max="99999" required><br>
                        Nombre: <input type="text" name="nombre" maxlength="25" required>
                        Apellido Paterno: <input type="text" name="apellido_paterno" maxlength="25" required>
                        Apellido Materno: <input type="text" name="apellido_materno" maxlength="25" required><br>
                        Tipo: <select>
                            <option value="1">PC/Laptop</option>
                            <option value="2">Opti-Risks</option>
                            <option value="3">Sicob</option>
                            <option value="4">Nuxiba</option>
                            <option value="5">Bluemessaging</option>
                            <option value="5">Correo Electronico</option>
                        </select>
                        Rol:<select>
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                            <option value="3">Supervisor</option>
                            <option value="3">Agente</option>
                        </select>
                        Usuario: <input type="text" name="usuario" maxlength="20" required>
                        Contraseña: <input type="password" name="contrasena" maxlength="10" required>
                        <div id="botones">
                            <button type="reset" name="btn_resetear" onclick="limpiar()">Limpiar</button>
                            <button type="button" name="btn_cancelar" onclick="cancelar()">Cancelar</button>
                            <button type="submit" name="btn_registrar" onclick="registrar()">Registrar</button>
                        </div>
                    </fieldset>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>"/>
                </form>
            </section>

            <section id="seccion5" <?php echo(@$c5); ?>>
                <form class="form_activos" method="post" action="files/functions.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend><h1>Registro de Activos</h1></legend>
                        Tipo: <select>
                            <option value="1">PC</option>
                            <option value="2">Laptop</option>
                            <option value="3">Impresoras</option>
                            <option value="3">No-Breaks</option>
                            <option value="3">Celulares</option>
                        </select><br>
                        Nombre del Equipo: <input type="text" name="usuario" maxlength="20" required><br>
                        Dirección IP: <input type="text" name="usuario" maxlength="20" required><br>
                        Sistema Operativo: <select>
                            <option value="1">Windows XP</option>
                            <option value="1">Windows 7</option>
                            <option value="1">Windows 8</option>
                            <option value="1">Windows 8.1</option>
                            <option value="1">Windows 10</option>
                        </select><br>
                        Software Adicional: <select>
                            <option value="1">Microsoft Office 2007</option>
                            <option value="1">Microsoft Office 2010</option>
                            <option value="1">Microsoft Office 2013</option>
                            <option value="1">Microsoft Office 2016</option>
                        </select><br>
                        Serial: <input type="text" name="serial" maxlength="25" required><br>
                        Modelo: <input type="text" name="modelo" maxlength="25" required><br>
                        Dirección MAC: <input type="text" name="mac" maxlength="20" required><br>
                        Observaciones: <textarea id="observaciones" name="observaciones" maxlength="100"></textarea><br>
                        Ubicación: <select>
                            <option value="1">Planta Baja</option>
                            <option value="1">Primer Piso</option>
                            <option value="1">Segundo Piso</option>
                            <option value="1">Tercer Piso</option>
                            <option value="1">Planta Alta</option>
                        </select>
                        <div id="botones">
                            <button type="reset" name="btn_resetear" onclick="limpiar()">Limpiar</button>
                            <button type="button" name="btn_cancelar" onclick="cancelar()">Cancelar</button>
                            <button type="submit" name="btn_registrar" onclick="registrar()">Registrar</button>
                        </div>
                    </fieldset>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>"/>
                </form>
            </section>


            <!-------------------- Menú: Publicaciones -------------------->
            <section id="seccion154" <?php echo(@$c154); ?>>
                <h1>Publicaciones</h1>
                <br>
                <form name="publicaciones" action="php/functions.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="Titulo del Articulo" required>
                    <br>
                    <input type="text" name="subtitle" placeholder="Subtitulo del Articulo" required>
                    <br>
                    <textarea name="description" value="" placeholder="Descripcion del Articulo..."></textarea>
                    <br>
                    Fecha de Publicación <input type="date" name="date_pub" required>
                    <br>
                    Cargar una Imagen: <input type="file" name="img" placeholder="" required>
                    <input type="text" name="name_img" placeholder="Titulo de la Imagen" required>
                    <br>
                    <button type="submit" name="create_button" onclick="add_publicacion()">Publicar</button>
                    <input type="hidden" name="ncapa" value="<?php echo $ncapa; ?>" </input>
                </form>
                <br>
                <form name="publicaciones2" method="post">
                    <table class="pub">
                        <tr>
                            <td width="30">Id</td>
                            <td>Articulo</td>
                            <td>Subtitulo</td>
                            <td width="100">Fecha de Pub.</td>
                        </tr>

                        <?php
                        $query_pub = mysqli_query($conn, "SELECT * FROM publicaciones");
                        while ($row = mysqli_fetch_array($query_pub)) {
                            $id_pub = $row['id_publicacion'];
                            $titulo = $row['titulo'];
                            $subtitulo = $row['subtitulo'];
                            $fecha_pub = $row['fecha_publicacion'];

                            echo '<tr>
                        <td><input type="button" name="idpublicacion" value="' . $row["id_publicacion"] . '" onclick="upddel_publicacion(this.value)"/></td>
                        <td>' . $titulo . '</td>
                        <td>' . $subtitulo . '</td>
                        <td>' . $fecha_pub . '</td>
                    </tr>';
                        }
                        ?>
                    </table>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>" </input>
                    <input type="hidden" name="id_publicacion" value="<?php echo @$id_publicacion; ?>" </input>
                </form>
            </section>

            <!-------------------- Menú: Actualizar y Eliminar Publicaciones -------------------->
            <section id="seccion254" <?php echo(@$c254); ?>>
                <?php
                @$ncapa = $_REQUEST['ncapa'];
                @$id_publicacion = $_REQUEST['id_publicacion'];

                $query_pub = mysqli_query($conn, "SELECT * FROM publicaciones WHERE id_publicacion='$id_publicacion'");
                while ($row = mysqli_fetch_array($query_mun)) {
                    $titulo = $row['titulo'];
                    $subtitulo = $row['subtitulo'];
                    $descripcion = $row['descripcion'];
                    $fecha_publicacion = $row['fecha_publicacion'];
                    $titulo_foto = $row['titulo_foto'];
                }
                ?>
                <h1>Modificacion y Eliminacion de Publicaciones</h1>
                <br>
                <form name="publicaciones3" action="php/functions.php" method="post" enctype="multipart/form-data">
                    <table width="100%">
                        <tr>
                            <td>ID</td>
                            <td><input type="number" name="id_publicacion" value="<?php echo @$id_publicacion ?>" required></td>
                        </tr>
                        <tr>
                            <td width="150">Titulo: </td>
                            <td><input type="text" name="title" value="<?php echo @$titulo ?>" placeholder="Titulo del Articulo" required></td>
                        </tr>
                        <tr>
                            <td>Subtitulo: </td>
                            <td><input type="text" name="subtitle" value="<?php echo @$subtitulo ?>" placeholder="Subtitulo del Articulo" required></td>
                        </tr>
                        <tr>
                            <td>Descripcion: </td>
                            <td><textarea name="description" placeholder="Descripcion del Articulo..."><?php echo @$descripcion ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Fecha de Publicación: </td>
                            <td><input type="date" name="date_pub" value="<?php echo @$fecha_publicacion ?>" required/></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                        <center>
                            <?php
                            echo '<figure>
                                    <img src="php/mostrar_foto.php?id_publicacion=' . $id_publicacion . '" alt="' . $id_publicacion . '" width="250" height="200"/>
                                </figure>';
                            ?>
                        </center>
                        </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="file" name="img" value="<?php echo ''; ?>"/>
                                <button type="button" name="update_button" onclick="update_foto()">Actualizar Foto</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiulo de la Imagen: </td>
                            <td><input type="text" name="name_img" placeholder="Titulo de la Imagen" value="<?php echo @$titulo_foto ?>" required></td>    
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button" name="update_button" onclick="update_publicacion()">Actualizar</button>
                                <button type="button" name="delete_button" onclick="delete_publicacion()">Eliminar</button>
                                <button><a href = "index2.php?ncapa=154" style = "text-decoration: none;">Cancelar</a></button>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="ncapa" value="<?php echo @$ncapa; ?>"/>
                    <input type="hidden" name="update" value="<?php echo @$update; ?>"/>
                    <input type="hidden" name="delete" value="<?php echo @$delete; ?>"/>
                    <input type="hidden" name="update_foto" value="<?php echo @$update_foto; ?>"/>
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

