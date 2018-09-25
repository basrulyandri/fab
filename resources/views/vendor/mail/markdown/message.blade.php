@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => route('page.index')])
            BAFSTUDIES.COM
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}    
    @slot('subcopy')
        @component('mail::subcopy')
            {{getOption('web_title')}}
            Gedung Perkantoran International Finance Center Tower 2, Lantai 33 Jl. Jend. Sudirman Kav.22-23 Jakarta Selatan 12920
            +6287878917753            
            info@bafstudies.com
        @endcomponent
    @endslot
    

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ getOption('web_title') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
