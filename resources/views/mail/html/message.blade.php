@component('mail.html.layout')
    {{-- Header --}}
    @slot('header')
        @component('mail.html.header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {!! $slot !!}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail.html.subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail.html.footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('Todos os direitos reservados.')
        @endcomponent
    @endslot
@endcomponent
