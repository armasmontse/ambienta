@extends('layouts.admin')

@section('title')
    Inspiración
@endsection

@section('h1')
    Inspiración
@endsection

@section('action')
    <a href="{{ route( 'admin::moodboards.create' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >add</i>
    </a>
@endsection

@section('content')
    <moodboards :list="store.moodboards.data"></moodboards>
@endsection

@section('vue_templates')

    <script type="x/templates" id="moodboards-template">
         <div class="">

               {{-- filtros por: subtítulo, título, Estatus, fecha --}}
         	   @include('admin.general._table-search')

			   <div class="col s10 offset-s1" >
                 @include('admin.moodboards.index._table')
               </div>

         </div>
     </script>
@endsection

@section('vue_store')
    <script>
        mainVueStore.moodboards = {
            data :  {!! $moodboards !!}
        };
    </script>
@endsection
