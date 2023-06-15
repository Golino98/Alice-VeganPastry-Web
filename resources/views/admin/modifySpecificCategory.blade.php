@extends('layouts.adminMaster')
@section('title', 'Modifica una categoria nel database')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                <center> <h2 class="fw-bold">Modifica una <p class="fw-bold-inline text-success">categoria</p></h2> </center>
                <br>

                <!-- da modificare la route -->
                <form action="{{route('admin.modifyCategoryId' ,['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Inserisci in maniera invisibile un id di nome id che contenga $sweet->id -->
                    <input type="hidden" name="id" value="{{$category->id}}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value='{{$category->name}}' required>
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