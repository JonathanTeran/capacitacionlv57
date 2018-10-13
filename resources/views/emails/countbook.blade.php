@component('mail::message')
# CONTADOR DE LIBROS

Los libros que hay en el sitio suman en ${{$price}}

@component('mail::button', ['url' => route('home')])
VISITAR EL SITIO
@endcomponent

GRACIAS,<br>
{{ config('app.name') }}
@endcomponent
