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