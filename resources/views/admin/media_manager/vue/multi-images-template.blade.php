<script type="x/templates" id="multi-images-template">
	<div>

		<div class="row">
			<div class="col s12">
				<h5 class="center-align">@{{title || 'Galería'}}</h5>
			</div>
		</div>

		<div class="">
			<div class="row" >
				<div class="" v-sortable="{onUpdate: onUpdate, onMove: onMove, group: label}">
					<div v-for="image in images" class='multiimages-image clear-image' style="width: 25%;float: left;">
						<single-image
							:ref-path="refPath.concat($index)"
							:index="$index"
							:parent-ref="ref"
							:type="type"
							:photoable-id="photoableId"
							:photoable-type="photoableType"
							:use="use"
							:class="class"
							:current-image="image"
							:default-order="defaultOrder"
							>
							<div slot="remove" class="media-manager__link">
								<a class="button__as-link" v-on:click.stop="remove($index)">Remover</a>
							</div>
						</single-image>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s10 ">
				<div class="black white-text media-manager__add-btn flex-collapsible space-between add__btn mt-5" v-on:click="addSingleImageComponent">
					<span class="icon-plus fa fa-plus"></span>
					<span class="icon-text-plus">Agregar</span>
				</div>
			</div>
		</div>

		{!! Form::open([
			'method' => 'PATCH',
			'route' => ['admin::photos.ajax.sort'],
			'role' => 'form' ,
			':id' => " 'sort-multi-images_'+printable_ref+'_form' ",
			'class'	=> '',
			'style' => 'max-width: 200px; margin-left: auto;',
			'v-on:submit.prevent'	=> 'postOrders'
			]) !!}

			{!! Form::submit('Guardar Orden', ['class' => 'btn btn-primary button black', ':form'=> "'sort-multi-images_'+printable_ref+'_form'"]) !!}

			    <input type="hidden" :form="'sort-multi-images_'+printable_ref+'_form'" name="photos[]" :value="id" v-for="id in ordered_ids">

			{!! Form::hidden("class", null, [
				'required' => 'required',
				':form' => " 'sort-multi-images_'+printable_ref+'_form' ",
				'v-model' => 'class'
				]) !!}
			{!! Form::hidden("use", null, [
				'required' => 'required',
				':form'	 => " 'sort-multi-images_'+printable_ref+'_form' ",
				'v-model' =>  'use'
				]) !!}
			{!! Form::hidden("photoable_type", null, [
				'required' => 'required',
				':form' => " 'sort-multi-images_'+printable_ref+'_form' ",
				'v-model' =>  'photoableType'
				]) !!}
			{!! Form::hidden("photoable_id", null, [
				'required' => 'required',
				':form' => " 'sort-multi-images_'+printable_ref+'_form' ",
				'v-model' =>  'photoableId'
				]) !!}
		{!! Form::close()!!}

	</div>
</script>
