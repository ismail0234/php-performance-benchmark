<?php 

include_once LIB_PATH . "Benchmark/Benchmark.php";

Class ConditionBenchmark extends Benchmark
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
     * Test data
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string 
     *
     */
    private $number = 5;

    /**
     *
     * Test data random number one
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string 
     *
     */
    private $randomNumberOne = 3;

    /**
     *
     *  Test data random number two
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string 
     *
     */
    private $randomNumberTwo = 9;

    /**
     *
     * Initialize String Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    public function __construct()
    {
        $this->methodList      = array('if', 'ifelse', 'ifelseif', 'switch');
        $this->number          = rand(1, 10);
        $this->randomNumberOne = rand(1, 10);
        $this->randomNumberTwo = rand(1, 10);
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

        if ($method == 'if' || $method == 'ALL') {
            $this->ifPerformance($time);
        }

        if ($method == 'ifelse' || $method == 'ALL') {
            $this->ifelsePerformance($time);
        }

        if ($method == 'ifelseif' || $method == 'ALL') {
            $this->ifelseifPerformance($time);
        }

        if ($method == 'switch' || $method == 'ALL') {
            $this->switchPerformance($time);
        }

        return $this->resultBenchmark();
    }

    /**
     *
     * İf Condition Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function ifPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            if ($this->randomNumberOne == $this->number) {

            }
            $this->addPerformanceList('if');
        }
        $this->finishPerformanceList('if');
    }

    /**
     *
     * İfElse Condition Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function ifelsePerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            if ($this->randomNumberOne == $this->number) {

            }else{

            }
            $this->addPerformanceList('ifelse');
        }
        $this->finishPerformanceList('ifelse');
    }

    /**
     *
     * İfElseİf Condition Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function ifelseifPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            if ($this->randomNumberOne == $this->number) {

            }else if($this->randomNumberTwo == $this->number){

            }else{

            }
            $this->addPerformanceList('ifelseif');
        }
        $this->finishPerformanceList('ifelseif');
    }

    /**
     *
     * Switch Condition Peformance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function switchPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();
            switch ($this->number) 
            {
                case $this->randomNumberOne:
                    
                break;
                case $this->randomNumberTwo:
                    
                break;
                default:
                
                break;
            }
            $this->addPerformanceList('switch');
        }
        $this->finishPerformanceList('switch');
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