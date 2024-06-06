@extends('layouts.adminMaster')
@section('title', 'Modifica una categoria nel database')

@section('content')
    @parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <center>
                        <h2 class="fw-bold">Modifica una <p class="fw-bold-inline text-success">categoria</p></h2>
                    </center>
                    <br>

                    <!-- da modificare la route -->
                    <form action="{{ route('admin.modifyCategoryId', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Inserisci in maniera invisibile un id di nome id che contenga $sweet->id -->
                        <input type="hidden" name="id" value="{{ $category->id }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value='{{ $category->name }}' required>
                        </div>
                        
                        <!-- Centra i seguenti due bottoni -->
                        <center>
                            <button type="button" class="btn btn-log" data-bs-toggle="modal" data-bs-target="#confirmationModal"><i class="bi bi-check2"></i> Modifica</button>
                            <button type="reset" class="btn btn-minus"><i class="bi bi-x-lg"></i> Reset</button>
                        </center>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Conferma modifica</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler modificare questa categoria?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-minus" data-bs-dismiss="modal">Annulla</button>
                                        <button type="submit" class="btn btn-log">Conferma</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
