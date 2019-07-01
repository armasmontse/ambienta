@extends('layouts.admin')

@section('title')
    Agregar producto
@endsection

@section('h1')
    Agregar producto
@endsection

@section('action')
    <a href="{{ route( 'admin::products.index' ) }}" class="btn-floating black">
        <i class="material-icons waves-effect waves-light " >view_list</i>
    </a>
@endsection

@section('content')

   @include('admin.general._page-instructions', [
        'title'         =>  '',
        'instructions'  =>  'Llena los campos para crear un nuevo producto'
    ])
    @include('admin.products._form',[
        "form_id"       => 'create_product_form',
        "form_route"    => ['admin::products.store'],
        "form_method"   => 'POST',
        "product_editable" => $product
    ])

@endsection

@section('vue_templates')
    @include('admin.general._cltvo-v-editor-template')
@endsection

@section('vue_store')
@endsection
