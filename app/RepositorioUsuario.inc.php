<?php

//Esta es la consulta de informacion a la BD
class repositoriousuario {

    //esta funcion es para el contar los usuarios
    public static function obtener_todos($conexion) {

        $visitas = array();

        if (isset($conexion)) {
            try {

                include_once 'visita.php';

                $sql = "SELECT * FROM visitas WHERE activo = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $visitas[] = new Visita(
                                $fila['id_visitas'], $fila['fec_visita'], $fila['nom_visitas'], $fila['ide_oficial'], $fila['per_visita'], $fila['asunto'], $fila['observaciones'], $fila['hor_atencion'], $fila['tip_visita'], $fila['num_gafete'], $fila['fot_visita'], $fila['fot_ide_visita'], $fila['hor_salida'], $fila['activo']
                        );
                    }
                } else {
                    print'';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $visitas;
    }
        //esta funcion es para el contar los usuarios que no se ha terminado de registrar
    public static function obtener_falta_registro($conexion) {

        $visitas_falta = array();

        if (isset($conexion)) {
            try {

                include_once 'visita.php';

                $sql = "SELECT * FROM visitas WHERE ide_oficial IS NULL AND activo = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $visitas_falta[] = new Visita(
                                $fila['id_visitas'], $fila['fec_visita'], $fila['nom_visitas'], $fila['ide_oficial'], $fila['per_visita'], $fila['asunto'], $fila['observaciones'], $fila['hor_atencion'], $fila['tip_visita'], $fila['num_gafete'], $fila['fot_visita'], $fila['fot_ide_visita'], $fila['hor_salida'], $fila['activo']
                        );
                    }
                } else {
                    print'';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $visitas_falta;
    }
    //esta funcion es para agregar usuarios a la BD
    public static function insertar_usuario($conexion, $usuario) {
        //El driver PDO puede obtenerse un boleano para saber si la operacion se realiza con exito
        $usuario_insertado = false;
        if (isset($conexion)) {
            try {

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
    //Esta funcion es para contar todas las visitas
    public static function obtener_todos_historico($conexion) {

        $visitas_historico = array();

        if (isset($conexion)) {
            try {

                include_once 'visita.php';

                $sql = "SELECT * FROM visitas WHERE activo = 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $visitas_historico[] = new Visita(
                                $fila['id_visitas'], $fila['fec_visita'], $fila['nom_visitas'], $fila['ide_oficial'], $fila['per_visita'], $fila['asunto'], $fila['observaciones'], $fila['hor_atencion'], $fila['tip_visita'], $fila['num_gafete'], $fila['fot_visita'], $fila['fot_ide_visita'], $fila['hor_salida'], $fila['activo']
                        );
                    }
                } else {
                    print'';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $visitas_historico;
    }
    //esta funcion es para ver si al logearseel correo es correcto
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
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new usuario($resultado['id_usuarios'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'Error' . $ex->getMessage();
            }
            return $usuario;
        }
    }

}
