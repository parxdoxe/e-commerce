@extends('layouts.base')

@section('title')
    Produit - {{ $product->name }}
@endsection

@section('sous-title')
    {{ $product->name }}
@endsection


@section('content')
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-bs-toggle="modal" data-bs-target="#productModal">
                        <img class="img-fluid" src="{{ $product->cover }}" />
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price">{{ number_format(($product->price / 1) * (1-($product->promo / 100)), 2, ',', ' ' )}} &euro;</p>
                    <p class="price_discounted">{{ number_format($product->price / 1, 2, ',', ' ' )}} &euro;</p>
                    <form method="get" action="cart.html">
                        <div class="mb-3">
                            <label for="colors">Couleur</label>
                            <select class="form-select" id="colors">
                                <option selected>Choisir</option>

                                @foreach ($colors as $color)
                                    <option style="background: {{ $color->name }}; width: 20px; height: 20px;" value="{{ $color->id }}">
                                        
                                    </option>
                                @endforeach
                                
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Quantité :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('add.to.cart', $product->id)}}" class="btn btn-success btn-lg w-100 text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Ajouter
                        </a>
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Livraison rapide</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Paiement sécurisé</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        3 avis
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">Voir tous les avis</a>
                    </div>
                    <div class="datasheet p-3 mb-2 bg-info text-white">
                        <a href="" class="text-white"><i class="fa fa-file-text"></i> Télécharger la fiche produit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">
                       {{ $product->description }}
                    </p>
                    <p class="card-text">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        
            
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Avis</div>
                <div class="card-body">
                    @foreach ($reviews as $review)
                            
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">{{ $review->released_at }}

                        @for ($i = 1; $i < 5; $i++)
                            @if ($i <= $review->note)
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                        
                        
                        par {{ $review->name }}
                        <p class="blockquote">
                            <p class="mb-0">{{ $review->content }}</p>
                        </p>
                        <hr>
                    </div>
                    @endforeach
                    
                    @auth
                        
                    
                    <form action="{{ route('products.create.reviews', $product) }}" method="post">
                        @csrf
                       
                        <div class="mb-3">
                            <label for="name">Nom</label>
                            <input readonly type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="note">Note</label>
                            <select name="note" class="form-select" id="note">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="content">Message</label>
                            <textarea name="content" id="content" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection