{include file="header.tpl"}
{include file="nav.tpl"}
<table>
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=categoria}
            <tr>
                <td>{$categoria->nombre}</td>
                <td>{$categoria->descripcion}</td>
            </tr>
        {/foreach}
    </tbody>
{include file="footer.tpl"}