<div class="col s10 offset-s1">

    <table class="highlight responsive-table">

        <thead>
            <tr>
                <th><b>Nombre</b></th>
				<th class="col-button" ><b>Ver</b></th>
                <th class="col-button"><b>Editar</b></th>
                <th class="col-button"><b>Eliminar</b></th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="type in filtered_list">
                <td class="types-table__name" >
                    @{{type.label}}
                </td>
				<td class="col-button">
					<a href="@{{type.public_url}}" target="_blank" class="btn-floating black">
						<i class="material-icons waves-effect waves-light " >visibility</i>
					</a>
				</td>
                <td class="col-button">
                    <span  data-target="types-modal-edit" class=" btn-floating waves-effect waves-light typestable__edit--button black" @click="openModal('#types-modal-edit' ,$index)">
                        <i class="material-icons waves-effect waves-light">mode_edit</i>
                    </span>
                </td>
                <td class="col-button">
                    {!! Form::open([
                        'method'                => 'DELETE',
                        'route'                 => ['admin::types.ajax.destroy','&#123;&#123;type.id&#125;&#125;'],
                        'role'                  => 'form' ,
                        'id'                    => 'delete_type-&#123;&#123;type.id&#125;&#125;_form',
                        'class'                 => '',
                        'data-index'            => '&#123;&#123;$index&#125;&#125;',
                        'v-on:submit.prevent'   => 'post',
                    ]) !!}
                        <button type="submit" class="btn-floating waves-effect waves-light red darken-3 typestable__edit--button" form ="delete_type-&#123;&#123;type.id&#125;&#125;_form">
                            <i class="material-icons">delete</i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>

    </table>
</div>
