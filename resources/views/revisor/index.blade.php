<x-main>
    <div>
        <h1 class="mt-5 text-center">
            {{ $article_to_check ? "Ecco l'annuncio da revisionare" : 'Non ci sono annunci da revisionare' }}
        </h1>
    </div>
    @if (session()->has('message'))
    <h5 class="alert alert-success w-25 mt-3 m-auto text-center">
        {{ session('message') }}
    </h5>
    @endif
    @if ($article_to_check)
    <div class="container rounded p-0 w-75 mt-5">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide col-12 col-md-6 mt-5 rounded">
                <div class="carousel-indicators rounded">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://unsplash.it/600" class="d-block w-100 rounded" alt="Immagine1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://unsplash.it/400" class="d-block w-100 rounded" alt="Immagine2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://unsplash.it/400" class="d-block w-100 rounded" alt="Immagine3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="col-md-6 mt-5 d-flex flex-column align-items-around justify-content-around">
                <div>
                    <span class="background_blue rounded p-1 text-white">{{$article_to_check->category->name}}</span>
                </div>
                <h3 class="mt-5">Titolo: {{ $article_to_check->title }}</h3>
                <span>Descrizione: {{ $article_to_check->description }}</span>
                <h2 style="color: rgb(0, 167, 0)">€{{$article_to_check->price}}</h2>
                <hr class="w-75">
                <h6>Creato il {{$article_to_check->created_at->format('d/m/Y')}}, dall'utente {{$article_to_check->user->name}}</h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5 d-flex align-item-center justify-content-center">
                <form action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow"> <i class="fa-solid fa-check" style="color: #ffffff;"></i> Accetta</button>
                </form>
            </div>
                <div class="col-md-6 mt-5 d-flex align-item-center justify-content-center">
                <form action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow"> <i class="fa-solid fa-xmark" style="color: #ffffff;"></i> Rifiuta</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
</x-main>
