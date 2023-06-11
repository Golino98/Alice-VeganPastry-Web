@extends('layouts.master')
@section('title', 'Pannello di controllo')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-success">
                        <h5 class="card-title">Success card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    </div>                
                </div>
            </div>
        </div>
    </section>
@endsection