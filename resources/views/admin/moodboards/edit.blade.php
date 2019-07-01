@extends('layouts.admin')

@section('title')
    Editar inspiración
@endsection

@section('h1')
    Editar inspiración
@endsection

@section('action')
    <a href="{{ route( 'admin::moodboards.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

    @include('admin.moodboards._form',[
        "form_id"         => 'edit_moodboards_form',
        "form_route"      => ['admin::moodboards.update', $moodboard->id],
        "form_method"     => 'PATCH',
    ])

    <div class="col s12 ">
        <div class="divider"></div>
    </div>

    <div class="input-field col s10 offset-s1">

        <h6 class="center-align"><b>Imagen destacada del evento</b></h6>

        <div class="center-image mt-5" style="width: 100%; max-width: 120px">
            <single-image
                :ref-path="['moodboards']"
                :current-image="store.current_moodboard.thumbnail_image"
                :photoable-id="store.current_moodboard.id"
                photoable-type="moodboard"
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
        mainVueStore.current_moodboard =  {!! $moodboard !!};
    </script>
@endsection
