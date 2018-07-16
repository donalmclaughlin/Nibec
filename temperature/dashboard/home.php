<?php
$db = mysqli_init();
mysqli_ssl_set($db,NULL,NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ; 
mysqli_real_connect($db, 'database1.cilnxsic6nbr.eu-west-1.rds.amazonaws.com', 'Nibec2018', 'Nibec2018', 'Database1', 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
if (mysqli_connect_errno($db)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
//include("dbconnect.php");
//$db = mysqli_connect($_SERVER['database1.cilnxsic6nbr.eu-west-1.rds.amazonaws.com'], $_SERVER['Nibec2018'], $_SERVER['Nibec2018'], $_SERVER['Database1'], $_SERVER['3306']);
// if (mysqli_connect_errno($db)) {
//     die('Failed to connect to MySQL: '.mysqli_connect_error());
//     }
//$temperature = 0;
$getTempresults = mysqli_query($db, "SELECT temperature FROM Temperature WHERE temperature");
?>
<!DOCTYPE html>
<html>
<body>
<img = src='SafeWater/images/pass.gif'/>
<table>
<thead>
    <tr>
        <th style="text-align: center">Temperature</th>
    </tr>
    </thead>
<tbody>
<tr>
<?php
if (mysqli_num_rows($getTempresults) > 0) :
    while($row = mysqli_fetch_assoc($getTempresults)) : ?>
<td><?php echo $row['temperature'] ?></td>
</tr>
<?php endwhile;
else :
    echo "no results";
endif;
?>
</tbody>
</table>
</body>
</html>