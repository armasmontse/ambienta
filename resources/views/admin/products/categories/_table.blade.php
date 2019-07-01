<div class="col s10 offset-s1">

    <table class="highlight responsive-table ">
        <thead class="">
            <tr>
                <th ><b>Nombre</b></th>
				<th class="center-align" ><b>Ver</b></th>
                <th class="col-button" ><b>Editar</b></th>
                <th class="col-button" ><b>Eliminar</b></th>
            </tr>
        </thead>

        <tbody class="">
            <tr class="" v-for="category in filtered_list">
                <td class="categoriestable__name" >
                    @{{category.label}}
                </td>
				<td class="col-button">
					<a href="@{{category.public_url}}" target="_blank" class="btn-floating black">
						<i class="material-icons waves-effect waves-light " >visibility</i>
					</a>
				</td>
                <td class="col-button">


                    <span {{--v-if="category.deletable"--}}
                        data-target="categories-modal-edit"
                        {{-- data-index="@{{$index}}" --}}
                        class=" btn-floating waves-effect waves-light categoriestable__edit--button black"
                        @click="openModal('#categories-modal-edit' ,$index)">
                        <i class="material-icons waves-effect waves-light " >mode_edit</i>
                    </span>
                </td>

                <td class="col-button">
                    {!! Form::open([
                        'method'                => 'DELETE',
                        'route'                 => ['admin::categories.ajax.destroy','&#123;&#123;category.id&#125;&#125;'],
                        'role'                  => 'form' ,
                        'id'                    => 'delete_category-&#123;&#123;category.id&#125;&#125;_form',
                        'class'                 => '',
                        'data-index'            => '&#123;&#123;$index&#125;&#125;',
                        'v-on:submit.prevent'   => 'post',
                        //'v-if'                  => "ally.is_deletable"
                    ]) !!}
                        <button type="submit" class=" btn-floating waves-effect waves-light red darken-3 categoriestable__edit--button" form ="delete_category-&#123;&#123;category.id&#125;&#125;_form">
                            <i class="material-icons">delete</i>
                        </button>
                     {!!Form::close()!!}
                </td>
            </tr>
        </tbody>
    </table>
</div>
