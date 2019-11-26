<?php
/* Smarty version 3.1.30, created on 2019-11-26 15:36:43
  from "C:\xampp\htdocs\Diger\php-mysql-performance-benchmark\application\view\smarty\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ddd387b2bc424_58184398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fe21631c8dc6e291b6930a11a080dd54b9eeb80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Diger\\php-mysql-performance-benchmark\\application\\view\\smarty\\index.tpl',
      1 => 1574779002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helper/head.tpl' => 1,
    'file:helper/header.tpl' => 1,
    'file:helper/footer.tpl' => 1,
  ),
),false)) {
function content_5ddd387b2bc424_58184398 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ismail Satilmis - https://github.com/ismail0234">
    <meta name="generator" content="Ismail Satilmis - https://github.com/ismail0234">
    <title><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['phpbenchmark'];?>
</title>

	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php $_smarty_tpl->_subTemplateRender("file:helper/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>

    <header>
    	<?php $_smarty_tpl->_subTemplateRender("file:helper/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</header>

	<main role="main">
		
	  	<section class="jumbotron text-center">
		    <div class="container">
		      	<h1 class="jumbotron-heading"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['phpbenchmark'];?>
</h1>
		      	<p class="lead text-muted"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['informationdescription'];?>
</p>
		      	<p class="text-muted small">
		      		<?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkVersion'];?>
 <span class="font-weight-middle"><?php echo $_smarty_tpl->tpl_vars['site']->value['version'];?>
</span>
		      	</p>
		    </div>
	  	</section>

	  	<div class="bg-light">
		  	<div class="container">
		  	  	<div class="row">
			  		<div class="col-md-12">
						<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
					    	<div class="col-md-10">
						      	<h6 class="mb-0 text-white lh-100"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['phpbenchmark'];?>
</h6>
						      	<small id="benchmarkDescriptionOne"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkDescriptionReady'];?>
</small>
						      	<small class="d-none" id="benchmarkDescriptionTwo"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkDescriptionCompleted'];?>
</small>
					    	</div>
					    	<div class="col-md-2">
					    		<button class="btn btn-block bg-transparent text-white border-white" id="startBenchmark"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkStart'];?>
</button>
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
						    		<span id="benchmarkName"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['benchmark'];?>

						    		<br>
  						    		<span class="text-muted small">
										<?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['phpversion'];?>
 <span class="font-weight-middle"><?php echo $_smarty_tpl->tpl_vars['phpversion']->value;?>
</span>,
										<?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['mysqlversion'];?>

										<?php if ($_smarty_tpl->tpl_vars['mysqlversion']->value == false) {?>
											<span class="text-danger font-weight-middle"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['notconnected'];?>
.</span>
										<?php } else { ?>
											<span class="text-success font-weight-middle"><?php echo $_smarty_tpl->tpl_vars['mysqlversion']->value;?>
</span>
										<?php }?>
  						    		</span>
						    	</div>
						    	<div class="float-right">
							    	<select class="form-control form-control-sm" id="benchmarkType">
							    		<option value="ALL" data-value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['all'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['all'];?>
</option>
							    		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['benchmarkList']->value, 'benchmark', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['benchmark']->value) {
?>
							    			<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['benchmark']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value == 'string') {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['benchmark']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 Benchmark - <?php echo count($_smarty_tpl->tpl_vars['benchmark']->value['data']);?>
</option>
							    		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							    	</select>
						    	</div>
						    	<div class="clearfix"></div>
						    </h6>

						    <div class="row" id="benchmarkContainer">
				    		</div>

						    <small class="d-block text-right mt-3 text-success">
						      	<a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['showAll'];?>
</a>
						    </small>
						</div>

	  				</div>
	  			</div>
	  		</div>
	  	</div>

	</main>

	<?php $_smarty_tpl->_subTemplateRender("file:helper/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
</html>
<?php }
}
