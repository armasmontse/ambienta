<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;
use App\Models\Traits\PublishableTrait;
use App\Models\Traits\PhotoableTrait;
use App\Models\Traits\SeoableTrait;

use App\Models\Traits\Products\UniqueCodeTrait;

use App\Models\Collections\Collection;

use App\Contracts\SeoContract;

class Product extends Model
{
    use UniqueCodeTrait;
  	use TranslationTrait;
    use UniqueTranslatableSlugTrait;
    use PublishableTrait;
    use PhotoableTrait;
    use SeoableTrait;

  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'language_product';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'publish',
        'categories',
		'collections',
		'products',
		'languages',
		'photos'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publish_id',
        'publish_at',
		'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'publish_id'    => 'integer',
    	'code'  		=> 'string'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
      'publish_at',
  ];

    protected  $translatable = [
        'title',
        'slug',
    	'description'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [

        'title',
        'slug',
    	'description',

        'thumbnail_image',
        'gallery_images',

		'implode_categories',
        'categories_ids',

        'implode_collections',
        'collections_ids',

		// 'implode_products',
		'products_ids',

        'publish_label',
		'publish_format_date',

		'edit_url',
		'public_url'
    ];

    public static $image_uses = [
        'thumbnail',
        'gallery'
    ];

    public static $image_galleries = [
        'gallery'
    ];

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getGalleryImagesAttribute()
    {
        return $this->getPhotosTo(["use"=>"gallery"]);
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getTitleAttribute()
    {
        return $this->translation()->title;
    }

  /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getDescriptionAttribute()
    {
        return $this->translation()->description;
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getSlugAttribute()
    {
        return $this->translation()->slug;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

	public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getImplodeCategoriesAttribute()
	{
		return $this->categories->pluck('label')->implode(', ');
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getCategoriesIdsAttribute()
	{
		return $this->categories->pluck('id');
	}


    /**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getImplodeCollectionsAttribute()
	{
		return $this->collections->pluck('title')->implode(', ');
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getCollectionsIdsAttribute()
	{
		return $this->collections->pluck('id');
	}

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function products()
    {
        return $this->belongsToMany(static::class, 'product_product', 'product_id', 'related_id');
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function related()
    {
        return $this->belongsToMany(static::class, 'product_product', 'related_id', 'product_id');
    }

    public function productsRelatedTo()
    {
        $user = auth()->user();

        $products = $this->products();

        if (!$user || !$user->hasPermission("manage_products") ) {
            $products = $products->published();
        }

        return $products->get();
    }

    public function productsRelatedIn()
    {
        $user = auth()->user();

        $products = $this->related();

        if (!$user || !$user->hasPermission("manage_products") ) {
            $products = $products->published();
        }

        return $products->get();
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getRelatedProducts()
    {
        return $this->productsRelatedTo()->merge($this->productsRelatedIn());
    }

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getImplodeProductsAttribute()
	{
		return $this->products->pluck('title')->implode(', ');
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getProductsIdsAttribute()
	{
		return $this->products->pluck('id');
	}


	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getEditUrlAttribute()
	{
		return route('admin::products.edit',[
			'product' => $this->id
		]);
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getPublicUrlAttribute()
	{
		return $this->slug ? route('client::products.show',[
			'public_product' => $this->slug
		]) : null;
	}

    public function isDeletable()
    {
        $total = 0;
        // $total += $this->related->count();
        return $total == 0;
    }

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getColLabelName()
	{
		return 'title';
	}

    public function getPublicRouteName()
    {
        return 'client::products.show';
    }

    public function getPublicParameters()
    {
        return [
            'public_product' => $this->slug,
        ];
    }
}
