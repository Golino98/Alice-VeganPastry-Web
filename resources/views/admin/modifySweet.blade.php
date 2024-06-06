@extends('layouts.adminMaster')
@section('title', 'Modifica dolce nel database')

@section('content')
    @parent
    @foreach ($sweets as $sweet)
        <section class="py-5">
            <div class="container py-5">
                <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
                    <div class="reflow-product">
                        <div class="ref-media">
                            <div class="ref-preview">
                                <img class="ref-image active" src="<?php echo "/img/sweets/".strtolower($sweet->category->name)."/{$sweet->image}"; ?>" data-reflow-preview-type="image" />
                            </div>
                        </div>
                        <div class="ref-product-data">
                            <div>
                                <h2 class="ref-name">{{ $sweet->name }}</h2>
                                <div class="ref-categories">
                                    <span class="ref-category"> {{ $sweet->category->name }} </span>
                                </div>
                                <div class="ref-description">
                                    {{ $sweet->description }}
                                </div>
                                <strong class="ref-price ref-on-sale">€ {{ $sweet->price }}</strong>
                                <a href="{{ route('admin.modifySweetId', ['id' => $sweet->id]) }}" class="btn btn-annulla"><i class="bi bi-pencil"></i> Modifica</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-minus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $sweet->id }}"><i class="bi bi-trash3"></i> Elimina</button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $sweet->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $sweet->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $sweet->id }}">Eliminazione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare <p class="fw-bold-inline text-success"><?php echo strtolower("$sweet->name");?></p> dal database?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-annulla" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.removeSweet', ['id' => $sweet->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$sweet->id}}">
                                                    <button type="submit" class="btn btn-back">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
