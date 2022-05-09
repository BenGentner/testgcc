@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Bilder-Galerien {{ $year }}</h1>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if($galleries->isEmpty())
                                <div class="row">
                                    Für diese Auswahl sind keine Galerien vorhanden
                                </div>
                            @else
                                @foreach($galleries as $gallery)
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1">
                                            <h2>
                                                <a href="/bilder/{{ $year . '/' . $gallery->slug }}">{{ $gallery->title }}</a>
                                            </h2>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <hr>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection