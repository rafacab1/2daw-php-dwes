<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Creación de usuarios</title>
</head>
<body>
    <h1>Creación de usuarios</h1>
    <form action="generarscript.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file"><br/>
        <select name="opt" id="opt">
            <option>Linux</option>
            <option>MySQL</option>
            <!--<option>Oracle</option>-->
        </select>
        <select name="curso" id="curso">
            <option value="1daw">1DAW</option>
            <option value="2daw">2DAW</option>
            <option value="1asir">1ASIR</option>
            <option value="2asir">2ASIR</option>
        </select>
        <select name="promocion" id="promocion">
            <option value="1920">19/20</option>
            <option value="2021" selected>20/21</option>
            <option value="2122">21/22</option>
            <option value="2223">22/23</option>
            <option value="2324">23/24</option>
            <option value="2425">24/25</option>
        </select> <br/><br/>
        <input type="submit" name="enviar" value="Generar script">
    </form>
</body>
</html>