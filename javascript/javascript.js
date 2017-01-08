/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* -------------------- CAPAS -------------------- */
var ver;
function mostrar(dato) {
    obj = document.getElementById("seccion" + dato);
    ver.style.display = 'none';
    obj.style.display = 'block';
    ver = obj;
}

/* -------------------- SESION DE USUARIO -------------------- */
function iniciar_sesion() { //Iniciar Sesión
    document.session.ncapa.value = '0';
    document.forms.session.submit();
}
function cerrar_sesion() { // Cerrar Sesión
    location.href = "../project/php/funciones.php?ncapa=1";
}

/* -------------------- USUARIOS -------------------- */
function add_user() { // Agregar Usuarios
    document.addusers.ncapa.value = '3';
    document.forms.addusers.submit();
}

function upddel_users(i) { // Ir a Formularios de Actualizar y Eliminar Servicios
    document.upddelusers.id_persona.value = i;
    document.upddelusers.ncapa.value = '30';
    document.forms.upddelusers.submit();
}

/* -------------------- PUBLICACIONES -------------------- */
function add_publicacion() { // Agregar Publicación
    document.publicaciones.ncapa.value = '154';
    document.forms.publicaciones.submit();
}
function upddel_publicacion(i) { // Ir a Formulario de Actualizar y Eliminar Publicaciones
    document.publicaciones2.id_publicacion.value = i;
    document.publicaciones2.ncapa.value = '254';
    document.forms.publicaciones2.submit();
}
function update_publicacion() { // Actualizar Publicación
    document.publicaciones3.ncapa.value = '254';
    document.publicaciones3.update.value = 1;
    document.forms.publicaciones3.submit();
}
function delete_publicacion() { // Eliminar Publicación
    var msg = confirm("¿Confirma que desea eliminar los datos?");
    if (msg) {
        document.publicaciones3.ncapa.value = '254';
        document.publicaciones3.delete.value = 1;
        document.forms.publicaciones3.submit();
    }
}
function update_foto() { // Actualizar Foto de Publicacion
    document.publicaciones3.ncapa.value = '254';
    document.publicaciones3.update_foto.value = 1;
    document.forms.publicaciones3.submit();
}
