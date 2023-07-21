<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top navbar-custom" style="height:9vh;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Laravel-Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Posts
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/">See posts</a></li>
                        <li><a class="dropdown-item" href="/addpost">Add post</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex gap-2" role="search">
                {{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
                <a class="btn btn-primary col-6 mt-3" href="/ac-info">Info</a>
                <a class="btn btn-danger col-6 mt-3" href="/logout">Logout </a>
            </form>
        </div>
    </div>
</nav>
