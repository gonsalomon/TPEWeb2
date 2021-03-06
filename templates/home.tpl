{include file="head.tpl"}
{include file="nav.tpl"}
<table>
    <form>
        <button type="button" id="btn-Filter">Filtrar por Categoria</button>
        <select name="Filter" id="filter">
            <option value="0">Todos</option>
            {foreach from=$listaCat item=$cat key=$key}
                <option value="{$cat->id_categoria}">{$cat->nombre}</option>
            {/foreach}
        </select>
    </form>

    <h1 class="center row">Categorias</h1>
    <h3><a href="viewAllCats" class="link">Ver Categorias Cargadas</a></h3>
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
        {foreach from=$categorias item=categoria}
            <tr>
                <td>{$categoria->nombre}</td>
                <td>{$categoria->descripcion}</td>
                <td>{$categoria->precio}</td>
                <td>{$categoria->nombre_categoria}</td>
                {if $admin}
                    <td><a href="ViewDetail/{$categoria->id_mueble}" class="link">Edit</a></td>
                    <td><a href="delMueble/{$categoria->id_mueble}" class="link">Delete</a></td>
                {/if}
                <td><a href="ViewDetail/{$categoria->id_mueble}" class="link">Ver</a></td>
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