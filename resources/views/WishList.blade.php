@extends('layouts.main')

@section('container')

<style>
  .lovesvg{
    cursor: pointer;
  }

  .lovesvg:hover{
    fill: black;
  }
</style>

<link rel="stylesheet" href="/css/genre.css">
<h1 class="action">@lang('public.allWishlist')</h1>
<div class="pageline"></div>
  @if(isset($message))
    <h2 class="mt-5" style="color:gray; font-weight:400;">{{ $message }}</h2>
  @else
  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<div class="cards mt-5">
  
    
    @foreach($movies as $movie)
      <div class="card bg-black bg-gradient" style="width: 18rem;">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h6 class="card-title">{{ $movie['title'] }}</h6>
            <p class="card-text"></p>
            <div class="d-flex justify-content-between align-items-start">
                <div class="d-flex flex-row align-items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12.0001 17.27L16.1501 19.78C16.9101 20.24 17.8401 19.56 17.6401 18.7L16.5401 13.98L20.2101 10.8C20.8801 10.22 20.5201 9.12001 19.6401 9.05001L14.8101 8.64001L12.9201 4.18001C12.5801 3.37001 11.4201 3.37001 11.0801 4.18001L9.19007 8.63001L4.36007 9.04001C3.48007 9.11001 3.12007 10.21 3.79007 10.79L7.46007 13.97L6.36007 18.69C6.16007 19.55 7.09007 20.23 7.85007 19.77L12.0001 17.27Z" fill="#F5C625"/>
                    </svg>
                    <h6>{{number_format($movie['vote_average'], 1) }}</h6>
                </div>
                <div>

                    <form action="{{ route('wishlist.delete', ['id' => $movie['id']]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-delete"  style="border:none; background-color:black;" onclick="return confirm('Are you sure you want to delete this item?')">
                           <svg class="lovesvg" xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37" fill="#D4AF37">
                              <path d="M11.2813 2C6.15614 2 2 6.10059 2 11.1597C2 15.2437 3.62422 24.9363 19.6121 34.7344C19.8985 34.9081 20.2273 35 20.5625 35C20.8977 35 21.2265 34.9081 21.5129 34.7344C37.5008 24.9363 39.125 15.2437 39.125 11.1597C39.125 6.10059 34.9689 2 29.8438 2C24.7186 2 20.5625 7.55134 20.5625 7.55134C20.5625 7.55134 16.4064 2 11.2813 2Z" stroke="#C69749" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                      </button>
                  </form>
                </div>
            </div>
            <div class="d-flex justify-content-center">
              <a href="{{ route('DetailPage', $movie['id']) }}" class="btn ">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  @endif
  </div>

@endsection