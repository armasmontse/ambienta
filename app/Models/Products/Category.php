<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;

class Category extends Model
{
	use TranslationTrait;
	use UniqueTranslatableSlugTrait;


	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

	protected $appends= [
		'label',
		'slug',
		"public_url"
	];

    /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'category_language';

	protected $translatable = [
        'label',
		'slug'
    ];

	protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
		"languages",
        "created_at", //ocultan fechas
        "updated_at",
    ];

	/** * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getLabelAttribute()
	{
		return $this->translation()->label;
	}


	/** * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getSlugAttribute()
	{
		return $this->translation()->slug;
	}


	public function isDeletable()
    {
        $total = 0;
        $total += $this->products->count();
        return $total == 0;
    }

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function getPublicUrlAttribute()
	{
		return route("client::products.categories",["public_type" => $this->slug]);
	}

}
