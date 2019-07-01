<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Principles
Route::get('/', 'Admin\AdminController@index')->name('index');
Route::get('manuals', 'Admin\AdminController@manuals')->name('manuals');

// Mapa de rutas
Route::group(['middleware' => ['permission:routes_view'] ], function(){
    Route::get('site-map', 'Admin\AdminController@siteMap')->name('site_map');
});

// Administrador de settings
Route::group(['middleware' => ['permission:system_config'], 'prefix' => 'settings', 'as' => 'settings.'], function(){

    Route::patch('/collections-pdf', 'Admin\Settings\ManageSettingsController@fileSetting')->name('file_setting');

    Route::resource('/', 'Admin\Settings\ManageSettingsController', [
        'only'          => ['index', 'update'],
        'parameters'    => ['' => 'setting_key']
    ]);

});

// Administrador de copies
Route::group(['middleware' => ['permission:system_config'] ,'prefix' => 'copies', 'as' => 'copies.'], function(){
    Route::resource('/', 'Admin\Settings\ManageCopiesController',
        ['only'         => ['index', 'update'],
        'parameters'    => ['' => 'copy']
    ]);
});

// Administrador de shapes
Route::group(['middleware' => ['permission:system_config'] ,'prefix' => 'shapes', 'as' => 'shapes.'], function(){
    Route::resource('/', 'Admin\Settings\ManageShapesController',
        ['only'         => ['index'],
        'parameters'    => ['' => 'shape']
    ]);
});

// Administrador de Seo Booster
Route::group(['middleware' => ['permission:manage_seo_booster'], 'prefix' => 'seo_booster', 'as' => 'seo_booster.'], function(){
    Route::resource('/', 'Admin\Settings\ManageSeoBoosterController',
        ['only'         => ['index'],
        'parameters'    => ['' => 'seo_booster']
    ]);
});

// Administrador de usuarios
Route::group(['middleware' => ['permission:manage_users'] ,'prefix' => 'users', 'as' => 'users.'], function(){
    Route::resource('/', 'Admin\Users\ManageUserController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update'],
        'parameters'    => ['' => 'user_editable']
    ]);

    Route::resource('/', 'Admin\Users\ManageUserController',
        ['only'         => ['destroy'],
        'parameters'    => ['' => 'erasable_user']
    ]);

    Route::get('trash', 'Admin\Users\ManageUserController@trash')->name('trash');
    Route::patch('trash/{user_trashed}', 'Admin\Users\ManageUserController@recovery')->name('recovery');
});

// Tipos de colecciones
Route::group(['middleware' => ['permission:manage_types'] ,'prefix' => 'types', 'as' => 'types.' ], function(){
    Route::get( '/' , 'Admin\Collections\ManageTypesController@indexView')->name('index');
    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.', 'prefix' => 'ajax'], function() {
        Route::resource('/','Admin\Collections\ManageTypesController',[
            'only'       => ['index','store','update','destroy'],
            'parameters' => ['' => 'type']
        ]);
    });
});

// Administrador de colecciones
Route::group(['middleware' => ['permission:manage_collections'], 'prefix' => 'collections', "as" => "collections."], function(){

    Route::get('/', 'Admin\Collections\ManageCollectionsController@indexView')->name('index');

    Route::resource('/', 'Admin\Collections\ManageCollectionsController', [
        'only'         => [ 'edit', 'update'],
        'parameters'   => ['' => 'collection']
    ]);

    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.'  ,'prefix' => 'ajax' ], function(){
        Route::resource('/', 'Admin\Collections\ManageCollectionsController', [
            'only'         => ['index', 'store', 'destroy'],
            'parameters'   => ['' => 'collection']
        ]);
        Route::patch( '{collection}/types' , 'Admin\Collections\ManageCollectionsController@types')->name('types');
    });

});
// Administrador de proyectos
Route::group(['middleware' => ['permission:manage_projects'] ,'prefix' => 'projects', 'as' => 'projects.'], function(){
    Route::resource('/', 'Admin\Projects\ManageProjectsController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update','destroy'],
        'parameters'    => ['' => 'project']
    ]);

});

// Administrador de moodboards
Route::group(['middleware' => ['permission:manage_moodboards'] ,'prefix' => 'moodboards', 'as' => 'moodboards.'], function(){
    Route::resource('/', 'Admin\Moodboards\ManageMoodboardsController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update','destroy'],
        'parameters'    => ['' => 'moodboard']
    ]);

});

// Administrador de prensa
Route::group(['middleware' => ['permission:manage_press'] ,'prefix' => 'press', 'as' => 'press.'], function(){
    Route::resource('/', 'Admin\Press\ManagePressController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update','destroy'],
        'parameters'    => ['' => 'press']
    ]);

});

    //Administrador de productos
