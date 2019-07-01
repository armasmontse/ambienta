<?php

namespace App\Http\Controllers\Client\Moodboards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Moodboards\Moodboard;

class MoodboardsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = [
            'moodboards' => Moodboard::with('languages', 'photos', 'publish')->get(),
		];
        return view("client.moodboards.index",$data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($public_moodboard)
    {
		$data = [
			"public_moodboard" => $public_moodboard,
		];
        return view("client.moodboards.show",$data);
    }
}
