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
                    <td><input type="text" name="cat" placeholder="Categoría"></td>
                    <td><input type="submit" value="Add"></td>
                </form>
            </tr>
        {/if}
</tbody>