<?php 

Class IndexController extends MainController
{

	public function indexAction()
	{

		$this->loadLibrary('Benchmark', 'stringbenchmark'	 , 'StringBenchmark');
		$this->loadLibrary('Benchmark', 'loopbenchmark'      , 'LoopBenchmark');
		$this->loadLibrary('Benchmark', 'conditionbenchmark' , 'ConditionBenchmark');
		$this->loadLibrary('Benchmark', 'mathbenchmark' 	 , 'MathBenchmark');
		$this->loadLibrary('Benchmark', 'databasebenchmark'  , 'DatabaseBenchmark');

		$this->loadLanguage('index');

		$this->view->assign(array(
			'phpversion'    => $this->utility->phpVersion(),
			'mysqlversion'  => $this->databasebenchmark->getVersion(),
			'benchmarkList' => array(
				'string' => array(
					'name' => $this->lang->index['benchmarkString'],
					'data' => $this->stringbenchmark->getMethodList("ALL")
				),
				'loop' => array(
					'name' => $this->lang->index['benchmarkLoops'],
					'data' => $this->loopbenchmark->getMethodList("ALL")
				),
				'condition' => array(
					'name' => $this->lang->index['benchmarkConditions'],
					'data' => $this->conditionbenchmark->getMethodList("ALL")
				),
				'math' => array(
					'name' => $this->lang->index['benchmarkMath'],
					'data' => $this->mathbenchmark->getMethodList("ALL")
				),
				'database' => array(
					'name' => $this->lang->index['benchmarkDatabasae'],
					'data' => $this->databasebenchmark->getMethodList("ALL")
				)
			)
		));

		$this->view->display('index.tpl');

	}

}