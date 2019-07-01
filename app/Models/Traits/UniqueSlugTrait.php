<?php

namespace App\Models\Traits;

trait UniqueSlugTrait
{
    /**
     * genera un nombre de usuario unico a partir del nombre y apellido
     * @param  string $name     nombre
     * @return string           slug
     */
    public static function generateUniqueSlug($name)
    {
        $slug = str_slug(trim($name));
        $not_unique_slug = true;
        $gluter = "-";

        while ($not_unique_slug) {
            if (!static::slugExist($slug)) {
                $not_unique_slug = false;
            }else {
                $slug .= $gluter.rand(0,9);
            }
            $gluter = "";
        }

        return $slug;
    }

    public static function slugExist($slug)
    {
        return static::getModelBySlug($slug)->count() > 0;
    }

    public function scopeGetModelBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public static function getObjectBySlug($slug)
    {
        $models = static::getModelBySlug($slug)->get();
        return $models->count() > 0 ? $models->first() : null;
    }

    public function updateUniqueSlug( $new_name )
    {
        if (trim(strtolower($new_name))  == trim(strtolower($this->label)) ) {
            return $this->slug;
        }

        return static::generateUniqueSlug($new_name);
    }
}
