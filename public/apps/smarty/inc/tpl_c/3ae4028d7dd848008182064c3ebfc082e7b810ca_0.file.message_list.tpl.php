<?php
/* Smarty version 3.1.32-dev-38, created on 2018-01-15 03:56:53
  from 'C:\xampp\htdocs\smarty\tpl\message_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-38',
  'unifunc' => 'content_5a5c187586f0f5_59265374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ae4028d7dd848008182064c3ebfc082e7b810ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty\\tpl\\message_list.tpl',
      1 => 1515629804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5c187586f0f5_59265374 (Smarty_Internal_Template $_smarty_tpl) {
?><table  id="tblMessage" class="table table-striped table-bordered">
  <thead>
    <tr> 
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>  
      <th>Action</th>  
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'i', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['i']->value) {
?> 
      <tr>   
        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['message'];?>
</td> 
        <td><a href="#" onclick="retrieveData(<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
','<?php echo $_smarty_tpl->tpl_vars['i']->value['message'];?>
'); return false;">Edit</a> | <a href="#" onclick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
); return false;">Delete</a></td>   
      </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
</tbody>
</table>  
  <!--<?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['to']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['to']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
     <a href="#" onclick="paginate_message(<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
); return false;" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</a>
  <?php }
}
?> --><?php }
}