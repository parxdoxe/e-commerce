@extends('layouts.base')

@section('title')
    Mon panier - @parent
@endsection

@section('sous-title')
    Mon panier
@endsection


@section('content')
@if (session('cart'))

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cart') as $key => $product)
                        <tr>
                            <td><img class="w-25 h-25" src="{{ $product['cover']}}" /> </td>
                            <td>{{ $product['name']}}</td>
                            <td>En stock</td>
                            <td><input class="form-control" type="text" value="{{ $product['quantity']}}" /></td>
                            @php
                                $totalProduct = number_format((($product['price'] / 1) * (1-($product['promo'] / 100)) *$product['quantity']), 2, ',', ' ' )
                            @endphp
                            <td class="text-right"> {{ $totalProduct }}  </td>
                            <td class="text-right"><a href="{{ route('remove.to.cart', $key )}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        @endforeach 
                      
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sous-Total</td>
                            <td class="text-right"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Frais de port</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn w-100 btn-light">Continuer vos achats</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg w-100 btn-success text-uppercase">Commander</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endif
@endsection