@extends('layouts.adminMaster')
@section('title', 'Pannello di controllo')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"># Ordine</th>
                <th scope="col">Data ordine</th>
                <th scope="col">Data consegna</th>
                <th scope="col">Lista dolci</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Stato</th>
                </tr>
            </thead>
            <tbody>
            <th scope ="row"> 1 </th>
            <td> 12/12/2020 </td>
            <td> 13/12/2020 </td>
            <td> Torta al cioccolato x2 </td>
            <td> Via Roma 1, 20100 Milano </td>
            <td> <button type="button" class="btn btn-log">Consegnato</button> </td>
            </tr>
            <th scope ="row"> 2 </th>
            <td> 12/12/2020 </td>
            <td> 13/12/2020 </td>
            <td> Torta al cioccolato x2 </td>
            <td> Via Roma 1, 20100 Milano </td>
            <td> <button type="button" class="btn btn-back">Consegnare</button> </td>
            </tbody>
            </table>
        </div>
    </section>
@endsection

