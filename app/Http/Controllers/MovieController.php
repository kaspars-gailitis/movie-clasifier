<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Psr7\Request as guzzleRequest;
use GuzzleHttp\Client;
use App\Movies;

class MovieController extends Controller
{
    CONST API_URL = "http://www.omdbapi.com/?i=";

    const API_KEY = "721eeb52";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pageNumber) {
        $movies = Movies::where('id', '>', (10*$pageNumber-1))->take(1)->get();
        return view('home', [
            'movies' => $movies
        ]);
    }

    private function apiRequest($omdbId) {
        $request = new guzzleRequest('POST', MovieController::API_URL.$omdbId."&apikey=".MovieController::API_KEY);
        $client = new Client;
        $response =  $client->send($request);

        //$this->cache->set($cahceKey, (string) $response->getBody(), 300);
        return (string) $response->getBody();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $movie = Movies::findOrFail($id);
        $movie = $this->apiRequest($movie->omdb_id);
        return view('show_movie', [
            'movie' => $movie,
        ]);
    }
}
