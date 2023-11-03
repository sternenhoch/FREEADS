<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="mm_ads.css">
    <title></title>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">MM Ads</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#expandme" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="expandme">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
        </ul>

        @auth<!--will appear if you're logged in-->
        <div class="flex-row my-3 my-md-0">
          <a href="{{ route('ads.create') }}" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
            <a class="btn btn-success mx-2" href="ad" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>Post ad</a>
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-secondary">Sign Out</button>
          </form>
        </div>
            @else<!--will appear to guests-->
            <a class="btn btn-success mx-2" href="ad" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>Post ad</a>
            <a class="btn btn-outline-light mr-2" href="./signup" role="button">Sign Up</button>
            <a class="btn btn-outline-light mx-2" href="./login" role="button">Sign In</a>
        @endauth
      </div>
    </nav>

<!-- search bar-->
<div class="container-fluid pt-2">
  <!-- search bar
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>-->
    <form action="{{ route ('ads.index')}}" class="d-flex" method="get">
      <input name="search" placeholder="search" class="form-control w-100" type="text">
      <button class="btn btn-outline-primary">Search</button>
    </form>
      </div>

@if (session()->has('success'))
<div class="container container-narrow">
  <div class="alert alert-success text-center">
    {{session('success')}}
  </div>
</div>
@endif

{{$slot}}

<!--placeholder for footer-->
<footer class="border-top text-center small text-muted py-3">
  <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/" class="text-muted">MM Ads</a>. All rights reserved.</p>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>