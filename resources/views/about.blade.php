@extends('layout.main')

@section('container')
<h1>Pagina About</h1>

<h3>{{ $naran }}</h3>
<h3>{{ $email }}</h3>
<h3><img src="{{ $foto }}" alt="{{ $naran }}"></h3>

@endSection