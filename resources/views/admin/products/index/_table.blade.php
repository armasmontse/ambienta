<table class="highlight responsive-table  ocultar tab-content" id="tab-2">
    <thead class="">
        <tr>
            <th><b>Producto</b><br><small><mark class="code">(código)</mark></small></th>
            <th><b>Estatus</b></th>
            <th><b>Fecha de publicación</b></th>
            <th><b>Categorías</b></th>
			<th><b>Colecciones</b></th>
            <th class="center-align" ><b>Ver</b></th>
            <th class="center-align" ><b>Editar</b></th>
            <th class="center-align" ><b>Eliminar</b></th>
        </tr>
    </thead>

    <tbody class="">

        <tr class="" v-for="product in filtered_list">
                <td class="">
                    @{{product.title}}<br><small><mark class="code">(@{{product.code}})</mark></small>
                </td>

                <td>@{{product.publish_label}}</td>

                <td>@{{product.publish_format_date}}</td>

                <td>@{{product.implode_categories}}</td>
				<td>@{{product.implode_collections}}</td>


                <td class="center-align">
                    <a href="@{{product.public_url}}" target="_blank" class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >visibility</i>
                    </a>
                </td>

                <td class="center-align">
                    <a href="@{{product.edit_url}}"  class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >mode_edit</i>
                    </a>
                </td>

                <td class="center-align">
                    {!! Form::open([
                        'method'                => 'DELETE',
                        'route'                 => ['admin::products.ajax.destroy','&#123;&#123;product.id&#125;&#125;'],
                        'role'                  => 'form' ,
                        'id'                    => 'delete_products-&#123;&#123;product.id&#125;&#125;_form',
                        'class'                 => '',
                        'data-index'            => '&#123;&#123;$index&#125;&#125;',
                        'v-on:submit.prevent'   => 'post',
                        //'v-if'                  => "ally.is_deletable"
                    ]) !!}
                        <button type="submit" class=" btn-floating waves-effect waves-light red darken-4" form ="delete_products-&#123;&#123;product.id&#125;&#125;_form">
                            <i class="material-icons">delete</i>
                        </button>
                    {!!Form::close()!!}

                </td>

            </tr>

    </tbody>
</table>
