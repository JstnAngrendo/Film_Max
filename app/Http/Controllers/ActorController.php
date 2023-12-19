<?php

namespace App\Http\Controllers;


use App\Models\ActorViewModel;
use App\Models\ActorsViewModel;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index($page = 1)
    {
        abort_if($page > 500, 204);
    
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page=' . $page);
    
        $popularActors = $response->json()['results'];
    
        $viewModel = new ActorsViewModel($popularActors, $page);
    
        return view('actors', [
            'popularActors' => $viewModel->getPopularActors(),
            'page' => $viewModel->page,
            'previousPage' => $viewModel->getPreviousPage(),
            'nextPage' => $viewModel->getNextPage(),
        ]);
    }
    private function getTmdbData($url)
    {
        $response = Http::withToken(config('services.tmdb.token'))
            ->get($url);

        return $response->json();
    }

    public function show($id)
{
    $actor = $this->getTmdbData('https://api.themoviedb.org/3/person/' . $id);
    $social = $this->getTmdbData('https://api.themoviedb.org/3/person/' . $id . '/external_ids');
    $credits = $this->getTmdbData('https://api.themoviedb.org/3/person/' . $id . '/combined_credits');

    $viewModel = new ActorViewModel($actor, $social, $credits);

    return view('actordetail', [
        'actor' => $viewModel->actor(),
        'social' => $viewModel->social(),
        'knownForMovies' => $viewModel->knownForMovies(),
        'credits' => $viewModel->credits(),
    ]);
}


}
