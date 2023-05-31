@extends('layouts.public')

@section('title', 'Pagina Modifica')

@section('content')

<link href="{{ asset('css/login.css')}}" rel="stylesheet" />
<link href="{{ asset('css/style.css')}}" rel="stylesheet" />

<div class="login-container">
<div class="static">
<h1>Pagina di modifica profilo</h1>

<form action="{{ route('userpage_update',['userId' => $user->userId]) }}" method="POST">
    @csrf
    @method('PUT')
<div>
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>
<div>
    <label for="surname">Cognome:</label>
    <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required>
    @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>
<div>
    <label for="username">Nome Utente:</label>
    {{$user->username}}
</div>
    <div>
    <label for="pasword">Password:</label>
    <input type="password" id="password" name="password" value="" >
    @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>

<div>
    <label for="password_confirm">Conferma password:</label>
    <input type="password" id="password_confirm" name="password_confirm" value="" >
    @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>

@can('isUser','isAdmin')
    <div>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="{{ $user->email}}" required>
    @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>
    <div>
    <label for="cellulare">Cellulare:</label>
    <input type="text" id="cellulare" name="cellulare" value="{{ $user->cellulare }}" required>
    @if ($errors->first('cellulare'))
                <ul class="errors">
                    @foreach ($errors->get('cellulare') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>

    <div>
    <label for="dataNascita">Data di nascita:</label>
    <input type="date" id="dataNascita" name="dataNascita" value="{{$user->dataNascita}}" required>
    @if ($errors->first('dataNascita'))
                <ul class="errors">
                    @foreach ($errors->get('dataNascita') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
</div>
    <div>
    <label for="genere">Genere:</label>
    <select id="genere" name="genere" required>
    <option value="0" {{ $user->genere == '0' ? 'selected' : '' }}>Maschio</option>
    <option value="1" {{ $user->genere == '1' ? 'selected' : '' }}>Femmina</option>
</select>
</div>
@endcan

    <!-- Altri campi per i dati personali -->
    <div class="button_box">
    <button class= "btn cancel-btn" type="submit">Aggiorna</button>

    @can('isUser')
    <button type="reset" class="btn cancel-btn"> <a href="{{ route('userpage.show', ['userId' => $user->userId]) }}">Annulla</a></button>
    @endcan
    @can('isStaff')
    <button type="reset" class="btn cancel-btn"> <a href="{{ route('staffpage.show', ['userId' => $user->userId]) }}">Annulla</a></button>
    @endcan
    @can('isAdmin')
    <button type="reset" class="btn cancel-btn"> <a href="{{ route('staffpage.show', ['userId' => $user->userId]) }}">Annulla</a></button>
    @endcan
</div>
</form>
</div>
</div>
@endsection
