@extends('layout')

@section('content')
    <div class="section section-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>Kontakt</h1>
                    </div>

                    <div class="card">

                        <div class="col-sm-6 col-lg-offset-3">
                            <div class="content text-center">Falls Ihr eine Frage habt, nutzt gerne unser
                                Kontaktformular:
                            </div>
                            <form class="form" action="/kontakt" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group is-empty">
                                        <input type="text" value="" placeholder="Name" name="name" class="form-control"
                                               required>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group is-empty">
                                        <input type="text" value="" placeholder="E-Mail" name="email"
                                               class="form-control" required>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group is-empty">
                                        <textarea name="message" class="form-control" placeholder="Nachricht"
                                                  rows="10" required></textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group is-empty">
                                        <button class="btn btn-primary" type="submit">Senden
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>
                                        Durch Klicken auf den "Senden"-Button bestätige ich, dass meine persönlichen
                                        Daten gemäß der hinterlegten <a href="/datenschutz"
                                                                        title="Datenschutzerklärung">Datenschutzerklärung</a>
                                        verarbeitet werden.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection