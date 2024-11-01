@extends('master')

@section('content')
    <h2>Pacotes de Turismo</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul>
        @foreach ($packages as $package)
            <li>
                <h3>{{ $package->title }}</h3>
                <p>{{ $package->description }}</p>
                <p>Valor: {{ $package->price }}</p>
                <p>Vagas: {{ $package->slots }}</p>
                @if ($package->image)
                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" width="200">
                @endif
            </li>
        @endforeach
    </ul>
@endsection
