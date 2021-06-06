<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}"
      style="font-family: 'Crimson Pro', serif;
      font-size: 35px;"
      >
      {{-- blog link , which indecate list page or / route --}}
        PDF Blog
      </a>
      {{-- toggel button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent"style="font-family: 'Crimson Pro', serif;
      font-size: 20px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            {{-- list page or / route --}}
            <a class="nav-link" aria-current="page" href="{{url("/")}}">List</a>
          </li>
          <li class="nav-item">
            {{-- add page or /add route --}}
            <a class="nav-link" aria-current="page" href="{{url("/add_page")}}">Add</a>
          </li>        
        </ul>
      </div>
    </div>
  </nav>
  <style>
    .pdf_icon_style{
      color: red;
      font-size: 20px;
      width: 40px;
      height: 40px;
    }
  </style>