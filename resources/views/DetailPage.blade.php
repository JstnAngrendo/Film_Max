@extends('Header')


@section('container')
<div class="container mt-7 rounded-start" style="width: 100%;">
  <div class="card mb-3" style="width: 100%;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="/img/Poster.jpg" class="img-fluid  w-100" style="height: 500px; object-fit: cover;max-height:500px;" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card text-bg-dark">
          <img src="/img/Trailer.jpg" class="card-img" style="height: 500px; object-fit: cover;max-height:500px;" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small>Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class = "d-flex flex-row justify-content-between">
    <div>
    <button type="button" class="btn btn-outline-secondary">Animation</button>
    <button type="button" class="btn btn-outline-secondary">Adventure</button>
    <button type="button" class="btn btn-outline-secondary">Comedy</button>
    </div>
    <div class = "d-flex flex-row">
        <h2 class= "U-Rating"> User Rating </h2>
        <h2 class= "U-Rating"> 8.0/10 </h2>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12.0001 17.27L16.1501 19.78C16.9101 20.24 17.8401 19.56 17.6401 18.7L16.5401 13.98L20.2101 10.8C20.8801 10.22 20.5201 9.12001 19.6401 9.05001L14.8101 8.64001L12.9201 4.18001C12.5801 3.37001 11.4201 3.37001 11.0801 4.18001L9.19007 8.63001L4.36007 9.04001C3.48007 9.11001 3.12007 10.21 3.79007 10.79L7.46007 13.97L6.36007 18.69C6.16007 19.55 7.09007 20.23 7.85007 19.77L12.0001 17.27Z" fill="#F5C625"/>
        </svg>
    </div>
</div>

<div class = Synopsis-Container>
    <h1 class = "U-Rating"> Synopsis </h1>
</div>
<div class="orange-line"></div>
<div>
    <p class="U-Rating">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolorum eius nostrum. Nobis dolorum obcaecati animi facilis minus rerum non nam quasi. Quibusdam ullam itaque reprehenderit reiciendis sed, magnam eos at mollitia exercitationem unde quae voluptates veniam quos delectus soluta maiores esse cupiditate nemo incidunt, consequuntur rerum laudantium harum? Consequuntur.
    </p>
</div>
<div class = Credits>
    <h1 class = "U-Rating"> Credits </h1>
</div>
<div class="orange-line"></div>

<div class="credits-card d-flex">
    <div class="card " style="width: 25rem;">
        <img src="/img/Poster.jpg" class="card-img-top" alt="..." style="max-height: 200px; object-fit =cover">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card " style="width: 25rem;margin-left : 240px">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 25rem;margin-left : 240px">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

<div style="mt-5">
    <h1 class = "U-Rating">User Reviews</h1>
</div>

<div class="orange-line"></div>
<div class="Review-Card">
<div class="card">
    <div class="card-body">
        <div class = "d-flex flex-row">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12.0001 17.27L16.1501 19.78C16.9101 20.24 17.8401 19.56 17.6401 18.7L16.5401 13.98L20.2101 10.8C20.8801 10.22 20.5201 9.12001 19.6401 9.05001L14.8101 8.64001L12.9201 4.18001C12.5801 3.37001 11.4201 3.37001 11.0801 4.18001L9.19007 8.63001L4.36007 9.04001C3.48007 9.11001 3.12007 10.21 3.79007 10.79L7.46007 13.97L6.36007 18.69C6.16007 19.55 7.09007 20.23 7.85007 19.77L12.0001 17.27Z" fill="#F5C625"/>
        </svg>
        <h5> 8.0/10 <h5>
        </div>
      <h5 class="card-title">Shaun the Sheep a good film for the family</h5>
      <div class = "d-flex flex-row">
        <h6 class = "Reviewers-name"> kucing1221 </h6>
        <h6 class = "Reviewers-date" style = "margin-left : 10px"> 11 December 2021</h6>
      </div>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
</div>
<div class="Review-Card">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="Review-Card">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="Review-Card">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
<div>
@endsection

