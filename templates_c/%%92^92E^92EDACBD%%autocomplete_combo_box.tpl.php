<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'editors/autocomplete_combo_box.tpl', 9, false),)), $this); ?>
<input
	type="hidden"
	class="form-control"
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "editors/editor_options.tpl", 'smarty_include_vars' => array('Editor' => $this->_tpl_vars['AutocompleteComboBox'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	data-placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('PleaseSelect'); ?>
"
	data-url="<?php echo $this->_tpl_vars['AutocompleteComboBox']->GetDataUrl(); ?>
"
	data-minimal-input-length="<?php echo $this->_tpl_vars['AutocompleteComboBox']->getMinimumInputLength(); ?>
"
	<?php if ($this->_tpl_vars['AutocompleteComboBox']->getFormatResult()): ?>
		data-format-result="<?php echo ((is_array($_tmp=$this->_tpl_vars['AutocompleteComboBox']->getFormatResult())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
	<?php endif; ?>
	<?php if ($this->_tpl_vars['AutocompleteComboBox']->getFormatSelection()): ?>
		data-format-selection="<?php echo ((is_array($_tmp=$this->_tpl_vars['AutocompleteComboBox']->getFormatSelection())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
	<?php endif; ?>
	<?php if ($this->_tpl_vars['AutocompleteComboBox']->GetReadonly()): ?>readonly="readonly"<?php endif; ?>
	<?php if ($this->_tpl_vars['AutocompleteComboBox']->getAllowClear()): ?>data-allowClear="true"<?php endif; ?>
	value="<?php echo $this->_tpl_vars['AutocompleteComboBox']->GetValue(); ?>
"
/>