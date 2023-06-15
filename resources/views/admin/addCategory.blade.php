@extends('layouts.adminMaster')
@section('title', 'Aggiungi una categoria al database')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                <center> <h2 class="fw-bold">Aggiungi una <p class="fw-bold-inline text-success">categoria</p></h2> </center>
                <br>

                <form action="{{route('admin.insertCategory')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome della categoria" required>
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