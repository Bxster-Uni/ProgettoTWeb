@extends('layouts.public')

@section('title', 'Pagina Promozione')

@section('content')

<!-- about section -->

<section class="about_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        {{ $promozione->nome }}
      </h2>
    </div>
    <div class="box">

      <div class="detail-box">
        <h3>
          Nome Azienda
        </h3>
        <p>
          {{ $promozione->promAz->name}}
        </p>
        <div class="img_aziende">
          @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $promozione->promAz->image])
        </div>
      </div>
      <div class="detail-box">
        <p>
          {{ $promozione->oggetto }}
        </p>
      </div>
      <div class="box">

        <div class="detail-box">
          <h3>
            Dettagli promozione
          </h3>
          <p>
            {{ $promozione->modalita }}
          </p>
          <p>
            Tempi di fruizione: {{ $promozione->tempi_fruizione }}
          </p>
          <p>
            Luoghi di fruizione: {{ $promozione->luoghi_fruizione }}
          </p>
          @can('isAdmin')
          <p>
            Numero totale coupon emessi: {{ $promozione->numeroCoupon }}
          </p>
          @endcan
          @can('isUser')
          <a href="{{ route('coupon.store', ['promozioneId' => $promozione->promId]) }}">
            <button class="btn btn-success" data-prom-id="{{ $promozione->promId }}">
              Ottieni
            </button>
          </a>
          @endcan
          @can('isStaff')
          <div class="button-box">
            <form action="{{ route('pagina_modifica_promozione', ['promId' => $promozione->promId]) }}">
              <button type="submit" class="btn btn-success">Modifica</button>
            </form>
            <form action="{{ route('staff.promozioni.destroy', ['promId' => $promozione->promId]) }}" method="POST" class="confirm-delete-form">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-success delete-button" data-confirm="Sei sicuro di voler eliminare la promozione?">Elimina</button>
            </form>
          </div>
          @endcan
        </div>
      </div>
    </div>

</section>
<!-- end about section -->

@endsection