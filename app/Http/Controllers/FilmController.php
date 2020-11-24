<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilmRequest;
use App\Services\FilmPoster\FilmPoster;

class FilmController extends Controller
{
    private $poster;

    public function __construct(FilmPoster $poster)
    {
        $this->poster = $poster;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('frontend.film.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.film.film_create', [
            'categories' => $categories = Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request)
    {
        $data = $request->except('_token', 'category');
        $data['img'] = $this->poster->getPoster($request);
        $data['publish'] = 0;
        $categories = $request->category;

        $film = Film::create($data);

        $film->categories()->attach($categories);

        return redirect()->route('films.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('frontend.film.film_update', [
            'film' => $film,
            'categories' => $categories = Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFilmRequest $request, Film $film)
    {
        $data = $request->except('_token', '_method' ,'category');
        $data['img'] = $this->poster->updatePoster($request, $film);
        $data['publish'] = 0;
        $categories = $request->category;

        $film->categories()->detach();
        $film->update($data);
        $film->categories()->attach($categories);

        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     *  @throws \Exception
     */
    public function destroy(Film $film)
    {
        $film->categories()->detach();
        $film->delete();

        return redirect()->route('films.index');
    }

    public function filmPublish(Film $film)
    {
        return $film->update(['publish' => 1]);
    }

    public function filmUnPublish(Film $film)
    {
        return $film->update(['publish' => 0]);
    }

}
