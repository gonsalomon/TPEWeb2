{include file="header.tpl"}
{include file="nav.tpl"}
<table>
    <a href="home" class="link">
        <-- </a>

        <form>
            <select name="Filter" id="filter">
                <option value="-1">Todos</option>
                <option value="6">Pieza</option>
                <option value="5">Cocina</option>
            </select>
            <button type="button" id="btn-Filter">Filtrar</button>
        </form>

            <h1 class="center row">Categorias</h1>
            <thead>
                <tr>
                    <th>Mueble</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                {foreach from=$categorias item=$categoria key=$key}
                    <tr>
                        <td>{$categorias[$key]['mueble']}</td>
                        <td>{$categorias[$key]['descripcion']}</td>
                        <td>{$categorias[$key]['precio']}</td>
                        <td>{$categorias[$key]['categoria']}</td>
                        <td><a href="ViewDetail/{$categorias[$key]['id_mueble']}" class="link">Ver</a></td>
                    </tr>
                {/foreach}
            </tbody>
            
        <script src="./js/filter.js"></script>
{include file="footer.tpl"}