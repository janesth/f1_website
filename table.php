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
$season = intval($_GET['season']);

$con = mysqli_connect('XYZ','XYZ','XYZ','XYZ');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"thomasj2_fone");
$sqlDrivers="SELECT drivers.name AS 'Name', drivers.driver_id AS 'ID' FROM races LEFT JOIN drivers ON races.driver_id = drivers.driver_id WHERE season_id =".$season." GROUP BY drivers.name ORDER BY races.race_id";
$sqlCountries="SELECT countries.name AS 'Country', countries.tag AS 'Tag', races.country_id AS 'ID' FROM races LEFT JOIN countries ON races.country_id = countries.country_id WHERE season_id =".$season." GROUP BY countries.name ORDER BY races.race_id";
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
  $sqlPoints="SELECT points AS 'Points' FROM races WHERE season_id=".$season." AND country_id=" . $rowCountries['ID'] . " ORDER BY races.race_id";
  $resultPoints = mysqli_query($con,$sqlPoints);
  while($rowPoints = mysqli_fetch_array($resultPoints)) {
    echo "<td>" . $rowPoints['Points'] . "</td>";
  }
  echo "</tr>";
}
echo "</tbody>";
echo "<tr><th scope='row' class='bg-primary'>Total</th>";
$resultDrivers = mysqli_query($con,$sqlDrivers);
while($rowDrivers = mysqli_fetch_array($resultDrivers)) {
  $sqlTotalPoints="SELECT SUM(races.points) AS 'Total' FROM races WHERE races.driver_id=" . $rowDrivers['ID'] . " AND races.season_id=".$season;
  $resultPoints = mysqli_query($con,$sqlTotalPoints);
  while($rowPoints = mysqli_fetch_array($resultPoints)) {
    echo "<td class='bg-primary'>" . $rowPoints['Total'] . "</td>";
  }
}
echo "</tr>";
echo "</table>";
?>
</body>
</html>
