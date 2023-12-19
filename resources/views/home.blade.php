@extends('layouts.main')

@section('container')

<style>
    .svg{
        cursor: pointer;
    }
    .svg:active, .svg:hover{
        fill: #F5C625;
    }
</style>
<link rel="stylesheet" href="/css/main.css">

    @auth
        @if (Auth::user()->isAdmin())
            <a href="{{ route('adminhome') }}">Go to Admin Page</a>
        @endif
    @endauth
    
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->has('movie_id'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first('movie_id') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="popular-movies">
        <h1 style="color: white">Popular Movies</h1>
        <div class="orange-line"></div>
        <div class="cards">
            {{-- <div class="offset-md-1 col-md-10"> --}}
            @foreach ($popularMovies as $popular)
                @if($loop->index < 20)
                    <div class="card movie-card bg-black bg-gradient">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$popular['poster_path'] }}" class="card-img-top" alt="..." style="height: 400px;">
                        <div class="card-body">
                        <h6 class="card-title">{{ $popular['title'] }}</h6>
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex flex-row align-items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12.0001 17.27L16.1501 19.78C16.9101 20.24 17.8401 19.56 17.6401 18.7L16.5401 13.98L20.2101 10.8C20.8801 10.22 20.5201 9.12001 19.6401 9.05001L14.8101 8.64001L12.9201 4.18001C12.5801 3.37001 11.4201 3.37001 11.0801 4.18001L9.19007 8.63001L4.36007 9.04001C3.48007 9.11001 3.12007 10.21 3.79007 10.79L7.46007 13.97L6.36007 18.69C6.16007 19.55 7.09007 20.23 7.85007 19.77L12.0001 17.27Z" fill="#F5C625"/>
                                    </svg>
                                    <h6>{{ number_format($popular['vote_average'], 1) }}</h6>
                                </div>
                                <div>
                                    <form id="wishlistForm" action="{{ route('wishlist.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="movie_id" value="{{ $popular['id'] }}">
                                        <button type="submit" class="submit-btns" style="border:none; background-color:black;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37" fill="none" class="submit-btns">
                                                <path d="M11.2813 2C6.15614 2 2 6.10059 2 11.1597C2 15.2437 3.62422 24.9363 19.6121 34.7344C19.8985 34.9081 20.2273 35 20.5625 35C20.8977 35 21.2265 34.9081 21.5129 34.7344C37.5008 24.9363 39.125 15.2437 39.125 11.1597C39.125 6.10059 34.9689 2 29.8438 2C24.7186 2 20.5625 7.55134 20.5625 7.55134C20.5625 7.55134 16.4064 2 11.2813 2Z" stroke="#C69749" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <a href="{{ route('DetailPage', $popular['id']) }}" class="btn">View Details</a>
                        </div>
                        </div>
                    </div>
               @endif
            @endforeach
        </div>
    </div>
    
    <div class="popular-movies mt-5">
        <h1 style="color: white">Upcoming Movies</h1>
        <div class="orange-line"></div>
        <div class="cards mt-5">
            {{-- <div class="offset-md-1 col-md-10"> --}}
            @foreach ($upcomingMovies as $upcoming)
                @if($loop->index < 20)
                    <div class="card bg-black bg-gradient">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$upcoming['poster_path'] }}" class="card-img-top" alt="..." style="height: 400px;">
                        <div class="card-body">
                        <h6 class="card-title">{{ $upcoming['title'] }}</h6>
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex flex-row align-items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12.0001 17.27L16.1501 19.78C16.9101 20.24 17.8401 19.56 17.6401 18.7L16.5401 13.98L20.2101 10.8C20.8801 10.22 20.5201 9.12001 19.6401 9.05001L14.8101 8.64001L12.9201 4.18001C12.5801 3.37001 11.4201 3.37001 11.0801 4.18001L9.19007 8.63001L4.36007 9.04001C3.48007 9.11001 3.12007 10.21 3.79007 10.79L7.46007 13.97L6.36007 18.69C6.16007 19.55 7.09007 20.23 7.85007 19.77L12.0001 17.27Z" fill="#F5C625"/>
                                    </svg>
                                    <h6>{{ number_format($upcoming['vote_average'], 1) }}</h6>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37" fill="none">
                                        <path d="M11.2813 2C6.15614 2 2 6.10059 2 11.1597C2 15.2437 3.62422 24.9363 19.6121 34.7344C19.8985 34.9081 20.2273 35 20.5625 35C20.8977 35 21.2265 34.9081 21.5129 34.7344C37.5008 24.9363 39.125 15.2437 39.125 11.1597C39.125 6.10059 34.9689 2 29.8438 2C24.7186 2 20.5625 7.55134 20.5625 7.55134C20.5625 7.55134 16.4064 2 11.2813 2Z" stroke="#C69749" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <a href="{{ route('DetailPage', $upcoming['id']) }}" class="btn ">View Details</a>
                        </div>
                        </div>
                    </div>
               @endif
            @endforeach
            {{-- </div> --}}
        </div>
    </div>

    
@endsection