@component('mail::message')
# Bienvenido a {{ config('app.name') }}

Utiliza tu usuario y contraseña para iniciar sesión.
Una vez iniciada sesión, puedes cambiar la contraseña si quieres.
{{-- lenguaje markdown --}}
@component('mail::table')
| Username | Contraseña |
|:---------|:-----------|
| {{$user->email }} | {{ $password }} |

@endcomponent

@component('mail::button', ['url' => url('login')])
Iniciar sesión
@endcomponent

atentamente, {{ config('app.name') }}<br>
@endcomponent
