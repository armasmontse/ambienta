<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Language;
use Auth;

use URL;

abstract class Request extends FormRequest
{
    protected $languages_isos;
    protected $user;
    protected $redirect;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->languages_isos = Language::getLanguagesIso();
        $this->user = Auth::user();
        $this->redirect = URL::previous();
        parent::__construct();
    }

}
