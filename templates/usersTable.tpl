{include file="head.tpl"}
{include file="nav.tpl"}
{if isset($admin)}
    <h1>Editar usuarios</h1>
    <p>Un admin puede dar permisos de administrador a otro usuario, o borrar a otro usuario.</p>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Admin</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$users item=$user }
                <tr>
                    <td>{$user->mail}</td>
                    <td><input type="checkbox" {if $user->is_admin}checked{/if}></td>
                    <td>
                        <button><a class="link" href="delUser/{$user->id}">Borrar</a></button>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/if}
{include file="footer.tpl"}