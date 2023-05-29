@extends('layouts.public')

@section('title', 'Lista Staff')

@section('content')


<section class="how_section layout_padding">
  <div class="heading_container1">
    <h2>
      LISTA STAFF
    </h2>
  </div>
  <form action="{{ route('elenco_staff_search') }}">
    @csrf
    <input type="text" name="query" placeholder="Cerca staff" onkeydown="if(event.keyCode===13){event.preventDefault(); this.form.submit();}">
  </form>
  <div class="row mb-4">
    <div class="col-md-8 mx-auto">
      @can('isAdmin')
      <a href="{{ route('aggiunta_staff') }}">
        <button class="btn btn-success"> Aggiungi Staff </button>
      </a>
      @endcan
      <ul class="list-group mt-4">
        @if ($user->count() > 0)
        @foreach ($user as $users)
        <li class="list-group-item">
          <a href="{{ route('admin.visualizzaStaff', $users->userId) }}" class="promotion-link">
            <div class="promotion">
              <img src="images/profilodefault1.jpg" alt="" class="immagine-ridotta">
              <div class="promotion-details">
                <h1 class="promotion-title">{{ $users->username }}</h1>
                <h4 class="promotion-description">{{ $users->name }} {{ $users->surname }}</h4>
              </div>
            </div>
          </a>
        </li>
        @endforeach
        @else
        <li>Nessun risultato trovato.</li>
        @endif
      </ul>
    </div>
  </div>
</section>

@endsection