<?php 

include_once LIB_PATH . "Benchmark/Benchmark.php";

Class DatabaseBenchmark extends Benchmark
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
     * Database Connection
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var Database Connection
     *
     */
    private $db;

    /**
     *
     * Benchmark Database Table Name
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @var string
     *
     */
    private $tableName = 'phpbenchmarkTable';

    /**
     *
     * Initialize String Benchmark
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    public function __construct()
    {
        $this->methodList = array('INSERT', 'SELECT', 'UPDATE', 'DELETE');
    }

    /**
     *
     * Connect to Database
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @return boolean 
     *
     */
    protected function connectDatabase()
    {
        try {
            $this->db = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USERNAME, DB_PASSWORD);
            $this->checkAndCreateTables();
            return true;
        } catch (PdoException $e) {
            return false;
        }
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

        if (!$this->connectDatabase()) {
            return false;
        }

        if ($method == 'INSERT' || $method == 'ALL') {
            $this->insertPerformance($time);
        }

        if ($method == 'SELECT' || $method == 'ALL') {
            $this->selectPerformance($time);
        }

        if ($method == 'UPDATE' || $method == 'ALL') {
            $this->updatePerformance($time);
        }

        if ($method == 'DELETE' || $method == 'ALL') {
            $this->deletePerformance($time);
        }

        return $this->resultBenchmark();
    }

    /**
     *
     * Database Insert Row Performance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function insertPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('INSERT INTO ' . $this->tableName . ' (name, surname, phone, number, gb) VALUES(?, ?, ?, ?, ?)');
            $prepare->execute(array('name' . $this->getCounter(), 'surname' . $this->getCounter(), 'phone' . $this->getCounter(), $this->getCounter(), $this->getCounter() * 2));

            $this->addPerformanceList('INSERT');
        }
        $this->finishPerformanceList('INSERT');
    }

    /**
     *
     * Database Select Row Performance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function selectPerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('SELECT * FROM ' . $this->tableName . ' WHERE id = ?');
            $prepare->execute(array($this->getCounter()));
            $prepare->fetchAll();

            $this->addPerformanceList('SELECT');
        }
        $this->finishPerformanceList('SELECT');
    }

    /**
     *
     * Database Update Row Performance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function updatePerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('UPDATE ' . $this->tableName . ' SET name = ?, surname = ?, phone = ?, number = ? WHERE id = ?');
            $prepare->execute(array($this->getCounter() . 'name', $this->getCounter() . 'surname', $this->getCounter() . 'phone', $this->getCounter(), $this->getCounter()));   

            $this->addPerformanceList('UPDATE');
        }
        $this->finishPerformanceList('UPDATE');
    }

    /**
     *
     * Database DELETE Row Performance
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @param int $time
     *
     */
    protected function deletePerformance($time)
    {
        $this->setStartTime($time);
        $this->setCounter(1);
        while ($this->getStartTime() - $this->nowMicroSecond() > 0)
        {
            $this->setInStartTime();

            $prepare = $this->db->prepare('DELETE FROM ' . $this->tableName . ' WHERE id = ?');
            $prepare->execute(array($this->getCounter()));

            $this->addPerformanceList('DELETE');
        }
        $this->finishPerformanceList('DELETE');
    }

    /**
     *
     * Database Table check and create
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     *
     */
    protected function checkAndCreateTables()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . $this->tableName. '` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
            `surname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
            `phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
            `number` int(11) NOT NULL,
            `gb` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';
        
        $this->db->query($sql);
    }

    /**
     *
     * Mysql Version
     *
     * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
     * @return string 
     *
     */
    public function getVersion()
    {
        if ($this->db === null) {
            if (!$this->connectDatabase()) {
                return false;
            }
        }

        $prepare = $this->db->prepare('SELECT VERSION()');
        $prepare->execute(array());
        
        $response = $prepare->fetch();
        if (isset($response[0])) {
            return $response[0];
        }

        return false;
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