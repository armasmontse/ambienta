import R from 'ramda';
import Vue from 'vue';
import {simpleCrud, simpleCrudWithImage, simpleModalCrud} from '../factories/simple-crud-component-makers.js';
import {gMap} from '../components/g-map';
import {numberFilters} from '../mixins/number-filters';
import {sortable} from '../mixins/sortable';
import {multilistSortable} from '../mixins/multilist-sortable';
import {sortableListByClick, sortableOnClickCbs} from '../mixins/sortable-list-by-click';
import {listFilters, isPath, isPathInObjArray, isStringArray} from '../mixins/list-filters';
import {mexicoStatesAndMunicipalities} from '../mixins/mexico-states-and-municipalities';
import {sortByNestedProp, toArray, objTextFilter, tapLog, nonCyclingMoveInArray} from '../../functions/pure';
import {preSelectOption} from '../../functions/dom';
import {makePost, openModal, openModalFromSimpleImageCrud, postWithMaterialNote, checkboxesMethods, openMultiSelect, closeModal} from './helpers/simple-crud-helpers';
import {multiSelect} from '../components/multi-select';
import {addedCheckboxElem, removedCheckboxId, pageSectionsCheckboxUpdateSuccess} from './helpers/pages-simple-crud-helpers';

//categorías de productos
export const categoriesModalCreate = simpleModalCrud('#categories-modal-create-template');
export const categoriesModalEdit = simpleModalCrud('#categories-modal-edit-template',{props:['edit-index']});
export const categories = simpleCrud('#categories-template', {
	data: {
		filters: {
			name: {
				description: 'Nombre',
				filters: [isPath(['label'])]
			}
		}
	},
	mixins: [listFilters],
	methods: {openModal},
	components:{categoriesModalCreate, categoriesModalEdit}});

//tipos de colecciones
export const typesModalCreate = simpleModalCrud('#types-modal-create-template');
export const typesModalEdit = simpleModalCrud('#types-modal-edit-template',{props:['edit-index']});
export const types = simpleCrud('#types-template', {
    data: {
        filters: {
            name: {
                description: 'Nombre',
                filters: [isPath(['label'])]
            }
        }
    },
    mixins: [listFilters],
    methods: {openModal},
    components:{typesModalCreate, typesModalEdit}});

//multiSelect de tipos de colecciones
export const typesMultiSelect = multiSelect('#types-multi-select-template');

//colecciones
export const collections = simpleCrud('#collections-template', {
    data: {
        filters: {
            type: {
				description: 'Título',
				filters: [isPath(['title'])]
			},
			title: {
				description: 'Subtítulo',
				filters: [isPath(['subtitle'])]
			},
			status: {
				description: 'Estatus',
				filters: [isPath(['publish_label'])]
			},
			date: {
				description: 'Fecha',
				filters: [isPath(['publish_format_date'])]
			},
			category: {
				description: 'Tipo',
				filters: [isPath(['implode_types'])]
			}
        }
    },
    mixins: [listFilters],
    methods: {openModal},
    components:{typesModalCreate}});

export const collectionsModalCreate = simpleModalCrud('#collections-modal-create-template',{props:['types'], components:{typesModalCreate}});

//multiSelect de colecciones
export const collectionsMultiSelect = multiSelect('#collections-multi-select-template');


//multiSelect de categorias de productos
export const categoriesMultiSelect = multiSelect('#categories-multi-select-template');

//multiSelect de productos
export const productsMultiSelect = multiSelect('#products-multi-select-template');

//productos
export const products = simpleCrud('#products-template', {
    data: {
        filters: {
            type: {
				description: 'Título',
				filters: [isPath(['title'])]
			},
			title: {
				description: 'Código',
				filters: [isPath(['code'])]
			},
			status: {
				description: 'Estatus',
				filters: [isPath(['publish_label'])]
			},
			date: {
				description: 'Fecha',
				filters: [isPath(['publish_format_date'])]
			},
			category: {
				description: 'Categorías',
				filters: [isPath(['implode_categories'])]
			},
			collection: {
				description: 'Colecciones',
				filters: [isPath(['implode_collections'])]
			}


        }
    },
    mixins: [listFilters]
});

//proyectos
export const projects = simpleCrud('#projects-template', {
    data: {
        filters: {
            title: {
				description: 'Título',
				filters: [isPath(['title'])]
			},
			subtitle: {
				description: 'Subtítulo',
				filters: [isPath(['subtitle'])]
			},
			status: {
				description: 'Estatus',
				filters: [isPath(['publish_label'])]
			},
			date: {
				description: 'Fecha',
				filters: [isPath(['publish_format_date'])]
			},
        }
    },
    mixins: [listFilters]
});

//moodboard
export const moodboards = simpleCrud('#moodboards-template', {
    data: {
        filters: {
            title: {
				description: 'Título',
				filters: [isPath(['title'])]
			},
			status: {
				description: 'Estatus',
				filters: [isPath(['publish_label'])]
			},
			date: {
				description: 'Fecha',
				filters: [isPath(['publish_format_date'])]
			},
        }
    },
    mixins: [listFilters]
});

//Prensa
export const press = simpleCrud('#press-template', {
    data: {
        filters: {
        	title: {
				description: 'Título',
				filters: [isPath(['title'])]
			},
			status: {
				description: 'Estatus',
				filters: [isPath(['publish_label'])]
			},
			date: {
				description: 'Fecha',
				filters: [isPath(['publish_format_date'])]
			},
        }
    },
    mixins: [listFilters]
});
