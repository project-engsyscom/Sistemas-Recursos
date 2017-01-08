<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
@$ncapa = $_REQUEST['ncapa'];

/* -------------------- INICIAR SESION -------------------- */
if ($ncapa == 0) {
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];
    include '../php/conexion.php';
    $query_usuarios = "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";
    $result_qu = mysqli_query($conn, $query_usuarios);
    while ($row = mysqli_fetch_assoc($result_qu)) {
        $rol = $row["rol"];
    }
    if ($rol == 'Sistemas') {
        session_start();
        $_SESSION["autentificado"] = $usuario;
        header("location:../sistemas.php");
        exit();
    } else {
        if ($rol == 'Recursos') {
            session_start();
            $_SESSION["autentificado"] = $usuario;
            header("location:../recursos.php");
            exit();
        } else {
            $error = "Cuenta o Contraseña incorrectos";
            header("location:../index.php");
            exit();
        }
    }
}

/* .......... CLOSE SESSION .......... */
if ($ncapa == 1) {
    include '../php/seguridad.php';
    session_destroy();
    header("location:../index.php");
    exit();
}

/* .......... REGISTRO DE USUARIO.......... */
if ($ncapa == 3) {
    $curp = $_REQUEST['curp'];
    $name = $_REQUEST['name'];
    $paternal_lastname = $_REQUEST['paternal_lastname'];
    $maternal_lastname = $_REQUEST['maternal_lastname'];
    $birthdate = $_REQUEST['birthdate'];
    $sex = $_REQUEST['sex'];

    $account = $_REQUEST['account'];
    $psw = md5($_REQUEST['password1']);
    $email = $_REQUEST['email'];
    $id_rol = $_REQUEST['rol'];

    $consulta1 = "SELECT curp FROM personas WHERE curp='" . $curp . "'";
    include '../php/connection.php';
    $res1 = mysqli_query($conn, $consulta1);
    $nf1 = mysqli_num_rows($res1);

    $consulta2 = "SELECT email FROM usuarios WHERE email='" . $email . "'";
    $res2 = mysqli_query($conn, $consulta2);
    $nf2 = mysqli_num_rows($res2);

    if ($nf1 > 0 | $nf2 > 0) {
        $error = "La " . $curp . " ó " . $email . " ya existe con otra cuenta ";
        session_start();
        $_SESSION['error'] = $error;
        header("location:../index.php");
        exit();
    } else {
        $person = "INSERT INTO personas(curp,nombre,apellido_paterno,apellido_materno,fecha_nacimiento,sexo) VALUES('$curp','$name','$paternal_lastname','$maternal_lastname','$birthdate','$sex');";
        include '../php/connection.php';
        $ra = mysqli_query($conn, $person);

        $consulta3 = "SELECT * FROM personas;";
        $id_person = mysqli_insert_id($conn);

        $variable = "INSERT INTO usuarios(id_persona,cuenta,contrasenia,email) VALUES('$id_person','$account','$psw','$email');";
        $rb = mysqli_query($conn, $variable);

        $rc = mysqli_query($conn, "INSERT INTO usuarios_roles(id_persona, id_rol) VALUES('$id_person','$id_rol')");

        if (!$ra | !$rb | !$rc) {
            $error = "Error al guardar " . mysqli_error();
            session_start();
            $_SESSION['curp'] = $curp;
            $_SESSION['name'] = $name;
            $_SESSION['paternal_lastname'] = $paternal_lastname;
            $_SESSION['maternal_lastname'] = $maternal_lastname;
            $_SESSION['birthdate'] = $birthdate;
            $_SESSION['sex'] = $sex;
            $_SESSION['rol'] = $id_rol;
            header("location:../index.php?ncapa=$ncapa");
            exit();
        } else {
            header("location:../index.php");
            exit();
        }
    }
}





//Menú PUBLICACIONES: Agregar Publicaciones
if ($ncapa == 154) {
    include '../php/connection.php';
    $titulo = $_REQUEST['title'];
    $subtitulo = $_REQUEST['subtitle'];
    $fecha_pub = $_REQUEST['date_pub'];
    $descripcion = $_REQUEST['description'];
    $titulo_img = $_REQUEST['name_img'];
    $public = "INSERT INTO publicaciones(titulo,subtitulo,fecha_publicacion,descripcion,fotografia,titulo_foto) "
            . "VALUES ('$titulo','$subtitulo','$fecha_pub','$descripcion','$titulo_img');";
    $rs_pub = mysqli_query($conn, $public);
    if (!$rs_pub) {
        $error = "Error al guardar " . mysqli_error();
        session_start();
        $_SESSION['titulo'] = $titulo;
        $_SESSION['subtitulo'] = $subtitulo;
        $_SESSION['fecha_publicacion'] = $fecha_pub;
        $_SESSION['descripcion'] = $descripcion;
        $_SESSION['titulo_foto'] = $titulo_img;
        header("location:../index2.php?ncapa=154");
        exit();
    } else {
        header("location:../index2.php?ncapa=154");
        exit();
    }
}

if ($ncapa == 254) {
    include '../php/connection.php';
    $update = $_REQUEST['update'];
    $delete = $_REQUEST['delete'];
    if ($update == 1) {
        $id_publicacion = $_REQUEST['id_publicacion'];
        $titulo = $_REQUEST['title'];
        $subtitulo = $_REQUEST['subtitle'];
        $fecha_pub = $_REQUEST['date_pub'];
        $descripcion = $_REQUEST['description'];
        $titulo_img = $_REQUEST['name_img'];
        $public = mysqli_query($conn, "UPDATE publicaciones SET "
                . "titulo='$titulo',"
                . "subtitulo='$subtitulo',"
                . "fecha_publicacion='$fecha_pub',"
                . "descripcion='$descripcion',"
                . "titulo_foto='$titulo_img' WHERE id_publicacion='$id_publicacion'");
        if (!$public) {
            $error = "Error al guardar " . mysqli_error();
            session_start();
            $_SESSION['titulo'] = $titulo;
            $_SESSION['subtitulo'] = $subtitulo;
            $_SESSION['fecha_publicacion'] = $fecha_pub;
            $_SESSION['descripcion'] = $descripcion;
            $_SESSION['titulo_foto'] = $titulo_img;
            header("location:../index2.php?ncapa=254");
            exit();
        } else {
            header("location:../index2.php?ncapa=154");
            exit();
        }
    }
    if ($delete == 2) {
        $id_publicacion = $_REQUEST['id_publicacion'];
        include '../php/connection.php';
        $query_del1 = "DELETE FROM publicaciones WHERE id_publicacion='$id_publicacion'";
        $rs1 = mysqli_query($conn, $query_del1);
        if (!$rs1) {
            $error = "Error al eliminar el registro" . mysqli_error();
            session_start();
            $_SESSION['id_publicacion'] = $id_publicacion;
            header("location:../index2.php?ncapa=254");
            exit();
        } else {
            header("location:../index2.php?ncapa=154");
            exit();
        }
    }
}
