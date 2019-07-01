<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TranslationTrait;
use App\Models\Traits\UniqueTranslatableSlugTrait;
use App\Models\Traits\PublishableTrait;
use App\Models\Traits\PhotoableTrait;

class Project extends Model
{
	use TranslationTrait;
    use UniqueTranslatableSlugTrait;
    use PublishableTrait;
    use PhotoableTrait;

  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The database table used by language pivot.
     *
     * @var string
     */
    protected $translation_table = 'language_project';

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
        'publish_id',
        'publish_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'publish_id'    => 'integer',
    ];

    protected $dates = [
      'created_at',
      'updated_at',
      'publish_at',
  ];

    protected  $translatable = [
        'title',
        'slug',
		'subtitle',
		'content'
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
		'content',

		'edit_url',
        'public_url',

        'thumbnail_image',
        'gallery_images',

		'publish_label',
		'publish_format_date',

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
	public function getSlugAttribute()
	{
		return $this->translation()->slug;
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
          return route('admin::projects.edit',[
              'project' => $this->id
          ]);
      }

	  /**
	   * Get the administrator flag for the user.
	   *
	   * @return bool
	   */
	  public function getPublicUrlAttribute()
	  {
		  return $this->slug ? route('client::projects.show',[
			  'public_product' => $this->slug
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

}
