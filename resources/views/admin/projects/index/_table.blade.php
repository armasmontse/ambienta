<table class="highlight responsive-table  ocultar tab-content" id="tab-2">
    <thead class="">
        <tr>
            <th><b>Evento</b></th>
            <th><b>Subtítulo</b></th>
            <th><b>Estatus</b></th>
            <th><b>Fecha de publicación</b></th>
            <th class="center-align" ><b>Ver</b></th>
            <th class="center-align" ><b>Editar</b></th>
            <th class="center-align" ><b>Eliminar</b></th>
        </tr>
    </thead>

    <tbody class="">

        <tr class="" v-for="project in filtered_list">
                <td class="">
                    @{{project.title}}
                </td>

                <td>@{{project.subtitle}}</td>

                <td>@{{project.publish_label}}</td>
                <td>@{{project.publish_format_date}}</td>

                <td class="center-align">
                    <a href="@{{project.public_url}}" target="_blank" class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >visibility</i>
                    </a>
                </td>

                <td class="center-align">
                    <a href="@{{project.edit_url}}"  class="btn-floating black">
                        <i class="material-icons waves-effect waves-light " >mode_edit</i>
                    </a>
                </td>

                <td class="center-align">
                    {!! Form::open([
                        'method'                => 'DELETE',
                        'route'                 => ['admin::projects.destroy','&#123;&#123;project.id&#125;&#125;'],
                        'role'                  => 'form' ,
                        'id'                    => 'delete_projects-&#123;&#123;project.id&#125;&#125;_form',
                        'class'                 => '',
                        //'v-if'                  => "ally.is_deletable"
                    ]) !!}
                        <button type="submit" class=" btn-floating waves-effect waves-light red darken-1" form ="delete_projects-&#123;&#123;project.id&#125;&#125;_form">
                            <i class="material-icons">delete</i>
                        </button>
                    {!!Form::close()!!}

                </td>

            </tr>

    </tbody>
</table>
