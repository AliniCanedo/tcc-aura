@extends('layouts.aluno')

@section('content')
    @if (!empty($teste->id_classification == 8) && $teste->id_matricula == Auth::user()->id)
        <div class="alert alert-success">
            <ul>
                <p>Você já respondeu esse questionário</p>
            </ul>
        </div>
    @else
        <form action="{{ route('estagio.store') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_classification" value="8">
            @csrf
            @foreach ($data as $data)
                @if ($data->modelo->id === 2 && $data->classifications->id === 8)
                    <h5>{{ $data->classifications->description }}</h5>
                    <p><small class="text-danger">*</small> {{ $data->description }} <i class="fas fa-danger-circle"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $data->tooltip }}"></i></p>
                    <div class="row">
                        <div class="col d-flex mb-5">
                            <input type="textbox" id="value_id" name="value_id[]" data-flex-minlabel="Discordo"
                                data-flex-maxlabel="Concordo Totalmente" class="nps ff-rating" required>
                        </div>
                        <hr>
                    </div>
                @endif
            @endforeach
            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Responder</button>
                </div>
            </div>
        </form>
    @endif
@endsection
@section('css-includes')
    <link rel="stylesheet" href="{{ asset('css/ffrating.css') }}">
@endsection
@section('javacript-includes')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/ffrating.js') }}" defer></script>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $('.nps').ffrating({
                isStar: false,
                min: 1,
                max: 10
            });
        });
    </script>
@endsection
