@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Termine</h1>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if($appointments->isEmpty())
                                <p>
                                    Zur Zeit sind keine Termine vorhanden
                                </p>
                            @else
                                <table class="table">
                                    <th>Beginn</th>
                                    <th>Ende</th>
                                    <th>Titel / Beschreibung</th>
                                    @foreach($appointments as $appointment)
                                        <tr>
                                            <td>
                                                @isset($appointment->starts_at)
                                                    {{ $appointment->starts_at->format('d.m.Y H:i') }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($appointment->ends_at)
                                                    {{ $appointment->ends_at->format('d.m.Y H:i') }}
                                                @endisset
                                            </td>
                                            <td>
                                                {{ $appointment->title }}
                                                @isset($appointment->description)
                                                    <p style="font-style: italic;font-size: smaller;">
                                                        {!! nl2br($appointment->description) !!}
                                                    </p>
                                                @endisset
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection