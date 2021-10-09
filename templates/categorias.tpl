{include file="header.tpl"}
{include file="nav.tpl"}
<table>
    <h1 class="center">Categorias</h1>
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=$categoria}
            <tr>
                {foreach from=$categoria item=$item}
                    <td>{$item}</td>
                {/foreach}
            </tr>
        {/foreach}
    </tbody>
{include file="footer.tpl"}