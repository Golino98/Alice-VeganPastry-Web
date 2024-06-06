@extends('layouts.adminMaster')
@section('title', 'Pannello di controllo')

@section('content')
@parent
<section class="py-5">
    <div class="container py-5">
        <div class="row d-flex justify-content-center" >
            <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-bottom: 15px;">
            <h2 class="fw-bold">Pannello di <p class="fw-bold-inline text-success">controllo</p></h2>
            </div>
            @if(count($orders) > 0)
            <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder='Cerca per mail' title="Inserisci una mail">
            <div style="height: 20px;"></div>
            <div class="table-responsive" id="myTable">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Ordine</th>
                            <th scope="col">Data ordine</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Lista dolci</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Azione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">#{{ $order->id }}</th>
                            <td>{{ $order->payment_date }}</td>
                            <?php
                                $user = DB::table('users')->where('id', $order->user_id)->first();
                            ?>
                            <td>{{ $user->email }}</td>
                            <td>{{ $order->sweets_list }}</td>
                            <td>
                                @if($order->status == 0)
                                    <button class="btn btn-back" disabled-btn>Da preparare</button>
                                @elseif($order->status == 1)
                                    <button class="btn btn-preparazione" disabled-btn>In preparazione</button>
                                @elseif($order->status == 2)
                                    <button class="btn btn-pronto" disabled-btn>Pronto</button>
                                @elseif($order->status == 3)
                                    <button class="btn btn-consegnato" disabled-btn>Consegnato</button>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-annulla" data-bs-toggle="modal" data-bs-target="#statusModal{{ $order->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-minus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $order->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="statusModal{{ $order->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="statusModalLabel{{ $order->id }}">Modifica Stato Ordine</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.modifyStatus') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Nuovo Stato</label>
                                                        <select name="status" class="form-select" id="status">
                                                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Da preparare</option>
                                                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>In preparazione</option>
                                                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Pronto</option>
                                                            <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Consegnato</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-minus" data-bs-dismiss="modal">Annulla</button>
                                                        <button type="submit" class="btn btn-log">Salva modifiche</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">Elimina Ordine</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler <p class="fw-bold-inline text-danger">eliminare l'ordine numero {{ $order->id }}</p>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-annulla" data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('admin.deleteOrder', ['id' => $order->id]) }}" method="POST">
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
        <h2 class="text-center">Non ci sono ordini da preparare, <p class="fw-bold-inline text-success">puoi riposare!</p></h2>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_uk2qyv3i.json"  background="transparent"  speed="1.5"  style="width: 600px; height: 600px;"  loop  autoplay></lottie-player>
        @endif
        </div>
    </div>
</section>
@endsection

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Cambiato da [0] a [2] per prendere la terza colonna (Mail)
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