Route::group(['middleware' => ['permission:manage_products'] ,'prefix' => 'products', 'as' => 'products.'], function(){

    Route::get('/', 'Admin\Products\ManageProductsController@indexView')->name('index');

    Route::resource('/', 'Admin\Products\ManageProductsController',
        ['only'         => ['create', 'edit', 'store', 'update'],
        'parameters'    => ['' => 'product']
    ]);

    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.'  ,'prefix' => 'ajax' ], function(){
        Route::resource('/', 'Admin\Products\ManageProductsController',
            ['only'         => ['index','destroy'],
            'parameters'    => ['' => 'product']
        ]);


        Route::patch( '{product}/categories' , 'Admin\Products\ManageProductsController@categories')->name('categories');
        Route::patch( '{product}/collections' , 'Admin\Products\ManageProductsController@collections')->name('collections');
        Route::patch( '{product}/products' , 'Admin\Products\ManageProductsController@products')->name('products');


    });

});

Route::group(['middleware' => ['permission:manage_seo_booster'], 'prefix' => 'seo', 'as' => 'seo.' ], function(){
    Route::patch( '/' , 'Admin\Seo\ManageSeoController@update')->name('update');
});

//product categories
Route::group(['middleware' => ['permission:manage_categories'] , 'prefix' => 'categories', 'as' => 'categories.' ], function(){
    Route::get('/', 'Admin\Products\ManageCategoriesController@indexView')->name('index');
    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.', 'prefix' => 'ajax'], function(){
        Route::resource('/', 'Admin\Products\ManageCategoriesController', [
            'only'          => ['index', 'store','update','destroy'],
            'parameters'    => ['' => 'category']
        ]);
    });
});

// Media Manager
Route::group(['middleware' => ['permission:manage_photos'] ,'prefix' => 'photos', 'as' => 'photos.'], function(){
    Route::group(['middleware' => ['permission:photos_view']], function(){
        Route::get('/', 'Admin\Photos\ManagePhotosController@indexView')->name('index');
    });

    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.'  ,'prefix' => 'ajax'], function(){
        Route::resource('/', 'Admin\Photos\ManagePhotosController',
            ['only'         => ['index', 'edit', 'store', 'update', 'destroy'],
            'parameters'    => ['' => 'photo']
        ]);

        Route::post('{photo}/associate', 'Admin\Photos\ManagePhotosController@associate')->name('associate');
        Route::delete('{photo}/disassociate', 'Admin\Photos\ManagePhotosController@disassociate')->name('disassociate');
        Route::patch('update/sort', 'Admin\Photos\ManagePhotosController@sort')->name('sort');
    });
});

// Páginas
Route::group(['prefix' => 'pages', 'as' => 'pages.'], function(){

    // Rutas para editar el content
    Route::group(['middleware' => ['permission:manage_pages_contents']], function(){
        Route::patch('sort' , 'Admin\Pages\ManagePagesContentsController@sort')->name('sort');
        Route::group(['prefix' => 'contents', 'as' => 'contents.'], function(){

            Route::resource('/', 'Admin\Pages\ManagePagesContentsController', [
                'only'          => ['index', 'edit'],
                'parameters'    => ['' => 'page_edit_content']
            ]);

            Route::resource('/', 'Admin\Pages\ManagePagesController', [
                'only'          => ['update'],
                'parameters'    => ['' => 'page_edit']
            ]);
        });

        Route::group(['prefix' => 'sections', 'as' => 'sections.' ], function(){
            Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.', 'prefix' => 'ajax'], function(){
                Route::group(['prefix' => '{page_section}'], function(){
                    Route::group(['as' => 'components.', 'prefix' => 'components'], function(){
                        Route::patch('sort', 'Admin\Pages\ManagePagesComponentsController@sort')->name('sort');

                        Route::resource('/', 'Admin\Pages\ManagePagesComponentsController', [
                            'only'          => ['store', 'update', 'destroy'],
                            'parameters'    => ['' => 'section_component'],
                        ]);
                    });
                });
            });
        });
    });

    // Rutas para el manejo de paginas
    Route::group(['middleware' => ['permission:manage_pages']], function(){

        // CRUD de paginas
        Route::resource('/', 'Admin\Pages\ManagePagesController',[
            'only'          => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
            'parameters'    => ['' => 'page_edit']
        ]);

        Route::group(['as' => 'sections.'], function(){
            // Para asociar y sortear secciones de una pagina
            Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.', 'prefix' => '{page_edit}/sections'], function(){
                Route::patch('{page_section}/association', 'Admin\Pages\ManagePagesController@sectionAssociation')->name('association');
                Route::patch('sort', 'Admin\Pages\ManagePagesController@sort')->name('sort');
            });

            Route::group(['prefix' => 'sections'], function(){
                Route::get('/', 'Admin\Pages\ManagePagesSectionsController@indexView')->name('index');
                Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.', 'prefix' => 'ajax'], function(){
                    Route::resource('/', 'Admin\Pages\ManagePagesSectionsController', [
                        'only'          => ['index', 'store','update','destroy'],
                        'parameters'    => ['' => 'page_section']
                    ]);
                });
            });
        });
    });
});
