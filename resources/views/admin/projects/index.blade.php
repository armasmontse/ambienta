@extends('layouts.admin')

@section('title')
    Eventos
@endsection

@section('h1')
    Eventos
@endsection

@section('action')
    <a href="{{ route( 'admin::projects.create' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >add</i>
    </a>
@endsection

@section('content')
    <projects :list="store.projects.data"></projects>
@endsection

@section('vue_templates')

    <script type="x/templates" id="projects-template">
         <div class="">

               {{-- filtros por: subtítulo, título, Estatus, fecha --}}
         	   @include('admin.general._table-search')

			   <div class="col s10 offset-s1" >
                 @include('admin.projects.index._table')
               </div>

         </div>
     </script>
@endsection

@section('vue_store')
    <script>
        mainVueStore.projects = {
            data :  {!! $projects !!}
        };
    </script>
@endsection
