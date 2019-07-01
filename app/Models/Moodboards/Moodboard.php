<?php

namespace App\Models\Moodboards;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\PublishableTrait;
use App\Models\Traits\PhotoableTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;

use App\Models\Moodboards\Moodboard;

class Moodboard extends Model
{
    use TranslationTrait;
    use PublishableTrait;
    use PhotoableTrait;
	use UniqueTranslatableSlugTrait;

  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'moodboards';

    /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'language_moodboard';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'publish',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'publish_id',
        'publish_at',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'publish_id'    => 'integer'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
      'publish_at',
  ];

    protected  $translatable = [
        'title',
		'slug',
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [

        'title',
        'slug',
        'publish_label',
		'publish_format_date',
        'description',
		'edit_url',
		'public_url',

		'thumbnail_image'
    ];

    public static $image_uses = [
        'thumbnail',
    ];

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
    public function getSlugAttribute()
    {
        return $this->translation()->slug;
    }

    /**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getEditUrlAttribute()
	{
		return route('admin::moodboards.edit',[
			'moodboard' => $this->id
		]);
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getPublicUrlAttribute()
	{
		return $this->slug ? route('client::moodboards.show',[
			'public_moodboard' => $this->slug
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

    public function getDescriptionAttribute(){

        return $this->translation()->description;
    }
}
