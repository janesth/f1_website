function changeTable() {
  var points = document.getElementById("points");
  var teams = document.getElementById("teams");
  var button = document.getElementById("button");
  if(points.className == "d-none") {
    points.className = "table table-dark table-hover";
    teams.className = "d-none";
    button.value = "Change to Team View";
  } else if(teams.className == "d-none") {
    teams.className = "table table-dark table-hover";
    points.className = "d-none";
    button.value = "Change to Point View";
  }
}
function loadTable(x) {
  if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("tablePlaceholder").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET","table.php?season="+x,true);
      xmlhttp.send();
}
