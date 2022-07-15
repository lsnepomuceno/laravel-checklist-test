@component('mail.html.message')
    Olá {{ $interest->name }},

    Você se cadastrou para receber informações sobre o bolo <strong>{{ $interest->cake->name }}</strong>.

    Entraremos em contato em breve.
@endcomponent
