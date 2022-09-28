@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produits</h1>
    <a class="btn btn-primary" href="{{ route('admin.create') }}">Créer un produit</a>
</div>

<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Couleurs</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                
            
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>
                    <img width="80" src="{{ $product->cover }}" alt="">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format(($product->price / 1) * $product->price / 100, 2, ',', ' ' )}}</td>
                <td >
                    <div class="d-flex">
                        @foreach ($product->colors as $color)
                            <div style="background: {{ $color->name }}; width: 20px; height: 20px; margin-right: 2px" ></div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.edit', $product) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('admin.delete', $product) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection