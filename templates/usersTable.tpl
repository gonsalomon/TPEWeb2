{include file="head.tpl"}
{include file="nav.tpl"}
{if $admin}
    <table>
        <tr>
            <td>{$user}</td>
            <td>
                {if isset($admin)}
                    <h1>Editar usuarios</h1>
                    <a>Un admin puede dar permisos de administrador a otro usuario, o borrar a otro usuario.</a>
                    <table>
                        <tr>
                            <td>Usuario</td>
                            <td>Admin</td>
                            <td>Borrar</td>
                        </tr>
                        {foreach from=$users item=user}
                            <tr>
                                <td>{$user->username}</td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <button><a class="link" href="deleteUser">Borrar</a></button>
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {/if}
            </td>
            <td><input type="text" name="price" placeholder="Precio"></td>
            <td><select name="cat">
                    {foreach from=$listaCat item=$cat}
                        <option value="{$cat->id_categoria}">{$cat->nombre}</option>
                    {/foreach}
                </select></td>
            <td><input type="submit" value="Edit"></td>
            <td><button </tr>
    </table>
{/if}
{include file="footer.tpl"}