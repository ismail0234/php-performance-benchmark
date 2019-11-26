<?php
/* Smarty version 3.1.30, created on 2019-11-26 20:08:40
  from "C:\xampp\htdocs\php-performance-benchmark\application\view\smarty\helper\head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ddd783864b214_57164489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f676ae27228d6b77ab03348148c84ac2507aeba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php-performance-benchmark\\application\\view\\smarty\\helper\\head.tpl',
      1 => 1574795262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helper/headstyle.tpl' => 1,
  ),
),false)) {
function content_5ddd783864b214_57164489 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:helper/headstyle.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
var system = new Object();
system.lang = new Object();
system.lang.index = new Object();
system.lang.index.benchmarkStartWarning = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkStartWarning'], ENT_QUOTES, 'UTF-8', true);?>
';
system.lang.index.benchmarkProcessing   = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkProcessing'], ENT_QUOTES, 'UTF-8', true);?>
';
system.lang.index.benchmarkAddedQueue   = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['index']['benchmarkAddedQueue'], ENT_QUOTES, 'UTF-8', true);?>
';
system.lang.index.workDone  		    = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['index']['workDone'], ENT_QUOTES, 'UTF-8', true);?>
';
system.lang.index.workAmountDone  		= '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['index']['workAmountDone'], ENT_QUOTES, 'UTF-8', true);?>
';
<?php echo '</script'; ?>
><?php }
}
