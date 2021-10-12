{include file="header.tpl"}
{include file="nav.tpl"}
<a href="home" class="link">
    <-- </a>
        <h1 class="center row">Categorias</h1>
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
                    <td>{$categorias[$key]['mueble']}</td>
                    <td>{$categorias[$key]['descripcion']}</td>
                    <td>{$categorias[$key]['precio']}</td>
                    <td>{$categorias[$key]['categoria']}</td>
                    <td><a href="ViewDetail/{$categorias[$key]['id_mueble']}" class="link">Ver</a></td>
                </tr>
            {/foreach}
        </tbody>
{include file="footer.tpl"}