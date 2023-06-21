@extends('errors::minimal')

@section('title', __('Non autorizzato'))
@section('code', '401')
@section('message', __('non sei autorizzato a visualizzare questa pagina'))
