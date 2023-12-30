@extends('layouts.main')

@section('container')
  <link rel="stylesheet" href="/css/detailPage.css">
  <div class="mt-7 rounded-start" style="width: 100%;">
    <div class="desc">
      <h1 class="text-white">{{ $movie['title'] }}</h1>
      <h4 class="text-white">
        <span class="fs-5 fw-normal">{{ $movie['release_date'] }}</span>
      </h4>
    </div>
    <div class="orange-line"></div>
    <div class="card mb-3 mt-4" style="width: 100%;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{ $movie['poster_path'] }}" class="img-fluid  w-100" style="height: 500px; object-fit: cover;max-height:500px;" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card text-bg-dark">
            @php $trailerDisplayed = false; @endphp
            @if($movie['videos']['results'])
            @foreach($movie['videos']['results'] as $video)
              @if($video['type'] == 'Trailer' && !$trailerDisplayed)
                <iframe class="card-img" style="object-fit: cover; width: 100%; height: 500px;" src="https://www.youtube.com/embed/{{ $video['key'] }}" frameborder="0" allowfullscreen></iframe>
                @php $trailerDisplayed = true; @endphp
              @endif
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class = "d-flex flex-row justify-content-between">
    <div>
      @foreach(explode(', ', $movie['genres']) as $genre)
        <a href="{{ route('movies.byGenre', ['genreName' => $genre]) }}" class="btn btn-outline-secondary">{{ $genre }}</a>
      @endforeach
    </div>

      <div class = "d-flex flex-row">
          <h2 class= "U-Rating fw-normal"> User Rating: </h2>
          <h2 class= "U-Rating fw-light"> {{ $movie['vote_average'] }}</h2>
      </div>
  </div>

  <div class = Synopsis-Container>
      <h1 class = "U-Rating"> Synopsis </h1>
  </div>
  <div class="orange-line"></div>
  <div>
      <p class="U-Rating">{{ $movie['overview'] }}</p>
  </div>
  <div class = Credits>
      <h1 class = "U-Rating"> Credits </h1>
  </div>
  <div class="orange-line"></div>

  <div class="credits-card d-flex gap-4">
    @foreach ($movie['cast'] as $cast)
      <div class="card bg-black bg-gradient" style="width: 25rem;">
        <img src="{{ $cast['profile_path'] }}" class="card-img-top object-fit-cover" alt="..." style="max-height: 200px; object-fit =cover">
        <div class="card-body">
          <h5 class="card-title text-white">{{ $cast['name'] }}</h5>
          <p class="card-text" style="font-color: #D4AF37">{{ $cast['character'] }}</p>
          <a href="{{ route('actors', $cast['id']) }}" class="btn btn-primary">Actors Details</a>
        </div>
      </div>
    @endforeach
  </div>

  <div style="mt-2">
    <h1 class = "U-Rating">User Reviews</h1>
    <div class="orange-line"></div>
    @foreach ($reviews as $review)
    <div class="Review-Card">
      <div class="card bg-black bg-gradient">
        <div class="card-body">
          <h5 class="card-title text-white">{{ $review->reviewTitle }}</h5>
          <div class = "d-flex flex-row text-white">
            <h6 class = "Reviewers-name"> {{ $review->author }} </h6>
            <h6 class = "Reviewers-date text-white" style = "margin-left : 10px">{{ $review->release_date }}</h6>
          </div>
          <p class="card-text ">{{ $review->reviewDesc }}</p>
          <p class="card-text"><small class="text-white">{{ $review->release_date}}</small></p>
        </div>
      </div>
    @endforeach      
  </div>
@endsection
  