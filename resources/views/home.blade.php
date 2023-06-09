@extends('layouts.public')

@section('title', 'HomePage')


@section('content')

@php
use App\Models\Coupon
@endphp

<div class="hero_area">

  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">

        <div class="container-1">

          <form action="{{ route('lista_promozioni_search') }}">
            @csrf
            <input type="text" name="companyQuery" placeholder="Cerca aziende" onkeydown="if(event.keyCode===13){event.preventDefault(); this.form.submit();}">
            <input type="text" name="promotionQuery" placeholder="Cerca promozioni" onkeydown="if(event.keyCode===13){event.preventDefault(); this.form.submit();}">
          </form>
        </div>
        <!-- input permette all'utente di inserire una query di ricerca. Premuto invio, il modulo viene
        gestito nel backend per eseguire la ricerca corrispondente alla query inserita -->

      </div>
    </div>
  </div>

  <!-- slider section -->
  <section class=" slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Offerte da urlo
                      </h1>
                      <h2>
                        Ma attenti a non perdere la voce
                      </h2>
                      <div class="">
                        <a href="{{route('lista_promozioni')}}">
                          Vedili tutti
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="images/Henry.jpg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Solo da noi
                      </h1>
                      <h2>
                        Le offerte migliori
                      </h2>
                      <div class="">
                        <a href="{{route('lista_promozioni')}}">
                          Vedili tutti
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="images/tarallucci buoni.jpeg " alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Grandi affari
                      </h1>
                      <h2>
                        a portata di click.
                      </h2>
                      <div class="">
                        <a href="{{route('lista_promozioni')}}">
                          Vedili tutti
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="images/ondabluuuuuuu.jpg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Offerte
                      </h1>
                      <h2>
                        da far perdere la testa
                      </h2>
                      <div class="">
                        <a href="{{route('lista_promozioni')}}">
                          vedili tutti
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="images/Animals.jpg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Sconti Imperdibili
                      </h1>
                      <h2>
                        Solo per utenti registrati
                      </h2>
                      <div class="">
                        <a href="{{route('lista_promozioni')}}">
                          Vedili tutti
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="images/Tapis.jpg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->
</div>

<!-- end slider scetion -->
@php
$totalCoupons = \App\Models\Coupon::count();
@endphp

@can('isAdmin')
<section class="about_section layout_padding">
<div class="container"><div class="btn-box1">
  <button  id="toggleButton">Totale Coupon Generati</button>
</div>
  <section id="hiddenSection" style="display: none;">
    <div class="heading_container">
      <h2>Numero di coupon emessi dal sito: {{$totalCoupons}}</h2>
    </div>
  </section>
</section>
@endcan
<!-- aziende section -->
<section class="about_section layout_padding">
  <div class="heading_container">
    <h2>
      Aziende presenti nel sito
    </h2>
  </div>
  <div>
    <table class="table center">
      <tr>
        @php
        $limit = 4;
        $aziendeLimitate = $aziende->take($limit);
        @endphp
        @for ($i = 0; $i <$limit; $i++) @if (isset($aziendeLimitate[$i])) @php $azienda=$aziendeLimitate[$i]; @endphp <td>
          <a href="{{ route('aziendapage.show', ['aziendeId' => $azienda->aziendeId]) }}" class="promotion-link">
            <div class="image-container">
              <div class="img_aziendeloghi">
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->image])
              </div>
            <span>{{ $azienda->name }}</span>
            </div>
          </a>
          </td>
          @endif
          @endfor
      </tr>
    </table>
    <div class="btn-box">
      <a href="{{ route('lista_aziende') }}">
        Vedi tutte le aziende
      </a>
    </div>
  </div>
</section>
<!-- end aziende section -->

<!-- promozioni section -->

<section class="about_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container">
      <h2>
        Catalogo Offerte
      </h2>
    </div>
    <table class="table text-center">
      <tr>
        @php
        $limit = 3;
        $promozioniLimit = $promozioni->take($limit);
        @endphp
        @for ($i = 0; $i <$limit; $i++) @if (isset($promozioniLimit[$i])) @php $promozione=$promozioniLimit[$i]; @endphp <td>
          <td>
            <a href="{{route('prompage.show', ['promId' => $promozione->promId]) }}" class="promotion-link">
              <div class="image-container">
                <div class="img_aziendeloghi">
                  @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $promozione->promAz->image])
                </div>
              </div>
              <span>{{ $promozione->nome }}</span>
            </a>
          </td>
          @endif
          @endfor
      </tr>
      <tr>
        @php
        $limit = 6;
        $promozioniLimit = $promozioni->take($limit);
        @endphp
        @for ($i = 3; $i <$limit; $i++) @if (isset($promozioniLimit[$i])) @php $promozione=$promozioniLimit[$i]; @endphp <td>
          <td>
            <a href="{{route('prompage.show', ['promId' => $promozione->promId]) }}" class="promotion-link">
              <div class="image-container">
                <div class="img_aziendeloghi">

                  @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $promozione->promAz->image])
                </div>
              </div>
              <span>{{ $promozione->nome }}</span>
            </a>
          </td>
          @endif
          @endfor
      </tr>
    </table>
    <div class="btn-box">
      <a href="{{ route('lista_promozioni') }}">
        Vedi tutte le promozioni
      </a>
    </div>
  </div>
</section>

<section class="about_section layout_padding-bottom">
  <div class="container">
    <div class="btn-box1">
      <a href="{{ asset('DOCUMENTAZIONE.pdf') }}" target="_blank">
        Vedi la documentazione del progetto
      </a>
    </div>
  </div>
</section>

<!-- end promozioni section -->

<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>

<!-- owl carousel script -->
<!-- not used -->
<script type="text/javascript">
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    navText: [],
    center: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      1000: {
        items: 3
      }
    }
  });
</script>
<!-- end owl carousel script -->
@endsection