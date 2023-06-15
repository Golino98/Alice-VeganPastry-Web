@extends('layouts.adminMaster')
@section('title', 'Pannello di controllo categorie')

@section('content')
    @parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Azioni</th> <!-- Aggiungi l'intestazione per la colonna delle azioni -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                    <a href="{{ route('admin.modifyCategoryId', ['id' => $category->id]) }}" class="btn btn-annulla"><i class="bi bi-pencil"></i> Modifica</a>
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-back" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}"><i class="bi bi-trash3"></i> Elimina</button>

                                    <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $category->id }}">Eliminazione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare <p class="fw-bold-inline text-success"><?php echo strtolower("$category->name");?></p> dal database? <br><p class="fw-bold-inline text-danger">Occhio che questa operazione cancellerà anche tutti i prodotti associati a questa categoria!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-annulla" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.removeCategory', ['id' => $category->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$category->id}}">
                                                    <button type="submit" class="btn btn-back">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
