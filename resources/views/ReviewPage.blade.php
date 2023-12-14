@extends('Header')


@section('container')
<link rel="stylesheet" href="/ReviewPage.css">
    <div class = "cardContainer">
     <div class="card mb-3" style="">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/img/Poster.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <hr class="Little-orangeline">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="orange-line"></div>


    <div class="bottom-card">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="orange-line"></div>

    <div class="review-box">
        <div class="review-header">
          <h2>Customer Review</h2>
          <p>Rating: 4.5/5</p>
        </div>
        <div class="review-content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dolorum eius nostrum. Nobis dolorum obcaecati animi facilis minus rerum non nam quasi. Quibusdam ullam itaque reprehenderit reiciendis sed, magnam eos at mollitia exercitationem unde quae voluptates veniam quos delectus soluta maiores esse cupiditate nemo incidunt, consequuntur rerum laudantium harum? Consequuntur.
        </p>
        </div>
        <div class="review-author">
          <p>- John Doe</p>
        </div>
      </div>

@endsection
