<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

use function Pest\Laravel\get;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Inertia::render('Index', [
        'foods' => Food::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $fileName = $request->input('name') . '.jpeg';

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('public/images', $fileName);
        }

        Food::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
        ]);

        return Redirect::route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return Inertia::render('Detail', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $data = $request->validated();

        $oldFile = 'public/images/' . $food->name . '.jpeg';
        $newFile = 'public/images/' . $request->input('name') . '.jpeg';

        $food->update($data);

        Storage::move($oldFile, $newFile);

        return Redirect::route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();

        if (Storage::delete('public/images/' . $food->name . '.jpeg')) {
            return Redirect::route('index');
        }


    }
}
