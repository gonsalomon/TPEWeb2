{include file="head.tpl"}
{include file="nav.tpl"}
<table>
    <h1 class="center row">Categorias</h1>
    <a href="viewAllCats">Ver Categorias Cargadas</a>
    <thead>
        <tr>

            <th>Nombre Categoria</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        {foreach from=$cats item=$categoria key=$key}
            <tr>
                <td>{$categoria->nombre}</td>
                <td>{$categoria->descripcion}</td>
                {if $admin}
                    <td><a href="delCategoria/{$categoria->id_categoria}" class="link">Delete</a></td>
                {/if}
            </tr>
        {/foreach}
        {if $admin}
            <tr>
                <form method="POST" action="addCategoria">
                    <td><input type="text" name="categoria" placeholder="Categoria"></td>
                    <td><input type="text" name="descripcion" placeholder="Descripción"></td>
                    <td><input type="submit" value="Add Categoria"></td>
                </form>
            </tr>
        {/if}
    </tbody>
{include file="footer.tpl"}