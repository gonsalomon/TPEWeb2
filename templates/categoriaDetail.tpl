{include file="head.tpl"}
{include file="nav.tpl"}
<h1 class="center row">Categorias</h1>
<table>
    <thead>
        <tr>
            <th>Mueble</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=$categoria key=$key}
            <tr>
                <td>{$categorias[$key]->nombre}</td>
                <td>{$categorias[$key]->descripcion}</td>
                <td>{$categorias[$key]->precio}</td>
                {* <td>{$categorias[$key]['categoria']}</td> *}
                <td><a href="ViewDetail/{$categorias[$key]->id_mueble}" class="link">Ver</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}