@extends('layouts.adminMaster')
@section('title', 'Modifica un dolce nel database')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                <center> <h2 class="fw-bold">Modifica un <p class="fw-bold-inline text-success">dolce</p></h2> </center>
                <br>

                <!-- da modificare la route -->
                <form action="{{route('admin.modifySweetId' ,['id' => $sweet->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Inserisci in maniera invisibile un id di nome id che contenga $sweet->id -->
                    <input type="hidden" name="id" value="{{$sweet->id}}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value='{{$sweet->name}}' required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-select" id="category" name="category" required>
                            <!-- Le option value vengono prese direttamente dal nome delle categorie nel database -->
                            @foreach ($categories as $category)
                                @if($category->id == $sweet->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control" id="price" name="price" step="any" value="{{$sweet->price}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="5" value="{{$sweet->description}}"required>{{$sweet->description}}</textarea>
                    </div>
                    <!-- Centra i seguenti due bottoni -->
                    <center>
                    <button type="submit" class="btn btn-log"><i class="bi bi-check2"></i> Modifica</button>
                    <button type="reset" class="btn btn-minus"><i class="bi bi-x-lg"></i> Reset</button>
                    </center>
                </div>          

                </div>
            </div>
        </div>
    </section>
@endsection