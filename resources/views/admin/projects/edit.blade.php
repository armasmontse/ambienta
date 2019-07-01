@extends('layouts.admin')

@section('title')
    Editar evento
@endsection

@section('h1')
    Editar evento
@endsection

@section('action')
    <a href="{{ route( 'admin::projects.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

    @include('admin.projects._form',[
        "form_id"         => 'edit_projects_form',
        "form_route"      => ['admin::projects.update', $project->id],
        "form_method"     => 'PATCH',
        //"project_editable"   => $project
    ])

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

    <div class="input-field col s10 offset-s1">

        <h6 class="center-align"><b>Imagen destacada del evento</b></h6>

        <div class="center-image mt-5" style="width: 100%; max-width: 120px">
            <single-image
                :ref-path="['projects']"
                :current-image="store.current_project.thumbnail_image"
                :photoable-id="store.current_project.id"
                photoable-type="project"
                default-order="null"
                use='thumbnail'
            ></single-image>
        </div>

    </div>

    <div class="col s12 ">
		<div class="divider"></div>
	</div>

    <div class="input-field col s10 offset-s1">

        <multi-images
            :ref-path="['projects_gallery']"
            :all-photos="store.current_project.gallery_images"
            :photoable-id="store.current_project.id"
            photoable-type="project"
            default-order="null"
            use='gallery'
        ></multi-images>

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
        mainVueStore.current_project =  {!! $project !!};
    </script>
@endsection
