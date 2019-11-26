<?php 

include_once LIB_PATH . "Benchmark/Benchmark.php";

Class StringBenchmark extends Benchmark
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
     * Test Text
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string 
     *
     */
    private $text = 'We are the king of the world!';

    /**
     *
     * Initialize String Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    public function __construct()
    {
        $this->methodList = array('addslashes', 'chunk_split', 'metaphone', 'strip_tags', 'md5', 'sha1', 'strtoupper', 'strtolower', 'strrev', 'strlen', 'soundex', 'ord');
    }

    /**
     *
     * Set Benchmark Text
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param string $text
     *
     */
    public function setText($text)
    {
        $this->text = $text;
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
                call_user_func_array($method, array($this->text));
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