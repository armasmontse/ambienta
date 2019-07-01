@extends('layouts.admin')

@section('title')
    Colecciones
@endsection

@section('h1')
    Colecciones
@endsection

@section('action')
	<span data-target="collections-modal-create" class="modal-trigger btn-floating black">
		<i class="material-icons waves-effect waves-light">add</i>
	</span>
@endsection

@section('content')
    <collections :list="store.collections.data"></collections>
@endsection

@section('modals')
    <collections-modal-create :list.sync="store.collections.data"></collections-modal-create>
@endsection

@section('vue_templates')

    @include('admin.collections._modal-create')
    @include('admin.general._cltvo-v-editor-template')

    <script type="x/templates" id="collections-template">
         <div class="">

               {{-- filtros por: tipo, título, Estatus, fecha, categoría --}}
         	   @include('admin.general._table-search')

			   <div class="col s10 offset-s1" >
                 @include('admin.collections.index._table')
               </div>

         </div>
     </script>

@endsection

@section('vue_store')
    <script>
  	mainVueStore.collections = {
  		data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
  		routes: {
  			 get: '{{route('admin::collections.ajax.index')}}'
  		}
  	};
    </script>
@endsection
