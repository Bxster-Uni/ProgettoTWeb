@extends('layouts.public')

@section('title', 'Aggiunta Azienda')

@section('scripts')

@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(function () {
    var actionUrl = "{{ route('aziende.store') }}";
    var formId = 'addazienda';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#addazienda").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')

<div class="static">

    <h3>Pagina di Aggiunta Azienda</h3>

    <div class="container-contact">
        <div class="wrap-contact">
            {{ Form::open(array('route' => 'aziende.store', 'id' => 'addazienda', 'files' => true, 'class' => 'contact-form')) }}
            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('ragionesociale', 'Ragione Sociale', ['class' => 'label-input']) }}
                {{ Form::text('ragionesociale', '', ['class' => 'input', 'id' => 'ragionesociale']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('tipologia', 'Tipologia', ['class' => 'label-input']) }}
                {{ Form::text('tipologia', '', ['class' => 'input', 'id' => 'tipologia']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('desc', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::text('desc', '', ['class' => 'input', 'id' => 'desc']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('via', 'Via', ['class' => 'label-input']) }}
                {{ Form::text('via', '', ['class' => 'input', 'id' => 'via']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('cap', 'Cap', ['class' => 'label-input']) }}
                {{ Form::text('cap', '', ['class' => 'input', 'id' => 'cap']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('image', 'Logo', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
            </div>

            <div class="container-form-btn">
                {{ Form::submit('Aggiungi Azienda', ['class' => 'form-btn1']) }}
            </div>
            <button type="reset" class="btn cancel-btn" ><a href="{{ route('lista_aziende') }}">Annulla</a></button>

            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
