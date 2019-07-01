@extends('layouts.admin')

@section('title')
    Editar colección
@endsection

@section('h1')
    Editar colección
@endsection

@section('action')
    <a href="{{ route( 'admin::collections.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

    @include('admin.collections._form',[
        "form_id"         => 'edit_collections_form',
        "form_route"      => ['admin::collections.update', $collection_editable->id],
        "form_method"     => 'PATCH',
        "collection_editable"   => $collection_editable
    ])

    <div class="col s12">
        <div class="divider"></div>
    </div>

    <div class=" col s10 offset-s1">
        <h6><b>Tipos</b></h6>
        <types-multi-select :list.sync="store.types.data" :items-ids="store.current_collections.types_ids"></types-multi-select>
    </div>

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

    <div class="input-field col s10 offset-s1">
        <h6 class="center"><b>Imagen destacada de la colección</b></h6>
        <div class="center-image mt-5" style="width: 100%; max-width: 120px">
            <single-image
            :ref-path="['collections']"
            :current-image="store.current_collections.thumbnail_image"
            :photoable-id="store.current_collections.id"
            photoable-type="collection"
            default-order="null"
            use='thumbnail'
            ></single-image>
        </div>
    </div>

    <div class="col s12 ">
        <div class="divider"></div>
    </div>

    <div class=" col s10 offset-s1">
        
        @include('admin.seo_manager._form', [
            'seoable_type' => 'collection',
            'seoable' => $collection_editable,
            'seo' => $seo
        ])

    </div>

@endsection

@section('modals')
    <types-modal-create :list.sync="store.types.data"></types-modal-create>
    <media-manager v-ref:media_manager></media-manager>
@endsection

@section('vue_templates')

    @include('admin.general._cltvo-v-editor-template')

    @include('admin.collections.types._modal-create')
    @include('admin.collections.types._multi-select-template', [
		'form_id' 			=> "update_types-collections_form",
		'form_method'		=> "patch",
		'form_route'		=> ["admin::collections.ajax.types", $collection_editable->id],
		'add_label'			=> "Agregar tipo"
    ])

    @include('admin.media_manager.vue._modal-media_manager')
    @include('admin.media_manager.vue.single-image-template')
    @include('admin.media_manager.vue.multi-images-template')

@endsection

@section('vue_store')
    <script>
        //mainVueStore.current_post = {{--{!! $post !!};--}}
        mainVueStore.current_collections =  {!! $collection_editable !!};
        mainVueStore.seo =  {!! $seo !!};
        mainVueStore.types = {
            data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
            routes: {
                 get: '{{route('admin::types.ajax.index')}}'
            }
        };
    </script>
@endsection
