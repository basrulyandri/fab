<?php
namespace App\Traits;

trait Translatable {
	public function trans($field)
    {
        //dd(config('app.fallback_locale'));
        if(\LaravelLocalization::getCurrentLocale() == config('app.fallback_locale')){
            return $this->{$field};
        }

        $translation = $this->translation()->whereTableName($this->table)->whereFieldName($field)->whereLanguageCode(\LaravelLocalization::getCurrentLocale())->first();
        if(!$translation){
            return $this->{$field};
        }

        return $translation->content;

    }
}