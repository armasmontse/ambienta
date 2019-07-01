<?php

namespace App\Models\Collections;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;

class Type extends Model
{
	use TranslationTrait;
	use UniqueTranslatableSlugTrait;

     /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'language_type';

    protected $translatable = [
        'label',
        'slug'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'types';

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
		'public_url'
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
		"languages",
        "created_at",
        "updated_at",
    ];

	public function isDeletable()
    {
        $total = 0;
        $total += $this->collections->count();
        return $total == 0;
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }


	public function getPublicUrlAttribute()
	{
		return route("client::products.categories",["public_category" => $this->slug]);
	}

}
