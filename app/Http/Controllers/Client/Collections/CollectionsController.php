<?php

namespace App\Http\Controllers\Client\Collections;

use App\Http\Controllers\Controller;
use App\Models\Collections\Collection;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$query =  Collection::with('languages', 'photos', 'publish');

       if( !($this->user && $this->user->hasPermission('manage_collections')) ){
            $query = $query->published();
        }
        
        return $this->indexView($query->orderBy('created_at', 'DESC')->get() );

        //return view('client.collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $public_collection)
    {
		$data = [
			'public_collection' => $public_collection,
            'related' => $public_collection->getRelatedProducts(),
		];

        return view('client.collections.show', $data);
    }

	public function types(Type $public_type)
	{
		$query =  Collection::with('languages', 'photos', 'publish')
			->whereHas('types', function($query) use ($public_type){
				return $query->whereIn("id",[ $public_type->id]);
			});

		if( !($this->user && $this->user->hasPermission('manage_collections')) ){
			$query = $query->published();
		}

		return $this->indexView($query->orderBy('created_at', 'DESC')->get(), $public_type);
	}

	protected function indexView($collections , Type $type = null)
	{
		$data = [
            'collection_hili'   => $collections->where('highlighted', true)->first(),
            'collections'       => $collections->where('highlighted', false), // sin destacado,
			'type'				=> $type
		];

        return view("client.collections.index",$data);
	}

}
