@extends('layouts.base')


@section('content')




<div class="container">
    <div class="row">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($products_random as $key => $product)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img class="carousel-img d-block img-fluid" src="{{ $product->cover }}" >
                        </div>   
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="card h-100">
                <div class="card-header bg-success text-white text-uppercase">
                    <i class="fa fa-heart"></i> Coup de coeur
                </div>
                <img class="img-fluid border-0" src="{{ $product->cover }}" alt="Card image cap">
                <div class="card-body">
                    @foreach ($product_favori as $product)
                    <h4 class="card-title text-center"><a href="{{ route('products.show', ['slug' => $product->slug])}}" title="View Product">{{ $product->name }}</a></h4>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-danger w-100">{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}} &euro;</p>
                        </div>
                        <div class="col">
                            <a href="{{ route('products.show', ['slug' => $product->slug])}}" class="btn btn-success w-100">Voir</a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-star"></i> Derniers produits
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($products_lasted as $product)  
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="{{ $product->cover }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{ route('products.show', ['slug' => $product->slug])}}" title="View Product">{{ $product->name }}</a></h4>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}} &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('add.to.cart', $product->id)}}" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-trophy"></i> Meilleurs produits
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($products_favori as $product)
                        <div class="col-sm">
                            <div class="card">
                                <img class="card-img-top" src="{{ $product->cover }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{ route('products.show', ['slug' => $product->slug])}}" title="View Product">{{ $product->name }}</a></h4>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger w-100">{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}} &euro;</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('add.to.cart', $product->id)}}" class="btn btn-success w-100">Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection