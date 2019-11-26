<?php 

include_once LIB_PATH . "Benchmark/Benchmark.php";

Class LoopBenchmark extends Benchmark
{

    /**
     *
     * String Method List
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var array 
     *
     */
    private $methodList;

    /**
     *
     * Loop in data
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var array
     *
     */
    private $data = array(1, "text", 0.22, true);

    /**
     *
     * Loop in data Count
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var int
     *
     */
    private $dataCount = 0;

    /**
     *
     * Initialize String Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    public function __construct()
    {
        $this->methodList = array('for', 'while', 'dowhile', 'foreach');
        $this->dataCount  = count($this->data);
    }

    /**
     *
     * Start Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    public function start($time = 1000, $method = 'ALL')
    {

        if ($method == 'for' || $method == 'ALL') {
            $this->forPerformance($time);
        }

        if ($method == 'while' || $method == 'ALL') {
            $this->whilePerformance($time);
        }

        if ($method == 'dowhile' || $method == 'ALL') {
            $this->dowhilePerformance($time);
        }

        if ($method == 'foreach' || $method == 'ALL') {
            $this->foreachPerformance($time);
        }

        return $this->resultBenchmark();
    }

    /**
     *
     * For Loop Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function forPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            for($i = 0; $i < $this->dataCount; $i++){
                $this->dataCount[$i];
            }
            $this->addPerformanceList('for');
        }
        $this->finishPerformanceList('for');
    }

    /**
     *
     * While Loop Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function whilePerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            $i = 0;
            while ($i < $this->dataCount) {
                $this->dataCount[$i++];
            }
            $this->addPerformanceList('while');
        }
        $this->finishPerformanceList('while');
    }

    /**
     *
     * doWhile Loop Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function dowhilePerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            $i = 0;
            do {
                $this->dataCount[$i++];
            } while ($i < $this->dataCount);
            $this->addPerformanceList('dowhile');
        }
        $this->finishPerformanceList('dowhile');
    }

    /**
     *
     * Foreach Loop Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function foreachPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0) 
        {
            $this->setInStartTime();
            foreach ($this->data as $key => $value) {
                $value;
            }
            $this->addPerformanceList('foreach');
        }
        $this->finishPerformanceList('foreach');
    }

    /**
     *
     * All Method List
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param string $method 
     * @return array 
     *
     */
    public function getMethodList($method)
    {
        if ($method == 'ALL') {
            return $this->methodList;
        }

        if (in_array($method, $this->methodList)) {
            return array($this->methodList[array_search($method, $this->methodList)]);
        }

        return array();
    }

}