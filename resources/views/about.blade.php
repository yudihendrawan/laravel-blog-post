<!DOCTYPE html>
<html lang="en">
@extends('layouts.main')

@section('container')
    <div class="container text-center">

        <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
        <h3>{{ $name }}</h3>
        <p>{{ $email }}</p>

    </div>
@endsection
