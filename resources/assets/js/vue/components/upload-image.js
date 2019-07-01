import R from 'ramda';
import {crudAjax} from '../mixins/crud-ajax';
import {toArray} from '../../functions/pure';

var Vue = require('vue');
var VueResource = Vue.use(require('vue-resource'));

export var uploadImage= Vue.component('upload-image',{
	template: '#upload-image-template',
	props: [
		'object',
		'type',
		'use',
		'order',
		'class',
	],
	mixins: [crudAjax],

	methods: {//IO

		onAddedFile(form_to_be_appended_selector, event) {

			let file = event.target;
			let input_clone = file.cloneNode(true);
			file.setAttribute('form', 'addimage_form')
			let form = document.getElementById(form_to_be_appended_selector);
			let input_container = document.getElementById('addimage_form-main-input');
			input_container.innerHTML='';
			input_container.appendChild(file);
			this.post(form);

			//puesto que movimos el input de lugar, ahora pasamos una copia a donde deberia estar
			let parents = toArray(document.querySelectorAll('.upload-image_JS')) //aquellos nodos que pueden tener un input tipo file para las imagenes
			parents.forEach(parent => {
				let child = parent.querySelectorAll('.upload-image-file_JS')
				if (child.length === 0) {
					parent.appendChild(input_clone);
				}
			})
		},

		onAddimageSuccess(body) {
			this.onUpdate(body);
		},

		onRemoveimageSuccess(body){
			this.onUpdate(body);
		},

		onUpdate(body) {
			this.object = body.data;
		},

	},

	events: {
	}
});
