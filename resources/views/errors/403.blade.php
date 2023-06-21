@extends('errors::minimal')

@section('title', __('Accesso negato'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'accesso negato'))
