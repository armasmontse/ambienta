<?php

namespace App\Models\Press;

use App\Models\Traits\PhotoableTrait;
use App\Models\Traits\PublishableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Press extends Model
{
    use PublishableTrait;
    use PhotoableTrait;

  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'press';

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
        'title',
        'content',
        'publish_id',
        'publish_at',
        'content_type',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'publish_label',
		'publish_format_date',
		'edit_url',
		'public_url',
		'thumbnail_image',
        'path'
    ];

    public static $image_uses = [
        'thumbnail',
    ];

    public static $image_galleries = [
    ];

    const PDF_TYPE = 'PDF';
    const LINK_TYPE = 'Link';
    const IMAGE_TYPE = 'Image';
    const STORAGE_PATH_PDF = "public/files/pdf";


    /**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getEditUrlAttribute()
	{
		return route('admin::press.edit',[
			'press' => $this->id
		]);
	}

	/**
	 * Get the administrator flag for the user.
	 *
	 * @return bool
	 */
	public function getPublicUrlAttribute()
	{
		return $this->slug ? route('client::press.show',[
			'public_press' => $this->id
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

    public function getPathAttribute(){
        return ($this->content_type == static::PDF_TYPE) ? asset(Storage::url($this->content)) : null;
    }

    public static function getContentTypes(){
    	return [
            static::PDF_TYPE => static::PDF_TYPE,
            static::LINK_TYPE => static::LINK_TYPE,
    		static::IMAGE_TYPE => static::IMAGE_TYPE,
    	];
    }
}

