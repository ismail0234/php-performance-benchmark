<?php 

include "benchmark.php";

$performance = new DBPerformance('dbname', 'localhost', 'dbusername', 'dbuserpassword');

$performance->insertBenchmark(5000);
$performance->selectBenchmark(5000);
$performance->updateBenchmark(5000);

$performance->drawBenchmark();
