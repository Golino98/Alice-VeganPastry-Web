@extends('layouts.adminMaster')
@section('title', 'Aggiungi al database')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                <center> <h2 class="fw-bold">Aggiungi un <p class="fw-bold-inline text-success">dolce</p></h2> </center>
                <br>

                <form action="{{route('admin.insertSweet')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del dolce" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-select" id="category" name="category" required>
                            <!-- Le option value vengono prese direttamente dal nome delle categorie nel database -->
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control" id="price" name="price" step="any" placeholder="Inserisci il prezzo del dolce" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci una descrizione del dolce" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/x-png" required>
                    </div>
                    <!-- Centra i seguenti due bottoni -->
                    <center>
                    <button type="submit" class="btn btn-log"><i class="bi bi-check2"></i> Aggiungi</button>
                    <button type="reset" class="btn btn-minus"><i class="bi bi-x-lg"></i> Cancella</button>
                    </center>
                </div>          

                </div>
            </div>
        </div>
    </section>
@endsection