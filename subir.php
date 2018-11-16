<?php
$ftp_server = "despachadorfedex.transpheric.com";
$ftp_usuario = "manifiesto@despachadorfedex.transpheric.com";
$ftp_pass = "vjvZ&Gn]fq5P";
$con_id = ftp_connect($ftp_server);
$lr = ftp_login($con_id, $ftp_usuario, $ftp_pass);
if ((!$con_id) || (!$lr)) {
    echo 'No se pudo conectar';
    exit;
} else {
    echo 'conectado correctamente';
    $temp = explode(".", $_FILES['archivo']['name']);
    $source_file = $_FILES['archivo']['tmp_name'];
    $destino = "/";
    $nombre = $_FILES['archivo']['name'];
    ftp_pasv($con_id, TRUE);
    $subio = ftp_put($con_id, $destino.$nombre, $source_file, FTP_BINARY);
    if ($subio){
        echo '<html>
    <head>
        <title>Manifiesto subido</title>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="10;url=http://despachadorfedex.transpheric.com/app/loadmanifest" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3><p>Redireccionando en 10 segundos para <a href="http://despachadorfedex.transpheric.com/app/loadmanifest">Cargar manifiesto</a> </p></h3>
    </body>
</html>
';
    } else {
        echo 'Error avisar a sistemas';
    }
}
?>
