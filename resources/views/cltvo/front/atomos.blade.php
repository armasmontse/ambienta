@extends('layouts.client')
@section('content')
	<style media="screen">
		header, footer, #alert__container {
			display: none;
		}
		body {
			margin: 40px;
		}
	</style>

	<h1 style="font-size: 35px"><b>Átomos de la retícula del producto</b></h1>
	<br>
	<br>

	<div class="">
		Ítems menú categorías
	</div>
	<br>
	<div class="label-category">
		LINGERIE
	</div>

	<br>
	<br>

	<div class="">
		Ítems menú sub-categorías
	</div>
	<br>
	<div class="label-subcategory">
		Romantic
	</div>

	<br>
	<br>

	<div class="">
		información de cada producto en la retícula de productos
	</div>
	<br>
	<div class="label-garments">
		$105.00 USD <br>
		Sateen top with thin straps
	</div>

	<br>
	<br>

	<div class="">
		información de sale y new
	</div>
	<br>
	<div class="label-sale" style="background-color: black;">
		new
	</div>
	<br>
	<div class="label-sale" style="background-color: black;">
		sale
	</div>

	<br>
	<br>

	<div class="">
		Filtros
	</div>
	<br>
	<div class="label-filter">
		Filter by
	</div>

	<br>
	<br>

	<div class="">
		Sub-Filtros
	</div>
	<br>
	<div class="label-subfilters">
		Turquesa
	</div>

	<br>
	<br>

	<h1 style="font-size: 35px"><b>Átomos del footer</b></h1>
	<br>
	<br>

	<div class="">
		Títulos footer
	</div>
	<br>
	<div class="title-footer">
		Follow us
	</div>

	<br>
	<br>

	<div class="">
		Label footer
	</div>
	<br>
	<div class="label-footer">
		Facebook <br>
		Pinterest <br>
		Instagram <br>
		Bosques del Valle No. 111, Col. Bosques del Valle, San Pedro Garza García, Nuevo León CP 6625
		Email: hello@minaci.com                                         Phone: T. +52 (55) 3200 8961
	</div>

	<br>
	<br>

	<div class="">
		Label footer en donde van términos y condiciones y políticas de privacidad
	</div>
	<br>
	<div class="label-footer-politics">
		TERMS & CONDITIONS
	</div>

	<br>
	<br>

	<h1 style="font-size: 35px"><b>Átomos del header</b></h1>
	<br>
	<br>

	<div class="">
		Label header
	</div>
	<br>
	<div class="label-header">
		CONTACT <br>
		whishlist
	</div>

	<br>
	<br>

	<h1 style="font-size: 35px"><b>Átomos de single del producto</b></h1>
	<br>
	<br>

	<div class="">
		Frases de galería en single de producto y firma de about
	</div>
	<br>
	<div class="title-phrase">
		Addiction
	</div>

	<br>
	<br>

	<div class="">
		Títulos del producto en single de producto
	</div>
	<br>
	<div class="title-garment">
		Avril Maillot Rouge
	</div>

	<br>
	<br>

	<div class="">
		Marca del producto en single de producto
	</div>
	<br>
	<div class="label-brand">
		Calvin Klein
	</div>

	<br>
	<br>

	<div class="">
		Precio del producto en single de producto
	</div>
	<br>
	<div class="label-price">
		$570.00 USD
	</div>

	<br>
	<br>

	<div class="">
		Párrafo de descripción de producto en single del producto
	</div>
	<br>
	<div class="paragraph-single">
		Is a cut-to-perfection gown in our heavyweight crepe. Features flattering seaming through the top bust and a dramatic back cut-out.
	</div>

	<br>
	<br>

	<div class="">
		Tallas de producto en single del producto
	</div>
	<br>
	<div class="label-size">
		XS   S    M    L    XL
	</div>
	<br>
	<div class="">
		Tallas de producto en single del producto desactivadas
	</div>
	<br>
	<div class="label-disable-size">
		XS
	</div>

	<br>
	<br>

	<div class="">
		Label wishlist
	</div>
	<br>
	<div class="label-whishlist">
		Add to whishlist
	</div>

	<br>
	<br>

	<div class="">
		Botón agregar a carrito
	</div>
	<br>
	<div class="button-addcart">
		add to carT
	</div>

	<br>
	<br>

	<div class="">
		Subtítulo de productos relacionados
	</div>
	<br>
	<div class="subtitle-garments">
		WE THOUGHT YOU MIGHT LIKE THESE TOO…
	</div>

	<br>
	<br>
	<h1 style="font-size: 35px"><b>Átomos de recuadro que se muestra en tooltip de la bolsa de compra en el header</b></h1>
	<br>
	<br>
	<div class="">
		Títulos del producto en tooltip
	</div>
	<br>
	<div class="title-tooltip-garment">
		Avril Maillot Rouge
	</div>
	<br>
	<br>
	<div class="">
		Detalles de la compra en tooltip
	</div>
	<br>
	<div class="label-tooltip-details">
		Oxford <br>
		XS /3 4 <br>
		x1
	</div>
	<br>
	<br>
	<div class="">
		Precio por producto de la compra en tooltip
	</div>
	<br>
	<div class="label-tooltip-price">
		$344 USD
	</div>

	<br>
	<br>
	<div class="">
		Cantidad total de productos de la compra en tooltip
	</div>
	<br>
	<div class="label-tooltip-total">
		ITEMS <br>
		3 ITEMS <br>
		ITEMS TOTAL
	</div>

	<br>
	<br>
	<div class="">
		Precio total de la compra en tooltip
	</div>
	<br>
	<div class="label-tooltip-totalprice">
		$949.00 USD
	</div>

	<br>
	<br>
	<div class="">
		Botón de checkout en tooltip
	</div>
	<br>
	<div class="button-tooltip">
		checkout
	</div>

	<br>
	<br>
	<div class="">
		Enlace a shopping car en tooltip
	</div>
	<br>
	<div class="label-tooltip-anchor">
		SHOPPING CAR
	</div>

@endsection
