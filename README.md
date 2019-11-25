# Mysql Benchmark


````php
include "benchmark.php";

$performance = new DBPerformance('dbname', 'localhost', 'dbusername', 'dbuserpassword');

// time, 5000 milisecond => 5 second
$performance->insertBenchmark(5000);

// time, 5000 milisecond => 5 second
$performance->selectBenchmark(5000);

// time, 5000 milisecond => 5 second
$performance->updateBenchmark(5000);

$performance->drawBenchmark();
````
