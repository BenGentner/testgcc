@component('mail::message')
    # Von Kontaktformular:

    Name: {{ $request->name }}
    E-Mail: {{ $request->email }}
    Text:

    {{ $request->message }}


@endcomponent
