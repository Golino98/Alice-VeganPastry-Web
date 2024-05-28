@extends('layouts.master')
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
                            <th scope="col">Lista dolci</th>
                            <th scope="col">Stato</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">#{{ $order->id }}</th>
                            <td>{{ $order->payment_date }}</td>
                            <td>{{ $order->sweets_list }}</td>

                                @if($order->status == 0)
                                    <td><a class="btn btn-back">Da preparare</a></td>
                                @elseif($order->status == 1)
                                <td><a class="btn btn-preparazione">In preparazione</a></td>
                                @elseif($order->status == 2)
                                    <td><a class="btn btn-log">Pronto</a></td>
                                @elseif($order->status == 3)
                                    <td><a class="btn btn-consegnato">Consegnato</a></td>
                            @endif
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h2 class="text-center">Non hai mai fatto <p class="fw-bold-inline text-success">ordini!</p></h2>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_09nNdJ9qB8.json"  background="transparent"  speed="1.5"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection