<?
if (php_sapi_name() != 'cli') die();

set_time_limit(0);

include "config.php";

// Connect DB Infile Mode
$db = new PDO('mysql:host='.$dbconf['mysql_host'].';dbname='.$dbconf['mysql_db'],
		$dbconf['mysql_user'], $dbconf['mysql_password'],
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

// Get & Put files

$time = time();
mkdir($time);

foreach ($comms as $name => $comm) {
	$f = "demos_{$name}.txt";
	
	if(file_exists($f))
		copy($f, $time.'/'.$f);

	echo " get {$comm}\n";
	$c = @file_get_contents($comm);

	echo " put {$f}\n\n";
	@file_put_contents($f, $c);
}

//Create SQL file

echo " create sql...";
$out = "DELETE FROM `kz_records`;\nALTER TABLE `kz_records` AUTO_INCREMENT=0;\n";

foreach ($comms as $name => $val) {
    $f = "demos_{$name}.txt";
	$c = @file_get_contents($f);

	$maps = explode("\n", $c);
	array_shift($maps);

	$sql = "INSERT INTO `kz_records` (`map`, `mappath`, `time`, `player`, `country`, `comm`) VALUES \n";
    foreach ($maps as $map) {
		$line = explode(" ", $map);
		if(empty($line[0])) continue;

		$mappath_start = strpos($line[0], "[");
		$mappath_end = strpos($line[0], "]");
		$map = $mappath_start !== false ? substr($line[0], 0, $mappath_start) : $line[0];
		$mappath = substr($line[0], $mappath_start, $mappath_end);
		$time = $line[1] == 0 ? 'NULL' : $line[1];
		$player = $line[2];
		$country = empty($line[3]) ? $name : $line[3];
		$comm = $name;

		$sql .= "('{$map}','{$mappath}',{$time},'{$player}','{$country}','{$comm}'),\n";

	}
	
	$out .= substr($sql, 0, -2).";\n\n";

}

@file_put_contents("add_records.sql", $out);
echo "OK";