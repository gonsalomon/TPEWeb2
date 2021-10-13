{include file="header.tpl"}
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
    </tbody>
</table>
{include file="footer.tpl"}