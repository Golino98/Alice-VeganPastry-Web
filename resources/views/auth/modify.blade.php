<?php session_start();?>
@extends('layouts.masterModify')
@section('title', 'Modifica')
<script src="/js/confirm.js"></script>
<script src="/js/authFunctions.js"></script>

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Bentornat<p class="fw-bold-inline text-success">ə</p></h2>
                    <p class="fw-bold-personal text-success mb-2">Modifica la password del tuo profilo vegano</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                        </div>

                                <form id="modify-form" action="{{route('user.modify')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3" style="display: none;" >
                                        <input type="form-control" class="form-control" type="text" name = "name" placeholder="Username" value="<?php echo $_SESSION["loggedName"];?>">
                                        <label>Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name = "oldPassword" id="oldPassword" placeholder="Vecchia password">
                                        <label>Vecchia password</label>
                                        <input type="checkbox" onclick="showPasswordRepeatRegister()"> Mostra vecchia password</input>
                                    
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name = "password" id="password" placeholder="Password">
                                        <label>Nuova password</label>
                                        <input type="checkbox" onclick="showPasswordRepeatRegister()"> Mostra nuova password</input>
                                        <br>
                                        <span class="invalid-input" id="invalid-regexPassword" style="color: green">Lunghezza della password corretta</span>
                                        <br>
                                        <span class="invalid-input" id="invalid-regexPassword" style="color: green">Caratteri necessari presenti</span>
                                    
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name = "conf_password" id="conf_password" placeholder="Password">
                                        <label>Reinserisci la nuova password</label>
                                        <input type="checkbox" onclick="showPasswordRepeatRegister()"> Mostra ripeti nuova password</input>
                                        <br>
                                        <span class="invalid-input" id="invalid-regexPassword" style="color: green">Le due password corrispondono</span>
                                    </div>
                                    <br>
                                    <label for="Modify"  id="modify-label" class="btn btn-log" onclick="confirmModify(); return false;">Salva le modifiche  <i class="bi bi-check2"></i></label>
                                    <input id="Modify" type="submit" value="Modify" hidden>
                                </form>
                                <!-- Add space between the two buttons -->
                                <div class="mb-2"></div>
                                <div>  
                                    <a href="{{route('home')}}" class="btn btn-minus">Torna alla Home  <i class="bi bi-house"></i></a>
                                    </div>
                                    <br>
                                    <div class="col-12">
                                    <p class="small mb-0">oppure <a href="{{ route('user.modifyUsername') }}">modifica il tuo username</a></p>
                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- Create a button to go back to the Home -->

            </div>
        </div>

        <div class="modal fade" id="customConfirmModal" tabindex="-1" aria-labelledby="customConfirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customConfirmModalLabel">Conferma</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler salvare le modifiche?
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-minus" data-bs-dismiss="modal">No</button>
                        <button type="button" id="confirm-yes" class="btn btn-log">Salva</button>
                    </div>
                </div>
            </div>
        </div>
            
    </section>
@endsection