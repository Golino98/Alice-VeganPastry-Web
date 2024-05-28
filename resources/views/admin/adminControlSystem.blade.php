@extends('layouts.adminMaster')
@section('title', 'Pannello di controllo')

@section('content')
@parent
<section class="py-5">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            @if(count($orders) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Ordine</th>
                            <th scope="col">Data ordine</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Lista dolci</th>
                            <th scope="col">Stato</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">#{{ $order->id }}</th>
                            <td>{{ $order->payment_date }}</td>
                            <!-- recupera la mail dell'utente -->
                            <?php
                                $user = DB::table('users')->where('id', $order->user_id)->first();
                            ?>
                            <td>{{ $user-> email}}</td>
                            <td>{{ $order->sweets_list }}</td>

                            <!-- Crea una form che richiami la funzione modifyStatus del controller OrderController -->
                            <form action="{{ route('admin.modifyStatus') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                @if($order->status == 0)
                                    <input type="hidden" name="status" value="1">
                                    <td><button type="submit" class="btn btn-back">Da preparare</a></td>
                                @elseif($order->status == 1)
                                    <input type="hidden" name="status" value="2">
                                    <td><button type="submit" class="btn btn-preparazione">In preparazione</a></td>
                                @elseif($order->status == 2)
                                    <input type="hidden" name="status" value="3">
                                    <td><button type="submit" class="btn btn-log">Pronto</a></td>
                                @elseif($order->status == 3)
                                <input type="hidden" name="status" value="0">
                                    <td><a class="btn btn-consegnato">Consegnato</a></td>
                               
                                @endif
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h2 class="text-center">Non ci sono ordini da preparare, <p class="fw-bold-inline text-success">puoi riposare!</p></h2>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_uk2qyv3i.json"  background="transparent"  speed="1.5"  style="width: 600px; height: 600px;"  loop  autoplay></lottie-player>
                @endif
    
            </div>
        </div>
    </div>
</section>
@endsection