@extends('layouts.admin')

@section('title')
	Tipos
@endsection

@section('h1')
	Tipos
@endsection

@section('action')
	<span data-target="types-modal-create" class="modal-trigger btn-floating black">
		<i class="material-icons waves-effect waves-light">add</i>
	</span>
@endsection

@section('content')
    <types :list="store.types.data"></types>
@endsection

@section('vue_templates')

    @include('admin.collections.types._modal-create')
	@include('admin.collections.types._modal-edit')

    <script type="x/templates" id="types-template">
		<div class="">

			@include('admin.general._page-instructions', [
				'title'		 	=> '',
				'instructions'	=> 'Da click para editar o borrar un tipo de colección.'
			])

			@include('admin.general._table-search')

			@include('admin.collections.types._table')

			<types-modal-create :list.sync="list" ></types-modal-create>
			<types-modal-edit :list.sync="list" :edit-index="edit_index"></types-modal-edit>

		</div>
	</script>

@endsection

@section('vue_store')
    <script>
			mainVueStore.types = {
				data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
				routes: {
					 get: '{{route('admin::types.ajax.index')}}'
				}
			};
    </script>
@endsection
