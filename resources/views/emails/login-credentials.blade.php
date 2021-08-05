@component('mail::message')
# Bienvenido a {{ config('app.name') }}
# Estos son tus datos de usuario!

Utiliza tu usuario y contraseña para iniciar sesión.

@component('mail::table')
| Username | Contraseña |
|:---------|:-----------|
| {{$user->email }} | {{ $password }} |

@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
