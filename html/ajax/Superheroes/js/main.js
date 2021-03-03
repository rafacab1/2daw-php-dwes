/**
 * 
 * @author Rafa Caballero
 */

function resultados(str) {
    let resultados = document.getElementById("resultados");
    if (str.length == 0) {
        resultados.innerHTML="";
        return;
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                resultados.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getResultados.php?q=" + str, true);
        xmlhttp.send();
    }
}