@extends('layouts.admin')

@section('title')
    Productos
@endsection

@section('h1')
    Productos
@endsection

@section('action')
    <a href="{{ route( 'admin::products.create' ) }}" class="btn-floating ">
        <i class="material-icons waves-effect waves-light black" >add</i>
    </a>
@endsection

@section('content')
    <products :list="store.products.data"></products>
@endsection

@section('vue_templates')

    <script type="x/templates" id="products-template">
         <div class="">

               {{-- filtros por: tipo, título, Estatus, fecha, categoría --}}
         	   @include('admin.general._table-search')

			   <div class="col s10 offset-s1" >
                 @include('admin.products.index._table')
               </div>

         </div>
     </script>
@endsection

@section('vue_store')
    <script>
	mainVueStore.products = {
		data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
		routes: {
			get: '{{route('admin::products.ajax.index')}}'
		}
	};
    </script>
@endsection
