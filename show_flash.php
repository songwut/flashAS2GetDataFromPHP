<? 
require "../view/pub/function.php";
$objConnect = mysql_connect("localhost","maengad55_water","maengadnaka") or die("Error Connect to Database"); 
$objDB = mysql_select_db("maengad55_water"); 
mysql_query("SET NAMES UTF8");
$strSQL = "SELECT * FROM water_db  ORDER BY `id` DESC LIMIT 0 , 1"; 
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
$objResult = mysql_fetch_array($objQuery);

$strSQL2 = "SELECT * FROM water_db  ORDER BY `id` DESC LIMIT 1 , 1"; 
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]"); 
$dbarr = mysql_fetch_array($objQuery2);

$CanalLeft_php = floatval($objResult["lmc"]);
$CanalRight_php = floatval($objResult["rmc"]);
$toElectric_php = floatval($objResult["electric"]);
$evaporate_php = floatval($objResult["evaporate"]);

$sumWaterOut = $CanalLeft_php + $CanalRight_php + $toElectric_php + $evaporate_php;
$today = dateconvert($objResult["wdate"]);
echo 
"dateToDay_php=".$today."&wateron_php=".$objResult["volume"]."&waterOld_php=".$dbarr["volume"]."&waterInput_php=".$objResult["w_in"]."&CanalLeft_php=".$objResult["lmc"]."&CanalRight_php=".$objResult["rmc"]."&toElectric_php=".$objResult["electric"]."&waterOutput_php=".$sumWaterOut;

mysql_close($objConnect); 
?> 
