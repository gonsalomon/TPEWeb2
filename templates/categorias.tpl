{include file="header.tpl"}
{include file="nav.tpl"}
<table>
    <form>
        <button type="button" id="btn-Filter">Filtrar por Categoria</button>
        <select name="Filter" id="filter">
            <option value="-1">Todos</option>
            {foreach from=$listaCat item=$cat key=$key}
                <option value="{$cat->id_categoria}">{$cat->nombre}</option>
            {/foreach}
        </select>
    </form>

    <h1 class="center row">Categorias</h1>
    <thead>
        <tr>
            <th>Mueble</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
            {if $admin}
                <th>Edit</th>
                <th>Delete</th>
            {/if}
        </tr>
    </thead>
    <tbody id="tableBody">
        {foreach from=$categorias item=$categoria key=$key}
            <tr>
                <td>{$categorias[$key]['mueble']}</td>
                <td>{$categorias[$key]['descripcion']}</td>
                <td>{$categorias[$key]['precio']}</td>
                <td>{$categorias[$key]['categoria']}</td>
                {if $admin}
                    <td><a href="ViewDetail/{$categorias[$key]['id_mueble']}">Edit</a></td>
                    <td><a href="delMueble/{$categorias[$key]['id_mueble']}">Delete</a></td>
                {/if}
                <td><a href="ViewDetail/{$categorias[$key]['id_mueble']}" class="link">Ver</a></td>
            </tr>
        {/foreach}
        {if $admin}
            <tr>
                <form method="POST" action="addMueble">
                    <td><input type="text" name="furn" placeholder="Mueble"></td>
                    <td><input type="text" name="desc" placeholder="Descripción"></td>
                    <td><input type="text" name="price" placeholder="Precio"></td>
                    <td><select name="cat">
                            {foreach from=$listaCat item=$cat}
                                <option value="{$cat->id_categoria}">{$cat->nombre}</option>
                            {/foreach}
                        </select></td>
                    <td><input type="submit" value="Add"></td>
                </form>
            </tr>
        {/if}
    </tbody>

    <script src="./js/filter.js"></script>
{include file="footer.tpl"}