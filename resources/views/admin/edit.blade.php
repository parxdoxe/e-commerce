@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form  action="" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Nom du produit</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ old('name') }} ">
        </div>

        <div class="d-flex mb-2">
            <div class="form-group mr-2">
                <label for="exampleFormControlInput2">Prix</label>
                <input type="text" name="price" class="form-control" id="exampleFormControlInput2" value="{{ old('price') }} ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Promo</label>
                <input type="text" name="promo" class="form-control" id="exampleFormControlInput3" value="{{ old('promo') }} ">
            </div>
        </div>

        <div class="form-group mb-2">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" value="{{ old('description') }} rows="3"></textarea>
        </div>

        <div class="form-group mb-2">
            <label class="block mb-1" for="cover">Image</label>
            <input  type="file" name="cover" id="cover" value="{{ old('cover') }}">
        </div>

        <div class="form-group mb-2">
            <label for="exampleFormControlSelect1">Catégories</label>
            <select class="form-control" name="categories_id" id="exampleFormControlSelect1">
                <option selected="true" disabled>Choisissez votre catégorie</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="form-group mb-4 d-flex flex-column">
            <label for="colors_id">Couleur du produit</label>
            <div class="d-flex justify-content-around">
            @foreach ($colors as $color)
            <input type="checkbox" id="colors_id" name="colors_id[]" class="form-check-input" style="background: {{ $color->name }}" value="{{ $color->id }}"  />
            @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary">Ajouter</button>
        </div>

    </form>
</div>
@endsection