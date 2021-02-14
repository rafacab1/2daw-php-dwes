<?php
/**
 * Generador de scripts de creación de usuarios para MySQL
 * 
 * @author Rafa Caballero
 */

 $alumnos = fopen($_FILES['file']['tmp_name'], "r"); // TODO: Controlar tipo de fichero
 $promocion = $_POST['promocion'];
 $curso = $_POST['curso'];
 $usus = array();

 function generaUser($nombre, array & $usus) {
    $nombre = quitarTildes($nombre);
    // Apellido 1 AAxxxx
    $a1 = strtolower(substr($nombre, 0, 2));
    // Apellido 2 xxAAxx
    $a2 = strtolower(substr($nombre, strpos($nombre, " ")+1, 2));
    // Nombre xxxxAA
    $n = strtolower(substr($nombre, strpos($nombre, ",")+2, 2));
    $u = $a1 . $a2 . $n;
    // TODO: Controlar repetidos, aún no funciona :(
    while (in_array($u, $usus)) {
        $u = $u . "1";
    }
    array_push($usus, $u);
    return $a1 . $a2 . $n;
 }

 /**
  * quitarTildes
  * https://www.macosas.com/archives/funcion-php-para-quitar-las-tildes-de-una-cadena/
  */
 function quitarTildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}

 if ($_POST['opt'] == "MySQL") {
     $mysql = true;
     $script = fopen("crearAlumnos.sql", "w");
 } elseif ($_POST['opt'] == "Oracle") {
     $oracle = true;
 } elseif ($_POST['opt'] == "Linux") {
     $linux = true;
     $script = fopen("crearAlumnos.sh", "w");
 } else {
     $error = true;
 }

 // Leo las 9 primeras líneas que no contienen alumnos
 for ($i=1;$i<9;$i++) {
    fgets($alumnos);
 }

 if (isset($mysql)) {
    $alumno = fgets($alumnos);
    do {
        $user = generaUser($alumno, $usus);
        fputs($script, "-- " . $alumno);
        fputs($script, "CREATE USER '" . $user . "'@'localhost' IDENTIFIED BY '" . $user . "';\n");
        fputs($script, "GRANT ALL PRIVILEGES ON " . $user . " . " . $user . " TO '" . $user . "'@'localhost';\n");
        fputs($script, "FLUSH PRIVILEGES;\n\n");
        $alumno = fgets($alumnos);
    } while ($alumno != null);
    echo "<a href=\"crearAlumnos.sql\">Descarga el script .SQL</a>";
 }

 if (isset($linux)) {
     fputs($script, "#!/bin/bash\n\n");
     $alumno = fgets($alumnos);
     do {
         $user = generaUser($alumno, $usus);
         fputs($script, "# " . $alumno);
         fputs($script, "groupadd " . $user . "\n");
         fputs($script, "useradd " . $user . " -m -d /home/" . $curso . $promocion . "/" . $user . " -s /bin/bash -g " . $user . " -p " . $user . "\n");
         fputs($script, "passwd --expire " . $user . "\n");
         fputs($script, "mkdir /home/" . $curso . $promocion . "/" . $user . "/public_html\n");
         fputs($script, "chown -R " . $user . " /home/" . $curso . $promocion . "/". $user . "/\n\n");
         $alumno = fgets($alumnos);
     } while ($alumno != null);
     echo "<a href=\"crearAlumnos.sh\">Descarga el script .sh</a>";
 }

?>