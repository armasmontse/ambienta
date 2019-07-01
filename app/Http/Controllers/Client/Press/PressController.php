<?php

namespace App\Http\Controllers\Client\Press;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Press\Press;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = [
            'arrPress' => Press::with('photos', 'publish')->get(),
            'contentPDF' => Press::PDF_TYPE,
            'contentLink' => Press::LINK_TYPE,
            'contentImage' => Press::IMAGE_TYPE,
		];

        return view("client.press.index",$data);

    }
}
