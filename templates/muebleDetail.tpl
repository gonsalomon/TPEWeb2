{include file="header.tpl"}
{include file="nav.tpl"}
<h1>Detalles</h1>
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
        <tr>
            <td>{$mueble[0]->nombre}</td>
            <td>{$mueble[0]->descripcion}</td>
            <td>{$mueble[0]->precio}</td>
            <td>{$mueble[0]->categoria}</td>
        </tr>
        {debug}
        {if $admin}
            <tr>
                <form method="POST" action="editMueble">
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
</table>
{include file="footer.tpl"}