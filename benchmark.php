<?php

Class DBPerformance
{

    private $performanceList = array();

    private $startTime;

    private $inStartTime;

    private $counter;

    private $db;

    public function __construct($dbname, $host, $username, $password = '')
    {
        $this->db = new PDO('mysql:dbname=' . $dbname . ';host=' . $host, $username, $password);
    }

    public function insertBenchmark($time = 5000)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        
        while ($this->startTime - (microtime(1) * 1000) > 0) 
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('INSERT INTO members (name, number, gb) VALUES(?, ?, ?)');
            $prepare->execute(array('name' . $this->getCounter(), $this->getCounter(), $this->getCounter() * 2));

            $this->addPerformanceList('INSERT');
        }
    }

    public function selectBenchmark($time = 5000)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        
        while ($this->startTime - (microtime(1) * 1000) > 0) 
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('SELECT * FROM members WHERE id = ?');
            $prepare->execute(array($this->getCounter()));
            $prepare->fetchAll();

            $this->addPerformanceList('SELECT');
        }
    }

    public function updateBenchmark($time = 5000)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        
        while ($this->startTime - (microtime(1) * 1000) > 0) 
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('UPDATE members SET name = ?, number = ? WHERE id = ?');
            $prepare->execute(array('name' . $this->getCounter(), $this->getCounter(), $this->getCounter()));   

            $this->addPerformanceList('UPDATE');
        }
    }

    public function drawBenchmark()
    {
        foreach ($this->performanceList as $benchmarkName => $benchmarkData) 
        {
            echo '<h4>' . $benchmarkName . '</h4>';
            foreach ($benchmarkData as $time => $times) 
            {
                $totalTime = count($times);
                $sumTime   = array_sum($times);
                echo date('d.m.Y H:i:s', $time) . ', &nbsp;&nbsp; Time: ' . number_format($sumTime , 25 , "." , "") . ', &nbsp;&nbsp; One Transaction Time: ' . $this->getRTime($sumTime, $totalTime) . ', &nbsp;&nbsp; TPS: '. $totalTime;
                echo '<br>';
            }
        }
    }

    private function setCounter($counter)
    {
        $this->counter = $counter;
    }

    private function getCounter()
    {
        return $this->counter;
    }

    private function addCounter($add)
    {
        $this->counter += $add;
    }

    private function setStartTime($time)
    {
        $this->startTime = (microtime(1) * 1000) + $time;
    }

    private function setInStartTime()
    {
        $this->inStartTime = microtime(1);
    }

    private function addPerformanceList($key)
    {
        $this->performanceList[$key][time()][] = microtime(1) - $this->inStartTime;
        $this->addCounter(1);
    }

    private function getRTime($sumTime, $totalTime)
    {
        $newTime = $sumTime / $totalTime;
        if ($newTime >= 0.001) {
            return round($newTime * 1000) . ' MiliSaniye';
        }

        return round($newTime * 1000 * 1000) . ' MikroSaniye';
    }

}
