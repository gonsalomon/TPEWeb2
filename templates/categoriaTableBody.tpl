<tbody id="tableBody">
        {foreach from=$categorias item=$categoria key=$key}
            <tr>
                <td>{$categorias[$key]['mueble']}</td>
                <td>{$categorias[$key]['descripcion']}</td>
                <td>{$categorias[$key]['precio']}</td>
                <td>{$categorias[$key]['categoria']}</td>
                {if isset($admin)}
                    <td><a href="editMueble/{$categorias[$key]['id_mueble']}">Edit</a></td>
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
                    <td><input type="text" name="cat" placeholder="Categoría"></td>
                    <td><input type="submit" value="Add"></td>
                </form>
            </tr>
        {/if}
</tbody>