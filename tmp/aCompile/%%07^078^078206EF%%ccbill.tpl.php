<?php /* Smarty version 2.6.31, created on 2025-10-18 19:35:08
         compiled from /home/gmoplus/mobil.gmoplus.com/plugins/ccbill/admin/ccbill.tpl */ ?>
<!-- ccbill settings tpl -->

<form method="post" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $this->_tpl_vars['cInfo']['Controller']; ?>
">
    <?php $_from = $this->_tpl_vars['ccbill_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
    <table class="form">
        <tr>
            <td class="divider_line">
                <div class="inner"><?php echo $this->_tpl_vars['group']['name']; ?>
</div>
            </td>
        </tr>
        <tr>
            <td>
                <table class="form">
                    <tr>
                        <td align="center"><?php echo $this->_tpl_vars['lang']['item']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['lang']['ccbill_form']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['lang']['ccbill_allowed_type']; ?>
</td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['group']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['groupF']['iteration']++;
?>
                        <tr class="<?php if ($this->_foreach['groupF']['iteration']%2 != 0): ?>highlight<?php endif; ?>">
                            <td class="name" style="width: 210px;"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
                            <td class="field">
                                <input class="text" type="text" name="f[<?php echo $this->_tpl_vars['group']['Key']; ?>
][<?php echo $this->_tpl_vars['item']['ID']; ?>
][form]" value="<?php echo $this->_tpl_vars['item']['form']; ?>
" />
                            </td>
                            <td class="field">
                                <input class="text" type="text" name="f[<?php echo $this->_tpl_vars['group']['Key']; ?>
][<?php echo $this->_tpl_vars['item']['ID']; ?>
][allowed_types]" value="<?php echo $this->_tpl_vars['item']['allowed_types']; ?>
" />
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </td>
        </tr>
    </table>
    <?php endforeach; endif; unset($_from); ?>
    <table class="form">
        <tr>
            <td></td>
            <td><input style="margin: 10px 0 0 0;" type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" /></td>
        </tr>
    </table>
</form>

<!-- end ccbill settings tpl -->

<!-- end ccbill settings tpl -->