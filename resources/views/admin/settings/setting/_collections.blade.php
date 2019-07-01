<style>
	.file-href {
		display: flex;
		flex-flow: column;
		align-items: center;
		justify-content: center;
		width: 120px;
		height: 120px;
		border-radius: 5px;
		margin: 10px auto;
		border: 1px solid #222222;
	}
	.file-href:hover {
		background-color: #222222;
		color: white;
	}
	.file-href .material-icons{
		margin-bottom: 0.5em;
	}
	.file-href .text{
		font-size: 0.8rem;
	}
</style>

@include('admin.general._page-subtitle', ['title' => trans('manage_settings.collections.pdf.title') ])

@if($setting_collections)
	<div class="row">
		<div class="col s10 offset-s1">
			<a class="file-href" href="{{ Storage::url($setting_collections['path']) }}" target="_blank" style="">
				<i class="material-icons">insert_drive_file</i>
				<span class="text">Abrir PDF</span>
			</a>
		</div>
	</div>
@endif
<div class="row">
	<div class="col s10 offset-s1">
		<form id="file_setting" action="{{ route('admin::settings.file_setting') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="row">
				<div class="input-field col s12 center">
					<input type="file" name="pdf" form="file_setting">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 center">
					<button class="btn waves-effect waves-light black" type="submit" disabled="true" {{--form="file_setting"--}}>Está opción ha sido deshabilitada</button>
				</div>
			</div>
		</form>
	</div>
</div>
