<?php 

include "benchmark.php";

$performance = new DBPerformance('dbname', 'localhost', 'dbusername', 'dbuserpassword');
$performance->insertBenchmark();
$performance->selectBenchmark();
$performance->updateBenchmark();

$performance->drawBenchmark();
