@extends("layout")

@section("content")
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>News</h1>
                    </div>

                    <div class="panel panel-default">
                        <single_post  class="panel-body"
                            :post="{{$post}}"
                        ></single_post>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
