<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'editors/multilevel_selection.tpl', 31, false),)), $this); ?>
<table <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "editors/editor_options.tpl", 'smarty_include_vars' => array('Editor' => $this->_tpl_vars['MultilevelEditor'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> class="pgui-multilvevel-autocomplete">
<tbody>

<?php $_from = $this->_tpl_vars['MultilevelEditor']->getLevels(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Editors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Editors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Editor']):
        $this->_foreach['Editors']['iteration']++;
?>
    <tr>
        <td><span><?php echo $this->_tpl_vars['Editor']->getCaption(); ?>
</span></td>
        <td>
            <input
                type="hidden"
                data-placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('PleaseSelect'); ?>
"
                name="<?php echo $this->_tpl_vars['Editor']->getName(); ?>
"
                data-minimal-input-length="<?php echo $this->_tpl_vars['MultilevelEditor']->getMinimumInputLength(); ?>
"
                <?php if (! $this->_tpl_vars['MultilevelEditor']->getEnabled()): ?>
                    disabled="disabled"
                <?php endif; ?>
                <?php if ($this->_tpl_vars['MultilevelEditor']->getAllowClear()): ?>
                    data-allowClear="true"
                <?php endif; ?>
                <?php if ($this->_tpl_vars['MultilevelEditor']->GetReadOnly()): ?>
                    readonly="readonly"
                <?php endif; ?>
                <?php if ($this->_tpl_vars['Editor']->getParentEditor()): ?>
                    data-parent-autocomplete="<?php echo $this->_tpl_vars['Editor']->getParentEditor(); ?>
"
                <?php endif; ?>
                data-url="<?php echo $this->_tpl_vars['Editor']->getDataURL(); ?>
"
                <?php if (($this->_foreach['Editors']['iteration'] == $this->_foreach['Editors']['total'])): ?>
                    data-multileveledit-main="true"
                    <?php echo $this->_tpl_vars['Validators']['InputAttributes']; ?>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['Editor']->getFormatResult()): ?>
                    data-format-result="<?php echo ((is_array($_tmp=$this->_tpl_vars['Editor']->getFormatResult())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                <?php endif; ?>
                <?php if ($this->_tpl_vars['Editor']->getFormatSelection()): ?>
                    data-format-selection="<?php echo ((is_array($_tmp=$this->_tpl_vars['Editor']->getFormatSelection())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                <?php endif; ?>
                value="<?php echo $this->_tpl_vars['Editor']->getValue(); ?>
"
                data-init-text="<?php echo $this->_tpl_vars['Editor']->getDisplayValue(); ?>
"
            />
        </td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>