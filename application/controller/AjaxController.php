<?php 

Class AjaxController extends MainController
{

	public function benchmarkListAction()
	{

		$responseData = array();

		$benchmark = $this->input->post('benchmark');
		if ($benchmark == 'string' || $benchmark == 'ALL') {
			$this->loadLibrary('Benchmark', 'benchmark' , 'StringBenchmark');
			$responseData = array_merge($responseData, $this->benchmark->getMethodList("ALL"));
		}

		if ($benchmark == 'loop' || $benchmark == 'ALL') {
			$this->loadLibrary('Benchmark', 'benchmark' , 'LoopBenchmark');
			$responseData = array_merge($responseData, $this->benchmark->getMethodList("ALL"));
		}

		if ($benchmark == 'condition' || $benchmark == 'ALL') {
			$this->loadLibrary('Benchmark', 'benchmark' , 'ConditionBenchmark');
			$responseData = array_merge($responseData, $this->benchmark->getMethodList("ALL"));
		}
		
		if ($benchmark == 'math' || $benchmark == 'ALL') {
			$this->loadLibrary('Benchmark', 'benchmark' , 'MathBenchmark');
			$responseData = array_merge($responseData, $this->benchmark->getMethodList("ALL"));
		}
		
		if ($benchmark == 'database' || $benchmark == 'ALL') {
			$this->loadLibrary('Benchmark', 'benchmark' , 'DatabaseBenchmark');
			$responseData = array_merge($responseData, $this->benchmark->getMethodList("ALL"));
		}

		$this->utility->outputJson(array('error' => false, 'data' => $responseData));
	}

	public function benchmarkAction()
	{		

		$this->loadLibrary('Benchmark', 'stringbenchmark'	 , 'StringBenchmark');
		$this->loadLibrary('Benchmark', 'loopbenchmark'      , 'LoopBenchmark');
		$this->loadLibrary('Benchmark', 'conditionbenchmark' , 'ConditionBenchmark');
		$this->loadLibrary('Benchmark', 'mathbenchmark' 	 , 'MathBenchmark');
		$this->loadLibrary('Benchmark', 'databasebenchmark'  , 'DatabaseBenchmark');

		$job  = $this->input->post('job');
		$type = $this->input->post('type');

		if ($type == 'string' || ($type == 'ALL' && in_array($job, $this->stringbenchmark->getMethodList('ALL')))) {
			$this->utility->outputJson(array('error' => false, 'job' => $job, 'data' => $this->stringbenchmark->start(1000, $job)));
		}

		if ($type == 'loop' || ($type == 'ALL' && in_array($job, $this->loopbenchmark->getMethodList('ALL')))) {
			$this->utility->outputJson(array('error' => false, 'job' => $job, 'data' => $this->loopbenchmark->start(1000, $job)));
		}

		if ($type == 'condition' || ($type == 'ALL' && in_array($job, $this->conditionbenchmark->getMethodList('ALL')))) {
			$this->utility->outputJson(array('error' => false, 'job' => $job, 'data' => $this->conditionbenchmark->start(1000, $job)));
		}

		if ($type == 'math' || ($type == 'ALL' && in_array($job, $this->mathbenchmark->getMethodList('ALL')))) {
			$this->utility->outputJson(array('error' => false, 'job' => $job, 'data' => $this->mathbenchmark->start(1000, $job)));
		}

		if ($type == 'database' || ($type == 'ALL' && in_array($job, $this->databasebenchmark->getMethodList('ALL')))) {
			$responseData = $this->databasebenchmark->start(1000, $job);
			if ($responseData === false) {
				$this->utility->outputJson(array('error' => true,  'job' => $job, 'msg' => 'Lütfen veritabanı bağlantınızı kontrol edin.'));
			}else{
				$this->utility->outputJson(array('error' => false, 'job' => $job, 'data' => $responseData));
			}
		}

	}

}