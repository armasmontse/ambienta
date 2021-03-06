<?php

use Illuminate\Console\Command;
use App\Models\Pages\Sections\Section;
use App\Models\Pages\Page;

class AssociatePageSectionPageSet extends CltvoSet {

	/* Etiqueta a desplegarse par ainformar final */
	protected $label =  "Associate pages sections and pages";

	/* Nombre de la clase a ser sembrada */
	protected function CltvoGetModelClass() {
		return "";
	}

	/* Valores a ser introducidos en la base */
	protected function CltvoGetItems() {
		return [
			['page' => 'main', // index de pagina
				'sections' => [
					//'home-slider',
					'home-links',
					'home-newhome'
				]
			],
			['page' => 'about', // index de pagina
				'sections' => [
					//'about-slider',
					//'about-content'
					'about-newslider',
					'about-newcontent'
				]
			],
			['page' => 'press', // index de pagina
				'sections' => [
					'press-links'
				]
			],
			['page' => 'showroom', // index de pagina
				'sections' => [
					'showroom-intro',
					'showroom-form'
				]
			],
			['page' => 'privacy-policy', // index de pagina
				'sections' => [
					'privacy-policy-content',
				]
			]
		];
	}

	/**
	 * metodo de introduccion de valores
	 * @param array   $model_args argumentos que definiran el
	 * @param Command $comand	 comando actual
	 */
	protected function CltvoSower(array $model_args, Command $comand) {
		$page = Page::where(["index"=> $model_args["page"]])->get()->first();
		if (!$page) {
			$comand->error($model_args["page"]." page not exist.");
			return ;
		}
		foreach ($model_args["sections"] as $section_index) {
			$section = Section::where(["index"=> $section_index])->get()->first();
			if (!$section) {
				$comand->error($section_index." section not exist.");
				return ;
			}
			$this->AssociateSectionAndPage($page,$section,$comand);
		}
	}

	protected function AssociateSectionAndPage(Page $page, Section $section,Command $comand) {
		if (!$page->sections()->get()->find($section)) {
			if ($page->sections()->save($section)) {
				$comand->line('<info>'.$section->label.':</info>'." successfully associated with ".$page->label.".");
			} else {
				$comand->line('<error>'.$section->label.':</error>'." not successfully associated with ".$page->label.".");
			}
		} else {
			$comand->line('<comment>'.$section->label.':</comment>'." previously associate with ".$page->label.".");
		}
	}

}
