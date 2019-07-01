<table class="highlight responsive-table  ocultar tab-content" id="tab-2">
    <thead class="">
        <tr>
            <th><b>Título de la colección</b></th>
            <th><b>Subtítulo</b></th>
            <th><b>Estatus</b></th>
            <th><b>Fecha de publicación</b></th>
            <th><b>Tipos</b></th>
            <th class="center-align" ><b>Ver</b></th>
            <th class="center-align" ><b>Editar</b></th>
            <th class="center-align" ><b>Eliminar</b></th>
        </tr>
    </thead>

    <tbody class="">

        <tr class="" v-for="collections in filtered_list">

                <td class="" style="position: relative; padding-top: 22px;">
                    <small v-if="collections.highlighted" style="background-color:#000; color: white; white-space: nowrap; padding: 3px; position: absolute; top: 2px;">Colección destacada</small>
                    <span>@{{collections.title}}</span>
                </td>

                <td class="">
                    @{{collections.subtitle}}
                </td>

                <td>@{{collections.publish_label}}</td>

                <td>@{{collections.publish_format_date}}</td>

                <td>@{{collections.implode_types}}</td>

                <td class="center-align">
                    <a href="@{{collections.public_url}}" target="_blank" class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >visibility</i>
                    </a>
                </td>

                <td class="center-align">
                    <a href="@{{collections.edit_url}}" class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >mode_edit</i>
                    </a>
                </td>

                <td class="center-align">
                    {!! Form::open([
                        'method'                => 'DELETE',
                        'route'                 => ['admin::collections.ajax.destroy','&#123;&#123;collections.id&#125;&#125;'],
                        'role'                  => 'form' ,
                        'id'                    => 'delete_collections-&#123;&#123;collections.id&#125;&#125;_form',
                        'class'                 => '',
                        'data-index'            => '&#123;&#123;$index&#125;&#125;',
                        'v-on:submit.prevent'   => 'post',
                        //'v-if'                  => "ally.is_deletable"
                    ]) !!}
                        <button type="submit" class=" btn-floating waves-effect waves-light red darken-4" form ="delete_collections-&#123;&#123;collections.id&#125;&#125;_form">
                            <i class="material-icons">delete</i>
                        </button>
                    {!!Form::close()!!}

                </td>

            </tr>

    </tbody>
</table>
