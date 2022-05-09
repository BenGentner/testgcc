@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>{{ $gallery->title }}</h1>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(null === $gallery || null === $files)
                                <div class="row">
                                    Diese Galerie existiert leider nicht.
                                </div>
                            @else
                                <div>
                                    {!! $gallery->content !!}
                                </div>
                                <div class="gallery">
                                    <section
                                            data-featherlight-gallery
                                            data-featherlight-filter="a"
                                    >
                                        <div class="row">
                                            @foreach($files as $file)
                                                <div class="col-md-2" style="margin-bottom: 10px;">
                                                    <a href="/{{ $file }}"><img src="/{{ $file }}"
                                                                                style="width: 165px; max-height: 100%;object-fit: cover;"></a>
                                                </div>

                                            @endforeach
                                        </div>

                                    </section>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.css" type="text/css"
          rel="stylesheet"/>
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.css" type="text/css"
          rel="stylesheet"/>

    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.min.js" type="text/javascript"
            charset="utf-8"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.6/release/featherlight.gallery.min.js"
            type="text/javascript"
            charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.1/jquery.detect_swipe.min.js"></script>

    <script>
        $('a.gallery').featherlightGallery({
            previousIcon: '«',
            nextIcon: '»',
            galleryFadeIn: 300,

            openSpeed: 300
        });
    </script>
@endpush