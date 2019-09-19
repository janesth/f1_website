<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('XYZ','XYZ','XYZ','XYZ');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"thomasj2_fone");
$sqlDrivers="SELECT drivers.name AS 'Name' FROM races LEFT JOIN drivers ON races.driver_id = drivers.driver_id WHERE season_id =".$q." GROUP BY drivers.name";
$sqlCountries="SELECT countries.name AS 'Country', countries.tag AS 'Tag' FROM races LEFT JOIN countries ON races.country_id = countries.country_id WHERE season_id =".$q." GROUP BY countries.name";
$resultDrivers = mysqli_query($con,$sqlDrivers);
$resultCountries = mysqli_query($con,$sqlCountries);
echo "<table id='points' class='table table-dark table-hover'> <thead> <th scope='col'>#</th>";
while($rowDrivers = mysqli_fetch_array($resultDrivers)) {
  echo "<th scope='col'>". $rowDrivers['Name'] ."</th>";
}
echo "</thead><tbody>";
while($rowCountries = mysqli_fetch_array($resultCountries)) {
  echo "<tr>";
  echo "<th scope='row'>" . $rowCountries['Country'] . " <i class='" . $rowCountries['Tag'] . " flag' /></th>";
  echo "</tr>";
}
echo "</tbody></table>";

/*

$sql="SELECT drivers.name AS 'Name', countries.name AS 'Country', countries.tag AS 'Tag', teams.name, points AS 'Point' FROM races LEFT JOIN drivers ON races.driver_id = drivers.driver_id LEFT JOIN countries ON races.country_id = countries.country_id LEFT JOIN teams ON races.team_id = teams.team_id WHERE season_id =".$q;
$result = mysqli_query($con,$sql);
$rowCount = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$x = 0;
while($x <= $rowCount) {
  echo "<tr>";
  echo "<th scope='row'>" . $row[$x] . " <i class='" . $row[$x] . " flag' /></th>";
  echo "<td>" . $row[$x] . "</td>";
  $x = $x + 1;
  echo "<td>" . $row[$x] . "</td>";
  $x = $x + 1;
  echo "<td>" . $row[$x] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con); */
?>
</body>
</html>
