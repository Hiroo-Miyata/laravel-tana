<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;

    public function __construct(Project $)
    {
        $this->repository = new Repository($task);
    }

    public function index()
    {
        $goods = Good::all();
        return response()->json($tasks)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $params = $request->validate([
          'image' => 'required|file|image|max:4000',
      ]);

      $file = $params['image'];
      $fileContents = file_get_contents($file->getRealPath());

      $disk = Storage::disk('s3');
      $path = $disk->put('images/'.$file->hashName(), $fileContents, 'public');
      $url = Storage::disk('s3')->url('images/'.$file->hashName());
      Good::create([
          'height' => 100,
          'width' => 50,
          'price' => 200,
          'image' => $url,
      ]);
      return redirect()->action('GoodController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
    }
}
