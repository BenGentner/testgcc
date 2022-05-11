@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>{{ $page->title }}</h1>
                    </div>

                    <div class="card">
                        <div class="content">
{{--                            TODO: - test + remove--}}
{{--                            {{csrf_field()}}--}}
                            {!! $page->content !!}

                        </div>
                    </div>
                </div>
            </div>
            @if(session()->has("email"))
                <flash message="{{session('email')}}"></flash>
            @endif
        </div>
@endsection

