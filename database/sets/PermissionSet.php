<?php

use Illuminate\Console\Command;

class PermissionSet extends CltvoSet
{
    /**
     *  Etiqueta a desplegarse para informar al final
     */
    protected $label = 'permissions';

    /**
     *  Nombre de la clase a ser sembrada
     */
    protected function CltvoGetModelClass()
    {
        return 'App\Models\Users\Permission';
    }

    /**
     *  Valores a ser introducidos en la base
     */
    protected function CltvoGetItems()
    {
        return [
            [
                'slug'  => 'admin_access',
                'label' => 'Acceso al admin'
            ],
            [
                'slug'  => 'system_config',
                'label' => 'Configuración del sistema'
            ],
            [
                'slug'  => 'manage_users',
                'label' => 'Manejo de usuarios'
            ],
            [
                'slug'  => 'manage_photos',
                'label' => 'Manejo de imágenes'
            ],
            [
                'slug'  => 'associate_photos',
                'label' => 'Asociar imágenes'
            ],
            [
                'slug'  => 'photos_view',
                'label' => 'Ver imagenes'
            ],
            [
                'slug'  => 'routes_view',
                'label' => 'Ver rutas'
            ],
            [
                'slug'  => 'manage_pages',
                'label' => 'Manejo de páginas'
            ],
            [
                'slug'  => 'manage_pages_contents',
                'label' => 'Manejo del contenido de las páginas'
            ],
            [
                'slug'  => 'manage_seo_booster',
                'label' => 'Manejo del Seo Booster'
            ],
			[
				'slug'  => 'manage_categories',
				'label' => 'Manejo de categorias de productos'
			],
            [
                'slug'  => 'manage_types',
                'label' => 'Manejo de tipos de colecciones'
            ],
            [
                'slug'  => 'manage_collections',
                'label' => 'Manejo de colecciones'
            ],
            [
                'slug'  => 'manage_products',
                'label' => 'Manejo de productos'
            ],
            [
                'slug'  => 'manage_projects',
                'label' => 'Manejo de proyectos'
            ],
            [
                'slug'  => 'manage_moodboards',
                'label' => 'Manejo de Moodboards'
            ],
            [
                'slug'  => 'manage_press',
                'label' => 'Manejo de Prensa'
            ],
        ];
    }
}
