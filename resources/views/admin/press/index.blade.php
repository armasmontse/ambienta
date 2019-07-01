@extends('layouts.admin')

@section('title')
    Prensa
@endsection

@section('h1')
    Prensa
@endsection

@section('action')
    <a href="{{ route( 'admin::press.create' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >add</i>
    </a>
@endsection

@section('content')
    <press :list="store.press.data"></press>
@endsection

@section('vue_templates')

    <script type="x/templates" id="press-template">
         <div class="">

               {{-- filtros por: subtítulo, título, Estatus, fecha --}}
         	   @include('admin.general._table-search')

			   <div class="col s10 offset-s1" >
                 @include('admin.press.index._table')
               </div>

         </div>

     </script>

@endsection

@section('vue_store')
    <script>
        mainVueStore.press = {
            data : {!! json_encode($pressArr) !!}
        };
    </script>
@endsection
