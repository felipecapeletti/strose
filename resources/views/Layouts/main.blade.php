<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Inports -->
            <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
            <script scr='/js/script.js'></script>
            <link rel="stylesheet" href="/css/style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
            <link rel="manifest" href="{{ asset('manifest.json') }}">

    </head>
    <body>
        <header></header>

        <nav class="navbar header fixed-top ">
            <div class="bloco-lateral-e">
                <button class="menuBtn"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                    </svg>
                </button>

              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="header-menu">
                        <img src="\img\icone.png" class="icone-menu" alt="icone_mercadao">
                        <h5 class="menu-tittle" id="offcanvasNavbarLabel">Páginas</h5>
                    </div>
                    <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                        </svg>
                  </button>
                </div>
                <div class="bloco-menu">
                    <ul class="nav lista-menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Pagina Inicial</a>
                        </li>
        
                        <li class="nav-item">
                            <a href="/catalogos" class="nav-link">Catálogos</a>
                        </li>
        
                        <li class="nav-item">
                            <a href="/marcas" class="nav-link">Marcas</a>
                        </li>

                        <li class="nav-item">
                            <a href="/produtos" class="nav-link">Produtos</a>
                        </li>
                    </ul>
                </div>
              </div>
            </div>
            
            <div class="bloco-central"> 
                <img src="\img\logo.png" alt="logo">       
            </div> 

            <div class="bloco-lateral-d">
             @auth
                <div class="user-btn">
                    <a href="/dashboard">
                        <p>{{Auth::user()->name}}</p>
                    </a>                   
                </div>
                
                <form class="logout-btn" action="/logout" method="POST">
                    @csrf
                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                 </form>    
                
             @endauth
             @guest
                <div class="login-btn">
                <a href="/login">Login</a>
                </div>
             @endguest
        
            </div>
            
        </nav>

        <main>
            <div class="container">
                
                @if (session('msg'))
                 <p class="msg">{{ session('msg') }}</p>
                @endif

                @yield('content')

            </div>
        </main>

        <footer>
            <p> Grupo Chiaperini &copy; 2024 </p>
       </footer> 
    </body>

</html>
