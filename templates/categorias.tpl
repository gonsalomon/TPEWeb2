{include file="header.tpl"}
{include file="nav.tpl"}
<table>
    <h1 class="center">Categorias</h1>
    <thead>
        <tr>
            <th>Mueble</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=$categoria key=$key}
            <tr>
                {* {foreach from=$categoria item=$item}
                    <td>{$item}</td>
                {/foreach} *}
                <td>{$categorias[$key]['mueble']}</td>
                <td>{$categorias[$key]['descripcion']}</td>
                <td>{$categorias[$key]['precio']}</td>
                <td>{$categorias[$key]['categoria']}</td>
                {* Work in progress. Hay que llamar individualmente a cada mueble. *}
                <td><a href="ViewDetail/{$categorias[$key]['id_mueble']}">Ver</a></td>
            </tr>
        {/foreach}
    </tbody>
{include file="footer.tpl"}