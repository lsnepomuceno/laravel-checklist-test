@component('mail.html.message')
    Olá {{ $interest->name }},

    Você não está mais na lista para comprar o bolo <strong>{{ $interest->cake['name'] }}</strong>.

    Confira outros bolos, temos diversas opções para você!
@endcomponent
