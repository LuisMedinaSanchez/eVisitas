<?php
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'transpheric');

//pagina principal
define("SERVIDOR", "http://192.168.1.1:81");
define("RUTA_DASHBOARD", SERVIDOR."/dashboard/");
define("RUTA_LOGIN_CIERRE", SERVIDOR."/SesionCerrada");


define("RUTA_VISITAS", SERVIDOR."/visitas");
define("RUTA_VISITAS1", SERVIDOR."/visitas/nueva_visita");
define("RUTA_VISITAS2", SERVIDOR."/visitas/registro_manual");
define("REGISTRO_CORRECTO", SERVIDOR."/visitas/registro-correcto");
define("RUTA_REGISTRADAS", SERVIDOR."/visitas/registradas");
define("RUTA_HISTORICO", SERVIDOR."/visitas/historico");
define("RUTA_MODIFICAR", SERVIDOR."/visitas/modificar");
define("RUTA_BUSCAR_VISITA", SERVIDOR."/visitas/buscador_visitas");


define("RUTA_USUARIOS", SERVIDOR."/usuarios");
define("RUTA_REGISTRO_USUARIOS", SERVIDOR."/RegistroUsuarios");
define("RUTA_CAMBIOS", SERVIDOR."/cambio_correcto");

define("RUTA_SISTEMAS_CASA", SERVIDOR."/sistemas_casa");
define("RUTA_PREVIOS", SERVIDOR."/sistemas_casa/previos");
define("RUTA_REMESAS", SERVIDOR."/sistemas_casa/finanzas");
define("RUTA_CLIENTE_ESPEJO", SERVIDOR."/sistemas_casa/sistemas");