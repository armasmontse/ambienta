@extends('layouts.admin')

@section('title')
    Editar producto
@endsection

@section('h1')
    Editar producto
@endsection

@section('action')
    <a href="{{ route( 'admin::products.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

    @include('admin.products._form',[
        "form_id"         => 'edit_products_form',
        "form_route"      => ['admin::products.update', $product->id],
        "form_method"     => 'PATCH',
        "product_editable"   => $product
    ])

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

	<div class=" col s10 offset-s1">
		<h6 class=""><b>Categorías de producto</b></h6>
		<categories-multi-select :list.sync="store.categories.data" :items-ids="store.current_product.categories_ids"></categories-multi-select>
	</div>

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

    <div class="input-field col s10 offset-s1">

        <h6 class="center-align"><b>Imagen destacada del producto</b></h6>

        <div class="center-image mt-5" style="width: 100%; max-width: 120px">
            <single-image
                :ref-path="['products']"
                :current-image="store.current_product.thumbnail_image"
                :photoable-id="store.current_product.id"
                photoable-type="product"
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
            :ref-path="['products_gallery']"
            :all-photos="store.current_product.gallery_images"
            :photoable-id="store.current_product.id"
            photoable-type="product"
            default-order="null"
            use='gallery'
        ></multi-images>

    </div>

	<div class="col s12 ">
		<div class="divider"></div>
	</div>

	<div class=" col s10 offset-s1">
		<h6 class=""><b>Colecciones de producto</b></h6>
		<collections-multi-select :list.sync="store.collections.data" :items-ids="store.current_product.collections_ids"></collections-multi-select>
	</div>
	
    <div class="col s12 ">
		<div class="divider"></div>
	</div>

	<div class=" col s10 offset-s1">
		<h6 class=""><b>Productos relacionados</b></h6>
		<products-multi-select :list.sync="store.products.data" :items-ids="store.current_product.products_ids"></products-multi-select>
	</div>

    <div class="col s12 ">
        <div class="divider"></div>
    </div>

    <div class=" col s10 offset-s1">
        
        @include('admin.seo_manager._form', [
            'seoable_type' => 'product',
            'seoable' => $product,
            'seo' => $seo
        ])

    </div>

@endsection

@section('modals')
    <categories-modal-create :list.sync="store.categories.data"></categories-modal-create>
	<collections-modal-create :list.sync="store.collections.data"></collections-modal-create>

    <media-manager v-ref:media_manager></media-manager>
@endsection

@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')

    @include('admin.products.categories._modal-create')

    @include('admin.products.categories._multi-select-template', [
		'form_id' 			=> "update_categories-products_form",
		'form_method'		=> "patch",
		'form_route'		=> ["admin::products.ajax.categories",$product->id],
		'add_label'			=> "Agregar categoría"
    ])

	@include('admin.products._multi-select-template', [
		'form_id' 			=> "update_products-products_form",
		'form_method'		=> "patch",
		'form_route'		=> ["admin::products.ajax.products",$product->id],
    ])

	@include('admin.collections._modal-create')

	@include('admin.collections._multi-select-template', [
		'form_id' 			=> "update_collections-products_form",
		'form_method'		=> "patch",
		'form_route'		=> ["admin::products.ajax.collections",$product->id],
		'add_label'			=> "Agregar colección"
	])

    @include('admin.media_manager.vue._modal-media_manager')
    @include('admin.media_manager.vue.single-image-template')
    @include('admin.media_manager.vue.multi-images-template')

@endsection

@section('vue_store')
    <script>
        //mainVueStore.current_post = {{--{!! $post !!};--}}
        mainVueStore.current_product =  {!! $product !!};
        mainVueStore.seo =  {!! $seo !!};
        mainVueStore.categories = {
            data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
            routes: {
                 get: '{{route('admin::categories.ajax.index')}}'
            }
        };
		mainVueStore.collections = {
			data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
			routes: {
				 get: '{{route('admin::collections.ajax.index')}}'
			}
		};
		mainVueStore.products = {
			data: undefined, //IMPORTANTE: tenemos que registrar esta propiedad para que el get deposite lo recibido ahí, y SOBRETODO  para que el sistema de reactividad de Vue funcione adecuadamente
			routes: {
				 get: '{{route('admin::products.ajax.index')}}'
			}
		};
    </script>
@endsection
