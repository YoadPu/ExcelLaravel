<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="http://127.0.0.1:8000/home">Cupa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="http://127.0.0.1:8000/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "posts") ? 'active' : ''}}" href="http://127.0.0.1:8000/posts">Blog</a>
            </li>              
            <li class="nav-item">
              <a class="nav-link {{ ($active === "categories") ? 'active' : ''}}" href="http://127.0.0.1:8000/categories">Categories</a>
            </li>              
            <li class="nav-item">
              <a class="nav-link {{ ($active === "daus") ? 'active' : '' }}" href="http://127.0.0.1:8000/daus">Daus Ganteng</a>
            </li>              
          </ul>
          <ul class="navbar-nav ms-auto">
            @auth  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>                  
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>                    
                </ul>
              </li>  
            @else              
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/login" class="nav-link {{ ($active === "daus") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
            @endauth
          </ul>                  
      </div>
    </div>
  </nav>