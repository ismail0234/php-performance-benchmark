<?php
/* Smarty version 3.1.30, created on 2019-11-26 20:08:40
  from "C:\xampp\htdocs\php-performance-benchmark\application\view\smarty\helper\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ddd783871c053_18035628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed28da3b4bc6b77fa7ae200a50a1ddc1320f2528' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php-performance-benchmark\\application\\view\\smarty\\helper\\header.tpl',
      1 => 1574795262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddd783871c053_18035628 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="collapse bg-dark" id="navbarHeader">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-7 py-4">
				<h4 class="text-white"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['information'];?>
</h4>
				<p class="text-muted"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['informationdescription'];?>
</p>
			</div>
			<div class="col-sm-4 offset-md-1 py-4">
				<h4 class="text-white"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['contact'];?>
</h4>
				<ul class="list-unstyled">
					<li><a href="https://github.com/ismail0234/php-performance-benchmark" class="text-white"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['github'];?>
</a></li>
					<li><a href="https://ismail0234.github.io/php-performance-benchmark/" class="text-white"><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['website'];?>
</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
	<div class="container d-flex justify-content-between">
		<a href="" class="navbar-brand d-flex align-items-center">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
			<strong><?php echo $_smarty_tpl->tpl_vars['lang']->value['index']['phpbenchmark'];?>
</strong>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</div><?php }
}
