<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FilmMax</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/Header.css">

    <style>

    </style>
  </head>
  <body>
    {{-- @include('partials.navbar') --}}

    <style>
      :root{
        --primary: #D4AF37;
        --background: #000000;
        --white: #ffffff;
      }

      *{
        text-decoration: none;
        margin: 0;
        padding: 0;
      }
      body{
        background-color: var(--background);
      }
      header{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 2rem 7%;
        background: var(--background);
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 100;
      }
      h3,span{
        font-size: 2.5rem;
        font-weight: 600;
        cursor: pointer;
      }
      nav{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 2rem;
      }

      nav a{
        text-decoration: none;
        color: var(--primary);
        font-size: 1.25rem;
          margin-left: 1.9rem;
      transition: 0.3s;
      margin-right: 1.9rem;
      }

      nav a:hover{
        color: var(--white);
      }

      .svg{
        width: 20px;
        height: 20px;
        color: #ffffff80;
      }

      form{
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1rem;
        background-color: var(--white);
        outline:none;
      }

      input{
        padding: 0rem 2rem 0rem 2rem;
        border: none;
        outline: none;
      }

      .searchbar{
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1rem;
        background-color: var(--white);
        padding: 0.3rem 0.5rem;
      }


      .svg{
        color: var(--primary);
      }

      .nav .a{
        font-size: 1.25rem;
      }

      section{
        padding: 10% 9%;
      }

      .U-Rating{
        color:white;
        margin-right: 10px;
      }

      .orange-line {
    width: 50%;
    height: 2px; /* Adjust the height as needed */
    background-color: rgb(255, 166, 0);
}
    .credits-card{
        margin-top: 15px;

    }
    .Review-Card{
        margin-top: 15px;
    }
    .card-body{
    }
    .Reviewers-name{
        color: cyan;
    }
    </style>

<header>
    <div class="logo">
      <h3 style="color: white">Film<span style="color: #D4AF37">Max</span></h3>
    </div>
    <div class="search">
      <form action="">
        <div class="searchbar">
          <svg class="svg"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
          <input type="text"placeholder="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M9 18C13.9235 18 18 13.9147 18 9C18 4.07647 13.9147 0 8.99118 0C4.07647 0 0 4.07647 0 9C0 13.9147 4.08529 18 9 18ZM5.88529 12.8471C5.48823 12.8471 5.16176 12.5118 5.16176 12.1059C5.16176 11.9118 5.24118 11.7353 5.37353 11.5941L7.95882 9.00882L5.37353 6.42353C5.24118 6.28235 5.16176 6.10588 5.16176 5.91176C5.16176 5.50588 5.48823 5.18824 5.88529 5.18824C6.09706 5.18824 6.26471 5.25882 6.39706 5.4L8.99118 7.98529L11.6118 5.39118C11.7618 5.24118 11.9206 5.17059 12.1147 5.17059C12.5118 5.17059 12.8382 5.49706 12.8382 5.89412C12.8382 6.09706 12.7765 6.25588 12.6265 6.41471L10.0324 9.00882L12.6176 11.5853C12.7588 11.7353 12.8294 11.9029 12.8294 12.1059C12.8294 12.5118 12.5029 12.8471 12.0971 12.8471C11.8941 12.8471 11.7176 12.7588 11.5765 12.6265L8.99118 10.0412L6.42353 12.6265C6.28235 12.7676 6.09706 12.8471 5.88529 12.8471Z" fill="#3C3C43" fill-opacity="0.6"/></svg>
        </div>
      </form>
    </div>
    <nav>
      <a href="/">Home</a>
      <a href="/genre">Genre</a>
      <a href="/wishlist">Wishlist</a>
    </nav>
    <svg xmlns="http://www.w3.org/2000/svg" width="46"  height="46" viewBox="0 0 46 46" fill="none">
      <path d="M22.9167 0C10.2667 0 0 10.2667 0 22.9167C0 35.5667 10.2667 45.8333 22.9167 45.8333C35.5667 45.8333 45.8333 35.5667 45.8333 22.9167C45.8333 10.2667 35.5667 0 22.9167 0ZM22.9167 6.875C26.7208 6.875 29.7917 9.94583 29.7917 13.75C29.7917 17.5542 26.7208 20.625 22.9167 20.625C19.1125 20.625 16.0417 17.5542 16.0417 13.75C16.0417 9.94583 19.1125 6.875 22.9167 6.875ZM22.9167 39.4167C17.1875 39.4167 12.1229 36.4833 9.16667 32.0375C9.23542 27.4771 18.3333 24.9792 22.9167 24.9792C27.4771 24.9792 36.5979 27.4771 36.6667 32.0375C33.7104 36.4833 28.6458 39.4167 22.9167 39.4167Z" fill="#D4AF37"/>
    </svg>
  </header>


    <div class="container">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
