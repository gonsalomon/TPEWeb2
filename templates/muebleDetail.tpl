{include file="head.tpl"}
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
        {if $admin}
            <tr>
                <form method="POST" action="editMueble/{$mueble[0]->id_mueble}">
                    <td><input type="text" name="furn" placeholder="Mueble"></td>
                    <td><input type="text" name="desc" placeholder="Descripción"></td>
                    <td><input type="text" name="price" placeholder="Precio"></td>
                    <td><select name="cat">
                            {foreach from=$listaCat item=$cat}
                                <option value="{$cat->id_categoria}">{$cat->nombre}</option>
                            {/foreach}
                        </select></td>
                    <td><input type="submit" value="Edit"></td>
                </form>
            </tr>
        {/if}
    </tbody>
</table>

{if $user}
<form method="POST">
    <input id="userMail" value="{$user}">
    <input id="isAdmin" value="{$admin}">
    <h4> Valoracion: </h4> 
    <select name="valoracion" id="puntaje">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input type="text" name="comment" id="comment">
    <input id="sendComment" type="button" value="Enviar comentario">
    <input id="muebleId" value="{$mueble[0]->id_mueble}">
</form>
{else}
<p>Puedes loguearte para dejar comentarios</p>
{/if}

<div id="commentsContainer"></div>
<script src="js/comments.js"></script>
<script> loadComments({$mueble[0]->id_mueble});</script>
{include file="footer.tpl"}