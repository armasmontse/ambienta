@extends('layouts.admin')

@section('title')
    Editar prensa
@endsection

@section('h1')
    Editar prensa
@endsection

@section('action')
    <a href="{{ route( 'admin::press.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

    @include('admin.press._form',[
        "form_id"         => 'edit_press_form',
        "form_route"      => ['admin::press.update', $press->id],
        "form_method"     => 'PATCH',
    ])

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

    <div class="input-field col s10 offset-s1">

        <h6 class="center-align"><b>Imagen destacada de prensa</b></h6>

        <div class="center-image mt-5" style="width: 100%; max-width: 120px">
            <single-image
                :ref-path="['press']"
                :current-image="store.current_press.thumbnail_image"
                :photoable-id="store.current_press.id"
                photoable-type="press"
                default-order="null"
                use='thumbnail'
            ></single-image>
        </div>

    </div>

    <div class="col s12 ">
		<div class="divider"></div>
	</div>


@endsection

@section('modals')
    <media-manager v-ref:media_manager></media-manager>
@endsection

@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')

    @include('admin.media_manager.vue._modal-media_manager')
    @include('admin.media_manager.vue.single-image-template')
    @include('admin.media_manager.vue.multi-images-template')
@endsection

@section('vue_store')
    <script>
        mainVueStore.current_press =  {!! $press !!};
    </script>
@endsection
