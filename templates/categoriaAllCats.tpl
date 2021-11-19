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
            </tr>
        {/foreach}
    </tbody>
{include file="footer.tpl"}