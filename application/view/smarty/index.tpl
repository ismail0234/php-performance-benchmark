<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ismail Satilmis - https://github.com/ismail0234">
    <meta name="generator" content="Ismail Satilmis - https://github.com/ismail0234">
    <title>{$lang.index.phpbenchmark}</title>

	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	{include file="helper/head.tpl"}
</head>
<body>

    <header>
    	{include file="helper/header.tpl"}
	</header>

	<main role="main">
		
	  	<section class="jumbotron text-center">
		    <div class="container">
		      	<h1 class="jumbotron-heading">{$lang.index.phpbenchmark}</h1>
		      	<p class="lead text-muted">{$lang.index.informationdescription}</p>
		      	<p class="text-muted small">
		      		{$lang.index.benchmarkVersion} <span class="font-weight-middle">{$site.version}</span>
		      	</p>
		    </div>
	  	</section>

	  	<div class="bg-light">
		  	<div class="container">
		  	  	<div class="row">
			  		<div class="col-md-12">
						<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
					    	<div class="col-md-10">
						      	<h6 class="mb-0 text-white lh-100">{$lang.index.phpbenchmark}</h6>
						      	<small id="benchmarkDescriptionOne">{$lang.index.benchmarkDescriptionReady}</small>
						      	<small class="d-none" id="benchmarkDescriptionTwo">{$lang.index.benchmarkDescriptionCompleted}</small>
					    	</div>
					    	<div class="col-md-2">
					    		<button class="btn btn-block bg-transparent text-white border-white" id="startBenchmark">{$lang.index.benchmarkStart}</button>
					    	</div>
					  	</div>
			  		</div>
			  	</div>
		  	</div>
	  	</div>

	  	<div class="bg-light">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-md-12">
	
						<div class="my-3 p-3 bg-white rounded shadow-sm">

						    <h6 class="border-bottom border-gray pb-2 mb-0">
						    	<div class="float-left">
						    		<span id="benchmarkName"></span> {$lang.index.benchmark}
						    		<br>
  						    		<span class="text-muted small">
										{$lang.index.phpversion} <span class="font-weight-middle">{$phpversion}</span>,
										{$lang.index.mysqlversion}
										{if $mysqlversion == false}
											<span class="text-danger font-weight-middle">{$lang.index.notconnected}.</span>
										{else}
											<span class="text-success font-weight-middle">{$mysqlversion}</span>
										{/if}
  						    		</span>
						    	</div>
						    	<div class="float-right">
							    	<select class="form-control form-control-sm" id="benchmarkType">
							    		<option value="ALL" data-value="{$lang.index.all}">{$lang.index.all}</option>
							    		{foreach from=$benchmarkList item=benchmark key=key}
							    			<option value="{$key}" data-value="{$benchmark.name|escape}" {if $key == 'string'}selected{/if}>{$benchmark.name|escape} Benchmark - {$benchmark.data|count}</option>
							    		{/foreach}
							    	</select>
						    	</div>
						    	<div class="clearfix"></div>
						    </h6>

						    <div class="row" id="benchmarkContainer">
				    		</div>

						    <small class="d-block text-right mt-3 text-success">
						      	<a href="javascript:;">{$lang.index.showAll}</a>
						    </small>
						</div>

	  				</div>
	  			</div>
	  		</div>
	  	</div>

	</main>

	{include file="helper/footer.tpl"}

</body>
</html>
