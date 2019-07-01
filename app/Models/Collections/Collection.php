<?php

namespace App\Models\Collections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;
use App\Models\Traits\PublishableTrait;
use App\Models\Traits\PhotoableTrait;
use App\Models\Traits\SeoableTrait;
use App\Models\Products\Product;

class Collection extends Model
{
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
    protected $table = 'collections';

    /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'collection_language';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'publish',
        'types',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publish_id',
        'publish_at',
		'highlighted',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'publish_id' => 'integer',
        'highlighted' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'publish_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $translatable = [
        'title',
        'slug',
		'subtitle',
        'excerpt',
		'content',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'title',
        'slug',
		'subtitle',
        'excerpt',
		'content',

        'edit_url',
        'public_url',

        'thumbnail_image',

        'implode_types',
        'types_ids',

        'is_publish',
        'publish_label',
        'publish_format_date'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $image_uses = [
        'thumbnail',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $image_galleries = [
    ];


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
    public function getSubtitleAttribute()
    {
        return $this->translation()->subtitle;
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

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getExcerptAttribute()
    {
        return $this->translation()->excerpt;
    }

	/**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getContentAttribute()
    {
        return $this->translation()->content;
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getEditUrlAttribute()
    {
        return route('admin::collections.edit',[
            'collections' => $this->id
        ]);
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getPublicUrlAttribute()
    {
        return $this->slug ? route('client::collections.show',[
            'public_collection' => $this->slug
        ]) : null;
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

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

	public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getImplodeTypesAttribute()
    {
        return $this->types->pluck('label')->implode(', ');
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getTypesIdsAttribute()
    {
        return $this->types->pluck('id');
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getRelatedProducts()
    {
        $related = $this->products();

        if( !($this->user && $this->user->hasPermission('manage_collections')) ){
            $related = $related->published();
        }

        return $related->orderBy('publish_at','DESC')->get();
    }

	public function isDeletable()
	{
		$total = 0;
		$total += $this->products->count();
		return $total == 0;
	}

    public function getPublicRouteName()
    {
        return 'client::collections.show';
    }

    public function getPublicParameters()
    {
        return [
            'public_collection' => $this->slug,
        ];
    }

}
