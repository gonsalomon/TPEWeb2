{include file="header.tpl"}
{include file="nav.tpl"}
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
        {{foreach from=muebles item=mueble}
            <tr>
                <td>{$mueble->nombre}</td>
                <td>{$mueble->detalles}</td>
                <td>{$mueble->precio}</td>
            </tr>
        {/foreach}}
    </tbody>
{include file="footer.tpl"}