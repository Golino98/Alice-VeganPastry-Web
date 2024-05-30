@extends('layouts.adminMaster')
@section('title', 'Rimuovi un utente dal sistema')

@section('content')
@parent
<section class="py-5">
    <div class="container py-5">
        @if(count($clients) > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Email Cliente</th>
                        <th scope="col">Azione</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->email }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-minus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $client->id }}"><i class="bi bi-trash3"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $client->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $client->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $client->id }}">Eliminazione Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare <strong>{{ $client->email }}</strong> dal sistema? <p class="fw-bold-inline text-danger">Attenzione, questa operazione è irreversibile ed eliminerà anche tutti i dati associati a questo cliente (ordini compresi)</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-annulla" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.removeClient', ['id' => $client->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-minus">Elimina</button>
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
        @else
        <h2 class="text-center">Non ci sono clienti da mostrare.</h2>
        <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/7f0ed0ff-f512-4611-a3ff-ee38b021aa4e/42GJ8sAbUD.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>
        @endif
    </div>
</section>
@endsection
