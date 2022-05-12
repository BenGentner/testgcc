@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>News</h1>
                    </div>

                    <div class="panel panel-default">
                        <posts_grid class="panel-body"></posts_grid>

{{--                        <div class="panel-body">--}}
{{--                            @if($articles->isEmpty())--}}
{{--                                <p>--}}
{{--                                    Zur Zeit sind keine News vorhanden--}}
{{--                                </p>--}}
{{--                            @else--}}
{{--                                @foreach($articles as $article)--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-2">--}}
{{--                                            <img src="{{ $article->thumbnail() }}"--}}
{{--                                                 alt="Thumbnail Image" class="img-rectangle img-raised img-responsive">--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-9 col-md-offset-1">--}}
{{--                                            <small>{{ $article->created_at->format('d.m.Y H:i') }}</small>--}}
{{--                                            <h2>--}}
{{--                                                {{ $article->title }}--}}
{{--                                            </h2>--}}
{{--                                            <p>--}}
{{--                                                {!! $article->body !!}--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <hr>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}


{{--                        </div>--}}

                    </div>

                </div>
            </div>
        </div>
@endsection
