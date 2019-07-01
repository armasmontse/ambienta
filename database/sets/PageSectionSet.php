<?php


use Illuminate\Console\Command;

use App\Models\Pages\Sections\Section;
use App\Models\Pages\Sections\Type;

class PageSectionSet extends CltvoSet
{
	/**
	 * Etiqueta a desplegarse par ainformar final
	 */
	protected $label =  "Secciones de páginas";

	/**
	 * etiqueta del display del modelo
	 * @var string
	 */
	protected $model_label =  "index";



	/**
	 * nombre de la clase a ser sembrada
	 */
	protected function CltvoGetModelClass(){
		return Section::class;
	}

	/**
	 * valores a ser introducidos en la base
	 */

	protected function CltvoGetItems(){
		$types = Type::get();

		$fija = $types->where("protected",false)
			->where("unlimited",false)
			->where("sortable",false)
			->first();
		$ilimitada = $types->where('protected', false)
			->where('unlimited', true)
			->where('sortable', true)
			->first();

		$limitada = $types->where('protected', false)
			->where('unlimited', false)
			->where('sortable', true)
			->first();

		$especial = $types->where('protected', true)
			->where('unlimited', false)
			->where('sortable', false)
			->first();

		return [

			//HOME
			[
				'index'				=> 'home-slider',
				'template_path'		=> 'home.slider',
				'components_max'	=>  null,
				'type_id'			=> $ilimitada->id,
				'editable_contents'	=> [
					'thumbnail_img'	=> true,
				],
				'description'		=> ''
			],
			[
				'index'				=> 'home-newhome',
				'template_path'		=> 'home.newhome',
				'components_max'	=>  1,
				'type_id'			=> $fija->id,
				'editable_contents'	=> [
					'gallery_img'	=> true,
					'content'		=> true
				],
				'description'		=> ''
			],
			[
				'index'				=> 'home-links',
				'template_path'		=> 'home.links',
				'components_max'	=>  6,
				'type_id'			=> $limitada->id,
				'editable_contents'	=> [
					'title'			=> true,
					'subtitle'		=> true,
					'link'			=> true,
					'thumbnail_img'	=> true
				],
				'description'		=> '- Imagen: representativa de cada sección del sitio <br/> - Título: nombre de cada sección <br/> - Subtítulo: breve descripción de cada sección <br/> - Título del link: no aparecerá en ningún lugar <br/> - Link: URL de la sección'
			],

			//SOMOS
			[
				'index'				=> 'about-newcontent',
				'template_path'		=> 'about.newcontent',
				'components_max'	=>  1,
				'type_id'			=> $fija->id,
				'editable_contents'	=> [
					'title'			=> true,
					'thumbnail_img'=> true,
					'content'		=> true
				],
				'description'		=> '- Imagen <br/> - Título <br/> - Contenido: descripción acerca de la sección' // debe ser un tml que se va a mostrar a los usuarios como intrucciones
			],

			[
				'index'				=> 'about-newslider',
				'template_path'		=> 'about.newslider',
				'components_max'	=>  1,
				'type_id'			=> $fija->id,
				'editable_contents'	=> [
					'content'		=> true,
					'excerpt'		=> true,
					'gallery_img'	=> true
				],
				'description'		=> '- Galería de imágenes: imágenes que apareceran en dos columnas <br/> - Extracto: contenido que aparecerá arriba de las imágenes <br/> - Contenido: descripción contenido que aparecerá abajo de las imágenes' // debe ser un tml que se va a mostrar a los usuarios como intrucciones
			],

			//PRENSA
			[
				'index'				=> 'press-links',
				'template_path'		=> 'press.links',
				'components_max'	=>  null,
				'type_id'			=> $ilimitada->id,
				'editable_contents'	=> [
					'link'			=> true
				],
				'description'		=> '- Título del link: nombre que aparecerá en la sección de prensa <br/> - Link: URL del sitio' // debe ser un tml que se va a mostrar a los usuarios como intrucciones
			],

			//SHOWROOM
			[
				'index'				=> 'showroom-intro',
				'template_path'		=> 'showroom.intro',
				'components_max'	=>  1,
				'type_id'			=> $fija->id,
				'editable_contents'	=> [
					'title'			=> true,
					'content'		=> true
				],
				'description'		=> '- Título <br/> - Contenido: descripción acerca de la sección' // debe ser un tml que se va a mostrar a los usuarios como intrucciones
			],
			[
				'index'				=> 'showroom-form',
				'template_path'		=> 'showroom.form',
				'components_max'	=>  null,
				'type_id'			=> $especial->id,
				'editable_contents'	=> [],
				'description'		=> '' // debe ser un tml que se va a mostrar a los usuarios como intrucciones
			],
			[
				'index'             => 'privacy-policy-content',
				'template_path'     => 'privacy-policy.content',
				'components_max'    =>   1,
				'type_id'           => $fija->id,
				'editable_contents' => [
					'title'			=> true,
					'content'       => true,
				],
				'description'       =>' - Título: Aviso de Privacidad <br/> - Contenido: texto del aviso de privacidad'
			],
		];
	}
	/**
	 * metodo de introduccion de valores
	 * @param array   $model_args argumentos que definiran el
	 * @param Command $comand	 comando actual
	 */
	protected function CltvoSower(array $model_args, Command $comand){

		$model_class = $this->CltvoGetModelClass();

		$model = $model_class::where(['index'	=>	$model_args['index']])->get()->first();

		if(!$model){
				$model = $model_class::create($model_args);
			if ($model) {
				try {
					$componets = $model->all_components;
				} catch (Exception $e) {
					$comand->error('<error>'.$model_args[$this->model_label].':</error>'." components not successfully set.");
				}
				$comand->line(  '<info>'.$model_args[$this->model_label].':</info>'." successfully set.");
			}else{
				$comand->error('<error>'.$model_args[$this->model_label].':</error>'." not successfully set.");
			}
		}else {
			$comand->line('<comment>'.$model_args[$this->model_label].':</comment>'." previously set.");
		}
	}

}
