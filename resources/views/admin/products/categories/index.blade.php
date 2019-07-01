@extends('layouts.admin')

@section('title')
	Categorías
@endsection

@section('h1')
	Categorías
@endsection

@section('action')
	<span  data-target="categories-modal-create" class=" modal-trigger btn-floating black">
		<i class="material-icons waves-effect waves-light " >add</i>
	</span>
@endsection

@section('content')
    <categories :list="store.categories.data"></categories>
@endsection

@section('vue_templates')
	@include('admin.products.categories._modal-create')
	@include('admin.products.categories._modal-edit')
	<script type="x/templates" id="categories-template">
		<div class="">

			@include('admin.general._page-instructions', [
				'title'		 	=> '',
				'instructions'	=> 'Da click para editar o borrar una categoría.'
			])

			@include('admin.general._table-search')

			@include('admin.products.categories._table')

			<categories-modal-create :list.sync="list" ></categories-modal-create>
			<categories-modal-edit :list.sync="list" :edit-index="edit_index"></categories-modal-edit>

		</div>
	</script>
@endsection

@section('vue_store')
    <script>
			mainVueStore.categories = {
				data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
				routes: {
					 get: '{{route('admin::categories.ajax.index')}}'
				}
			};
    </script>
@endsection
