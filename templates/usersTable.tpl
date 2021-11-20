{include file="head.tpl"}
{include file="nav.tpl"}
{if $admin}
    <h1>Editar usuarios</h1>
    <p>Un admin puede dar permisos de administrador a otro usuario, o borrar a otro usuario.</p>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Is Admin</th>
                <th>Borrar</th>
                <th>Actualizar Permisos</th>
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
                    <td>
                        <button><a class="link" href="toggleAdmin/{$user->id}">
                            {if $user->is_admin} Quitar permisos de Administrador
                            {else}Otorgar permisos de Administrador {/if}
                        </a></button>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/if}
{include file="footer.tpl"}