<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    private $validations = [
        "title" => "required|string|min:5|max:100",
        "description" => "required|string",
        "thumb" => "url|max:500",
        "price" => "required|string",
        "series" => "required|string|min:5|max:50",
        "sale_date" => "required|string",
        "type" => "required|string|min:5|max:50",
    ];

    public function index()
    {
        $comics = Comic::paginate(4);
        return view ('comics.index', compact('comics'));
    }

    public function create()
    {
        return view('comics.create');
    }
    
    public function store(Request $request)
    {
        $request->validate($this->validations);

        $data = $request->all();
        
        $newComic = new Comic();
        $newComic->title        = $data['title'];
        $newComic->description  = $data['description'];
        $newComic->thumb        = $data['thumb'];
        $newComic->price        = $data['price'];
        $newComic->series       = $data['series'];
        $newComic->sale_date    = $data['sale_date'];
        $newComic->type         = $data['type'];
        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }
    
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }
    
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }
    
    public function update(Request $request, Comic $comic)
    {
        $request->validate($this->validations);

        $data = $request->all();

        $comic->title           = $data['title'];
        $comic->series          = $data['series'];
        $comic->sale_date       = $data['sale_date'];
        $comic->price           = $data['price'];
        $comic->thumb           = $data['thumb'];
        $comic->type            = $data['type'];
        $comic->description     = $data['description'];
        $comic->update();

        return to_route('comics.show', ['comic' => $comic->id]);
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('delete_success', $comic);
    }


    public function restore($id)
    {
        Comic::withTrashed()->where('id', $id)->restore();

        $comic = Comic::find($id);

        return to_route('comics.index')->with('restore_success', $comic);
        
    }

    public function trashed()
    {
        $trashedComics = Comic::onlyTrashed()->paginate(4);
        return view ('comics.trashed', compact('trashedComics'));
    }

    public function harddelete($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->forceDelete();

        return to_route('comics.trashed')->with('delete_success', $comic);
    }
}
