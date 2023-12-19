@extends('layouts.main')


@section('container')
<link rel="stylesheet" href="/css/main.css">

<div class="popular-movies">
    <h1 style="color: white">Popular Actors</h1>
    <div class="orange-line"></div>
    <div class="cards">
        @foreach ($popularActors as $actor)
            <div class="card movie-card bg-black bg-gradient">
                <a href="{{ route('actors', $actor['id']) }}">
                    <img src="{{ $actor['profile_path'] }}" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150 w-100">
                </a>
                <div class="mt-5 pl-4 pr-4 pt-3 pb-3">
                    <a href="{{ route('actors', $actor['id']) }}" style="text-decoration:none; color:#D4AF37; font-size: 20px;padding:5px;">{{ $actor['name'] }}</a>
                    <div style="padding: 5px;">{{ $actor['known_for'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between mt-12 mb-12 hover:text-[#00eeff]">
        @if ($previousPage)
            <a href="/actors/page/{{ $previousPage }}">Previous</a>
        @else
            <div></div>
        @endif
    
        @if ($nextPage)
            <a href="/actors/page/{{ $nextPage }}">Next</a>
        @else
            <div></div>
        @endif
    </div>
</div>



@endsection