<?php

//Esta es la consulta de informacion a la BD
class repositoriousuario {

    //esta funcion es para el contar los usuarios
    public static function obtener_todos($conexion) {

        $visitas = array();

        if (isset($conexion)) {
            try {

                include_once 'visita.inc.php';

                $sql = "SELECT * FROM visitas";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $visitas[] = new Visita(
                                $fila['id_visitas'],$fila['fec_visita'],$fila['nom_visitas'],$fila['ide_oficial'],$fila['per_visita'],$fila['asunto'],$fila['hor_visita'],$fila['observaciones'],$fila['hor_atencion'],$fila['tip_visita'],$fila['num_gafete'],$fila['fot_visita'],$fila['fot_ide_visita'],$fila['hor_salida'],$fila['activo']
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

    //clase publica estatica, para insertar visitas en la BD
    public static function insertar_visita($conexion, $visita) {
        //El driver PDO puede obtenerse un boleano para saber si la operacion se realiza con exito
        $visita_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO blog.visitas(fec_visita,nom_visitas,ide_oficial,per_visita,asunto,hor_visita,observaciones,hor_atencion,tip_visita,num_gafete,fot_visita,fot_ide_visita,hor_salida,activo) VALUES(NOW(),:nom_visitas,:ide_oficial,:per_visita,:asunto,:hor_visita,:observaciones,:hor_atencion,:tip_visita,:num_gafete,:fot_visita,:fot_ide_visita,:hor_salida1)";
                //para php hay que pasar los datos por variables temporales, esto por seguridad
                $nom_visitatemp = $visita->obtener_nom_visita();
                $ide_oficialtemp = $visita->Obtener_ide_oficial();
                $per_visitatemp = $visita->Obtener_per_visita();
                $asuntotemp = $visita->obtener_asunto();
                $hor_visitatemp = $visita->obtener_hor_visita();
                $observacionestemp = $visita->obtener_observaciones();
                $hor_atenciontemp = $visita->obtener_hor_atencion();
                $tip_visitatemp = $visita->obtener_tip_visita();
                $num_gafetetemp = $visita->obtener_num_gafete();
                $fot_visitatemp = $visita->obtener_fot_visita();
                $fot_ide_visitatemp = $visita->obtener_fot_ide_visita();
                $hor_salidatemp = $visita->obtener_hor_salida();

                //nos aseguramos que la insercion es correcta con la variable sentencia con el metodo prepare que es el query de sql
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nom_visitas', $nom_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':ide_oficial', $ide_oficialtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':per_visita', $per_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':asunto', $asuntotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':hor_visita', $hor_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':observaciones', $observacionestemp, PDO::PARAM_STR);
                $sentencia->bindParam(':hor_atencion', $hor_atenciontemp, PDO::PARAM_STR);
                $sentencia->bindParam(':tip_visita', $tip_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':num_gafete', $num_gafetetemp, PDO::PARAM_STR);
                $sentencia->bindParam(':fot_visita', $fot_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':fot_ide_visita', $fot_ide_visitatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':hor_salida', $hor_salidatemp, PDO::PARAM_STR);

                $visita_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print " ERROR VISITA INSERTADA " . $ex->getMessage();
            }
        }
        return $visita_insertado;
    }

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
