@extends('layouts.base')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Filtres</div>
                <form action="" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="bleu" class="form-check-input" id="color-bleu">
                                <label class="form-check-label" for="color-bleu">Bleu</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="rouge" class="form-check-input" id="color-red">
                                <label class="form-check-label" for="color-red">Rouge</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="vert" class="form-check-input" id="color-vert">
                                <label class="form-check-label" for="color-vert">Vert</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button class="btn btn-primary w-100">Filtrer</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Catégories</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="category.html">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="category.html">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="category.html">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="category.html">Vestibulum at eros</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Dernier produit</div>
                @foreach ($product_lasted as $product)
                    <div class="card-body">
                        <img class="img-fluid" src="{{ $product->cover }}" />
                        <h5 class="card-title mt-3">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p>{{ $product->category->name }}</p>
                        <div class="row">
                            <div class="col">
                                <p class="btn btn-danger w-100">{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}} &euro;</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('products.show', ['slug' => $product->slug])}}" class="btn btn-success w-100">Voir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col">
            <div class="row">
                @foreach ($products as $product)
                    
                
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $product->cover }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{ route('products.show', ['slug' => $product->slug])}}" title="View Product">{{ $product->name }}</a></h4>
                            <p class="card-text">{{ $product->short_description }}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}} &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                
                
               
                {{ $products->links() }}
            </div>
        </div>

    </div>
</div>
@endsection