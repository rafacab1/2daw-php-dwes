<?php
/**
    *   Verbos irregulares en inglés.
    *
    *   @author Rafa Caballero
    */
$verbos = array(
    array("infinitivo"=>"arise", "pasado"=>"arose", "participio"=>"arisen", "español"=>"surgir"),
    array("infinitivo"=>"awake", "pasado"=>"awoke", "participio"=>"awoken", "español"=>"despertar(se)"),
    array("infinitivo"=>"bear", "pasado"=>"bore", "participio"=>"borne", "español"=>"soportar"),
    array("infinitivo"=>"beat", "pasado"=>"beat", "participio"=>"beaten", "español"=>"golpear"),
    array("infinitivo"=>"become", "pasado"=>"became", "participio"=>"become", "español"=>"convertirse en"),
    array("infinitivo"=>"begin", "pasado"=>"began", "participio"=>"begun", "español"=>"empezar"),
    array("infinitivo"=>"bend", "pasado"=>"bent", "participio"=>"bent", "español"=>"doblar(se)"),
    array("infinitivo"=>"bet", "pasado"=>"bet", "participio"=>"bet", "español"=>"apostar"),
    array("infinitivo"=>"bid", "pasado"=>"bid", "participio"=>"bid", "español"=>"pujar")
);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Irregular Verbs</title>
	<meta charset="UTF-8">
</head>
<body>
<h1>Irregular Verbs</h1>
<table border>
<tr><th>Infinitivo</th><th>Pasado</th><th>Participio</th><th>Traducción</th></tr>
<?php
foreach ($verbos as $verbo) {
    echo("<tr>");
    echo("<td>" . $verbo["infinitivo"] . "</td>");
    echo("<td>" . $verbo["pasado"] . "</td>");
    echo("<td>" . $verbo["participio"] . "</td>");
    echo("<td>" . $verbo["español"] . "</td>");
    echo("</tr>");
}
?>
</table>
</body>
</html>