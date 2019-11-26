<?php 

include_once LIB_PATH . "Benchmark/Benchmark.php";

Class MathBenchmark extends Benchmark
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
     * Test number
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string 
     *
     */
    private $number = 6666;

    /**
     *
     * Initialize String Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    public function __construct()
    {
        $this->methodList = array('abs', 'acos', 'asin', 'atan', 'bindec', 'floor', 'exp', 'sin', 'tan', 'pi', 'is_finite', 'is_nan', 'sqrt');
        $this->number     = rand(100, 1000);
    }

    /**
     *
     * Set Benchmark Data Number
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param string $text
     *
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
        foreach ($this->getMethodList($method) as $method) 
        {
            $this->setStartTime($time);
            $this->setCounter(1);       
            while ($this->getStartTime() - $this->nowMicroSecond() > 0)
            {
                $this->setInStartTime();
                call_user_func_array($method, array($this->number));
                $this->addPerformanceList($method);
            }

            $this->finishPerformanceList($method);
        }

        return $this->resultBenchmark();
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