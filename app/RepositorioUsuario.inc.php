<?php

//Esta es la consulta de informacion a la BD
class repositoriousuario {

    //esta funcion es para el contar los usuarios
    public static function obtener_todos($conexion) {

        $usuarios = array();

        if (isset($conexion)) {
            try {

                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                                $fila['id_usuarios'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
                        );
                    }
                } else {
                    print'';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    //esta funcion es para agregar usuarios a la BD
    public static function insertar_usuario($conexion, $usuario) {
        //El driver PDO puede obtenerse un boleano para saber si la operacion se realiza con exito
        $usuario_insertado = false;
        if (isset($conexion)) {
            try {
                //$sql = "INSERT INTO blog.usuarios(fecha_registro, activo) VALUES( NOW(), 0)";
                $sql = "INSERT INTO blog.usuarios(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";
                //para php hay que pasar los datos por variables temporales, esto por seguridad
                $nombretemp = $usuario->obtener_nombre();
                $emailtemp = $usuario->Obtener_email();
                $passwordtemp = $usuario->Obtener_password();
                //nos aseguramos que la insercion es correcta con la variable sentencia con el metodo prepare que es el query de sql
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $emailtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':password', $passwordtemp, PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print " ERROR " . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    //esta funcion es para ver si hay dos usuarios con el mismo nombre
//    public static function nombre_existe($conexion, $nombre) {
//        //Creamos un boleano para la funcion, y lo iniciamos como verdadero
//        $nombre_existe = true;
//
//        if (isset($conexion)) {
//            try {
//                //Creamos el query SQL para llamar a todos los registros de la tabla usuarios, cuando el nombre sea igual
//                //al nombre que colocamos en el formulario
//                $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
//                //Creamos la sentencia para que prepare el sql
//                $sentencia = $conexion->prepare($sql);
//                //incertamos el parametro nombre con el metodo bindParam, para crear la variable $nombre con parametro PDO
//                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
//
//                $sentencia->execute();
//                //Creamos la variable resultado que es igual a la sentencia y con fetchall, recuperé todos los resultados
//                $resultado = $sentencia->fetchAll();
//                //ahora contamos el resultado, para que el if mantenga el nombre como falso si no hay registros
//                if (count($resultado)) {
//                    //si hay un registro se va a true el $nombre
//                    $nombre_existe = true;
//                    //si no hay un registro se va a false el $nombre
//                } else {
//                    $nombre_existe = false;
//                }
//            } catch (PDOException $ex) {
//                print ' Error en combrobacion de usuario repetido: '  . $ex->getMessage();
//            }
//        }
//        return $nombre_existe;
//    }


    public static function email_existe($conexion, $email) {
        $email_existe = true;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';
                $sql = "SELECT * FROM usuarios WHERE email = :email";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print ' Error en comprobacion de correo repetido: ' . $ex->getMessage();
            }
        }
        return $email_existe;
    }

    public static function obtener_usuario_por_email($conexion, $email) {
        $usuario = null;
        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';
                
                $sql = "SELECT * FROM usuarios WHERE email = :email";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia -> fetch();
                if (!empty($resultado)){
                    $usuario = new usuario($resultado['id_usuarios'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['password'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            return $usuario;
        }
    }

}
