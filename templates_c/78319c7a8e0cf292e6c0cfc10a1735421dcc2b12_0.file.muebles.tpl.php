<?php
/* Smarty version 3.1.39, created on 2021-10-02 23:34:07
  from 'C:\xampp\htdocs\projects\TPEWeb2\templates\muebles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158d04fd809c7_27595304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78319c7a8e0cf292e6c0cfc10a1735421dcc2b12' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\TPEWeb2\\templates\\muebles.tpl',
      1 => 1633210445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6158d04fd809c7_27595304 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<table>
    <thead>
        <tr>
            <th>Mueble</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['muebles']->value, 'mueble');
$_smarty_tpl->tpl_vars['mueble']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mueble']->value) {
$_smarty_tpl->tpl_vars['mueble']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['mueble']->value->nombre;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mueble']->value->descripcion;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mueble']->value->precio;?>
</td>
                <td><?php if ((isset($_smarty_tpl->tpl_vars['mueble']->value->id_categoria))) {?>
                        <?php echo $_smarty_tpl->tpl_vars['mueble']->value->id_categoria;?>

                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
