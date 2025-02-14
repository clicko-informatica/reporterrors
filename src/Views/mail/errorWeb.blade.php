@component('mail::message')
    # ERROR EN LA WEB DE CLiCKO ({{ $domain }})

    Mensaje de error:
    **{{ $e->getMessage() }}**

    Archivo:
    **{{ $e->getFile() }}** (línea {{ $e->getLine() }})

    Gracias,
    **CLiCKO**
@endcomponent
