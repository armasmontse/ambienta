<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Setting\MailsTrait;
use App\Models\Traits\Setting\SocialNetworksTrait;

class Setting extends Model
{

	use MailsTrait;
	use SocialNetworksTrait;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    public $primaryKey  = 'key';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key','value'
    ];

    protected $casts = [
        'value' => 'array',
    ];

    protected $attributes = [
        'value' => '',
    ];

    /**
    * Scope a query to get element by key
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public static function getSetting($key)
    {
        return static::firstOrCreate([
			'key' => $key
		]);
	}

	/**
	* Get the footer contact info
	*
	* @return array[] with urls,
	*/
	public static function getContact()
	{
		return setting('contact');
	}

    /**
    * Get the footer contact info
    *
    * @return array[] with urls,
    */
    public static function getDescription()
    {
        return setting('description');
    }

    public static function getEmail(){
        //return 'hola@ambienta.com.mx';
		return setting('mail');
    }
}
