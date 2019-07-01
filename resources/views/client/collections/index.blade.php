@extends('layouts.client')

@section('title')
	Colecciones
@endsection

@section('content')

	{{--@if(setting('collections.pdf'))
		@php
			$url = url(Storage::url(setting('collections.pdf')['path']))
		@endphp

		<style>
			#holder {
				width: 100%;
			}
			#holder canvas{
				width: 100%;
			}
		</style>

		<div class="collections wrap">
			<div id="holder"></div>
		</div>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.550/pdf.js"></script>
		<script>
			var url = {!! json_encode($url) !!}
			// Loaded via <script> tag, create shortcut to access PDF.js exports.
			var pdfjsLib = window['pdfjs-dist/build/pdf'];

			function renderPDF(url, canvasContainer, options) {
				var options = options || { scale: 1 };

				function renderPage(page) {
					var viewport = page.getViewport(options.scale)
					var canvas = document.createElement('canvas')
					var ctx = canvas.getContext('2d')
					var renderContext = {
						canvasContext: ctx,
						viewport: viewport
					};

					canvas.height = viewport.height;
					canvas.width = viewport.width;
					canvasContainer.appendChild(canvas);

					page.render(renderContext);
				}

				function renderPages(pdfDoc) {
					for(var num = 1; num <= pdfDoc.numPages; num++)
						await pdfDoc.getPage(num).then(renderPage)
				}
				pdfjsLib.disableWorker = true
				pdfjsLib.getDocument(url).then(renderPages)
			}

			renderPDF(url, document.getElementById('holder'));
		</script>
	@endif--}}

	@if ($type)
		<div class="wrap">
			<div class="moodboard__title">{{$type->label}}</div>
		</div>
			@endif

			<div class="collections wrap">

		@if ($collection_hili)
			<div class="collections__main">
				<div class="collections__main--img" style="background-image:url({{ $collection_hili->thumbnail_image->url }});">
					<a href="{{ route('client::collections.show',$collection_hili->slug) }}" class="collections__main--head">
						<div class="collections__main--ttl">{{ $collection_hili->title }}</div>
						<div class="collections__main--sub">{{ $collection_hili->subtitle }}</div>
					</a>
				</div>
				<div class="tags">
					@foreach ($collection_hili->types as $type)
						<a href="{{$type->public_url}}" class="tags--item">{{ $type->label }}</a>
					@endforeach
				</div>
				<div class="collections__main--txt">
					<div>{{ $collection_hili->excerpt }}</div>
				</div>
			</div>

			<div class="collections__sidebar">

				@foreach ($collections as $collection)
				<div class="collections__item">
					<div class="collections__item--img" style="background-image:url({{ $collection->thumbnail_image->url }});">
						<a href="{{ route('client::collections.show',$collection->slug)  }}" class="collections__item--ttl">{{ $collection->title }}</a>
					</div>
					@if(!$collection->types->isEmpty())
						<div class="tags">
							@foreach ($collection->types as $type)
								<a href="{{$type->public_url}}"  class="tags--item">{{ $type->label }}</a>
							@endforeach
						</div>
					@else
						<div class="tags">

						</div>
					@endif

				</div>
				@endforeach

			</div>

		@else
			<div class="collections__sidebar collections__sidebar-no-hili">

				@foreach ($collections as $collection)
				<div class="collections__item-no-hili">
					<div class="collections__item--img" style="background-image:url({{ $collection->thumbnail_image->url }});">
						<a href="{{ route('client::collections.show',$collection->slug)  }}" class="collections__item--ttl"></a>
					</div>
					@if(!$collection->types->isEmpty())
						<div class="tags">
							@foreach ($collection->types as $type)
								<a href="{{$type->public_url}}"  class="tags--item">{{ $type->label }}</a>
							@endforeach
						</div>
					@else
						<div class="tags">

						</div>
					@endif

				</div>
				@endforeach

			</div>
		@endif



	</div>



@endsection
