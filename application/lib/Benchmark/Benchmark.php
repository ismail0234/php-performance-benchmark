<?php 

Class Benchmark
{

    private $performanceList = array();

    private $startTime;

    private $inStartTime;

    private $counter;

    public function nowMicroSecond()
    {
    	return microtime(1) * 1000;
    }

    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    public function getCounter()
    {
        return $this->counter;
    }

    public function addCounter($add)
    {
        $this->counter += $add;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setStartTime($time)
    {
        $this->startTime = (microtime(1) * 1000) + $time;
    }

    public function setInStartTime()
    {
        $this->inStartTime = microtime(1);
    }

    public function addPerformanceList($key)
    {
    	if (!isset($this->performanceList[$key])) {
    		$this->performanceList[$key] = array(
				'startTime' => $this->nowMicroSecond(),
				'endTime'   => $this->nowMicroSecond(),
				'tps'       => 0, 
				'ott'       => 0
    		);
    	}
        $this->performanceList[$key]['tps']++;
        $this->addCounter(1);
    }

    public function finishPerformanceList($key)
    {
    	$this->performanceList[$key]['endTime'] = $this->nowMicroSecond();
    }

    public function resultBenchmark()
    {

    	foreach ($this->performanceList as $key => $data) 
    	{
            $this->performanceList[$key]['tpsText'] = $this->getTPSFormat($data['tps']); 
            $this->performanceList[$key]['ott']     = $this->ottCalculateTime($data['endTime'] - $data['startTime'], $data['tps']); 
    	}

    	return $this->performanceList;
    }

    private function ottCalculateTime($sumTime, $totalTime)
    {

        $newTime = ($sumTime / 1000) / $totalTime;
        if ($newTime >= 0.001) 
        {
            return round($newTime * 1000, 2) . ' Milli Second';
        }
        else if ($newTime >= 0.000001) 
        {
            return round($newTime * 1000 * 1000, 2) . ' Micro Second';
        }

        return round($newTime * 1000 * 1000 * 1000, 2) . ' Nano Second';
    }

    private function getTPSFormat($tps)
    {
        return number_format($tps, 0, '', '.');
    }

}