<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FilmMax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- Boostrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/index.css">
  </head>
  <body>
    <style>
      .dropdown-menu li:hover{
        background-color: #D4AF37;
      }
    </style>
    <header class="d-flex flex-wrap" >
      <div class="logo">
        <a class="text-decoration-none" href="/home"><h3 style="color: white">Film<span style="color: #D4AF37">Max</span></h3></a>
      </div>
      <div class="search">
        <form action="{{ route('movies.search') }}" method="POST">
          @csrf
          <div class="searchbar">
              <button type="submit" class="submit-btn">
                  <svg class="svg"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
              </button>
              <input type="text" id="searchInput" name="query" placeholder="Search" value="{{ old('query') }}">
              <button type="button" id="clearSearch" onclick="clearInput()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="clearIcon">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
              </button>
          </div>
      </form>
      
      </div>
      <nav>
        <a href="/home">@lang('public.home')</a>
        <a href="/genre">@lang('public.movie')</a>
        <a href="/actors/page/1">@lang('public.actor')</a>
        <a href="/wishlistPage">@lang('public.wishlist')</a>
        
      </nav>
      <div class="d-flex flex-row justify-content-between align-items-center">
        <a style="color:white; margin-right:20px;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <svg width="40px" height="40px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>language-filled</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="#D4AF37" transform="translate(42.666667, 85.333333)"> <path d="M426.666667,85.3333333 L426.666667,341.333333 L362.626302,341.333333 L362.666667,405.333333 L256,341.333333 L170.666667,341.333333 L170.666667,85.3333333 L426.666667,85.3333333 Z M256,1.42108547e-14 L256,64 L149.333333,64 L149.333,268.8 L64,320 L64.0403648,256 L6.39488462e-14,256 L6.39488462e-14,1.42108547e-14 L256,1.42108547e-14 Z M311.198683,149.333333 L286.267137,149.333333 L238.933333,277.333333 L261.425923,277.333333 L274.524018,240.658669 L322.580475,240.658669 L335.768901,277.333333 L359.616467,277.333333 L311.198683,149.333333 Z M298.552247,170.741943 C300.501905,177.275935 302.566831,183.717713 304.747024,190.067278 L305.68845,192.782875 L316.43792,223.134321 L280.576241,223.134321 L291.325712,192.782875 C294.336768,184.412138 296.745613,177.065161 298.552247,170.741943 Z M117.030949,34.5391157 L95.6976158,34.5391157 L95.6973576,45.2051157 L42.3642825,45.2057824 L42.3642825,66.5391157 L121.995716,66.5400848 C120.716368,84.7084858 116.106956,101.073346 108.17419,115.733999 C99.560792,103.887475 93.627247,90.6461433 90.3372583,75.9278184 L90.1264414,74.9658328 L69.2687902,79.445732 L70.8337641,85.9582885 C75.5835399,103.786573 83.778254,119.851708 95.3786478,134.061926 C82.7968575,147.638694 64.7668657,157.161751 40.9572973,162.588992 L40.0503576,162.79312 L44.6782074,183.618444 L51.0461873,182.085779 C75.8970327,175.630085 95.7303277,164.729984 110.29054,149.351848 C120.495309,158.153416 133.141117,166.473384 148.224582,174.354521 L149.332601,174.930407 L149.332449,150.637452 C139.011433,144.692193 130.308211,138.579415 123.22105,132.322953 C134.984339,113.206613 141.674551,91.5943352 143.304052,67.6309686 L143.374635,66.540106 L149.332358,66.5391157 L149.332358,45.2051157 L117.030358,45.2051157 L117.030949,34.5391157 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
        </a>
        <ul class="dropdown-menu mt-3 bg-black" style="box-shadow:1.5px 1.5px 1px 0.5px #D4AF37;">
          <li><a class="dropdown-item text-white bg-transparent" href="{{ url('locale/en') }}">English <img class="flag" src="/img/ENG.png" alt=""></a></li>
          <li><a class="dropdown-item text-white bg-transparent" href="{{ url('locale/id') }}">Indonesia<img class="flag" src="/img/INA.png" alt=""></a></li>
          <li><a class="dropdown-item text-white bg-transparent" href="{{ url('locale/ch') }}">Chinese<img class="flag" src="/img/CHN.png" alt=""></a></li>
        </ul>
        <a href={{ route("logout") }}><svg xmlns="http://www.w3.org/2000/svg" width="46"  height="46" viewBox="0 0 46 46" fill="none">
          <path d="M22.9167 0C10.2667 0 0 10.2667 0 22.9167C0 35.5667 10.2667 45.8333 22.9167 45.8333C35.5667 45.8333 45.8333 35.5667 45.8333 22.9167C45.8333 10.2667 35.5667 0 22.9167 0ZM22.9167 6.875C26.7208 6.875 29.7917 9.94583 29.7917 13.75C29.7917 17.5542 26.7208 20.625 22.9167 20.625C19.1125 20.625 16.0417 17.5542 16.0417 13.75C16.0417 9.94583 19.1125 6.875 22.9167 6.875ZM22.9167 39.4167C17.1875 39.4167 12.1229 36.4833 9.16667 32.0375C9.23542 27.4771 18.3333 24.9792 22.9167 24.9792C27.4771 24.9792 36.5979 27.4771 36.6667 32.0375C33.7104 36.4833 28.6458 39.4167 22.9167 39.4167Z" fill="#D4AF37"/>
        </svg></a>
      </div>
      
     

    </header>

    <section>
      @yield('container')
    </section>


    <footer class="footer">
        <div class="logo-container">
          <a href="https://www.tiktok.com"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
            <path d="M15.55 4.4C14.6955 3.42453 14.2246 2.17179 14.225 0.875H10.3625V16.375C10.3327 17.2138 9.97859 18.0083 9.37471 18.5912C8.77083 19.1741 7.96431 19.4999 7.125 19.5C5.35 19.5 3.875 18.05 3.875 16.25C3.875 14.1 5.95 12.4875 8.0875 13.15V9.2C3.775 8.625 0 11.975 0 16.25C0 20.4125 3.45 23.375 7.1125 23.375C11.0375 23.375 14.225 20.1875 14.225 16.25V8.3875C15.7912 9.51231 17.6717 10.1158 19.6 10.1125V6.25C19.6 6.25 17.25 6.3625 15.55 4.4Z" fill="#D4AF37"/>
          </svg></a>
          <a href="https://www.twitter.com"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
            <path d="M15.7763 11.115L25.2695 0H23.0195L14.7788 9.65062L8.19385 0H0.600098L10.5563 14.595L0.600098 26.25H2.8501L11.5538 16.0575L18.5082 26.25H26.102L15.7763 11.115ZM12.6957 14.7225L11.687 13.2694L3.6601 1.70625H7.11572L13.592 11.0381L14.6007 12.4913L23.0213 24.6225H19.5657L12.6957 14.7225Z" fill="#D4AF37"/>
          </svg></a>
          <a href="https://www.youtube.com"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="18" viewBox="0 0 26 18" fill="none">
            <path d="M10.1019 12.875L16.5894 9.125L10.1019 5.375V12.875ZM24.5519 3.0875C24.7144 3.675 24.8269 4.4625 24.9019 5.4625C24.9894 6.4625 25.0269 7.325 25.0269 8.075L25.1019 9.125C25.1019 11.8625 24.9019 13.875 24.5519 15.1625C24.2394 16.2875 23.5144 17.0125 22.3894 17.325C21.8019 17.4875 20.7269 17.6 19.0769 17.675C17.4519 17.7625 15.9644 17.8 14.5894 17.8L12.6019 17.875C7.36437 17.875 4.10187 17.675 2.81437 17.325C1.68937 17.0125 0.964368 16.2875 0.651868 15.1625C0.489368 14.575 0.376868 13.7875 0.301868 12.7875C0.214368 11.7875 0.176868 10.925 0.176868 10.175L0.101868 9.125C0.101868 6.3875 0.301868 4.375 0.651868 3.0875C0.964368 1.9625 1.68937 1.2375 2.81437 0.925C3.40187 0.7625 4.47687 0.65 6.12687 0.575C7.75187 0.4875 9.23937 0.45 10.6144 0.45L12.6019 0.375C17.8394 0.375 21.1019 0.575 22.3894 0.925C23.5144 1.2375 24.2394 1.9625 24.5519 3.0875Z" fill="#D4AF37"/>
          </svg></a>
          <a href="https://www.facebook.com"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
            <path d="M25.1019 13.1562C25.1019 6.25625 19.5019 0.65625 12.6019 0.65625C5.70187 0.65625 0.101868 6.25625 0.101868 13.1562C0.101868 19.2062 4.40187 24.2437 10.1019 25.4062V16.9062H7.60187V13.1562H10.1019V10.0312C10.1019 7.61875 12.0644 5.65625 14.4769 5.65625H17.6019V9.40625H15.1019C14.4144 9.40625 13.8519 9.96875 13.8519 10.6562V13.1562H17.6019V16.9062H13.8519V25.5938C20.1644 24.9688 25.1019 19.6437 25.1019 13.1562Z" fill="#D4AF37"/>
          </svg></a>
          <a href="https://www.instagram.com"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
            <path d="M7.35187 0.625H17.8519C21.8519 0.625 25.1019 3.875 25.1019 7.875V18.375C25.1019 20.2978 24.338 22.1419 22.9784 23.5015C21.6188 24.8612 19.7747 25.625 17.8519 25.625H7.35187C3.35187 25.625 0.101868 22.375 0.101868 18.375V7.875C0.101868 5.95218 0.865705 4.10811 2.22534 2.74848C3.58498 1.38884 5.42905 0.625 7.35187 0.625ZM7.10187 3.125C5.90839 3.125 4.7638 3.59911 3.91989 4.44302C3.07597 5.28693 2.60187 6.43153 2.60187 7.625V18.625C2.60187 21.1125 4.61437 23.125 7.10187 23.125H18.1019C19.2953 23.125 20.4399 22.6509 21.2838 21.807C22.1278 20.9631 22.6019 19.8185 22.6019 18.625V7.625C22.6019 5.1375 20.5894 3.125 18.1019 3.125H7.10187ZM19.1644 5C19.5788 5 19.9762 5.16462 20.2692 5.45765C20.5622 5.75067 20.7269 6.1481 20.7269 6.5625C20.7269 6.9769 20.5622 7.37433 20.2692 7.66735C19.9762 7.96038 19.5788 8.125 19.1644 8.125C18.75 8.125 18.3525 7.96038 18.0595 7.66735C17.7665 7.37433 17.6019 6.9769 17.6019 6.5625C17.6019 6.1481 17.7665 5.75067 18.0595 5.45765C18.3525 5.16462 18.75 5 19.1644 5ZM12.6019 6.875C14.2595 6.875 15.8492 7.53348 17.0213 8.70558C18.1934 9.87768 18.8519 11.4674 18.8519 13.125C18.8519 14.7826 18.1934 16.3723 17.0213 17.5444C15.8492 18.7165 14.2595 19.375 12.6019 19.375C10.9443 19.375 9.35455 18.7165 8.18245 17.5444C7.01035 16.3723 6.35187 14.7826 6.35187 13.125C6.35187 11.4674 7.01035 9.87768 8.18245 8.70558C9.35455 7.53348 10.9443 6.875 12.6019 6.875ZM12.6019 9.375C11.6073 9.375 10.6535 9.77009 9.95022 10.4733C9.24695 11.1766 8.85187 12.1304 8.85187 13.125C8.85187 14.1196 9.24695 15.0734 9.95022 15.7767C10.6535 16.4799 11.6073 16.875 12.6019 16.875C13.5964 16.875 14.5503 16.4799 15.2535 15.7767C15.9568 15.0734 16.3519 14.1196 16.3519 13.125C16.3519 12.1304 15.9568 11.1766 15.2535 10.4733C14.5503 9.77009 13.5964 9.375 12.6019 9.375Z" fill="#D4AF37"/>
          </svg></a>
        </div>
        <p>© 2023 by FilmMax.com</p>
      </footer>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
      function clearInput() {
        document.getElementById('searchInput').value = '';
      }
    </script>
  </body>
</html>
