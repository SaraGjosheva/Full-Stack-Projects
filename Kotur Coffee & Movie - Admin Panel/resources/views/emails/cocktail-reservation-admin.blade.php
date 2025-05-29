@component('mail::message')
    # Нова резервација за маса 

    Здраво, **{{ $adminName ?? 'Админе' }}**!

    Пристигна нова резервација:

    - **Име и презиме:** {{ $full_name }}
    - **E-пошта на клиентот:** {{ $email }}
    - **Тип на настан:** {{ $event_type }}
    - **Порака од клиентот:**
    {{ $message }}

    **Датум на резервација:** {{ \Carbon\Carbon::parse($reservation_date)->format('d.m.Y') }}
    **Време на резервација:** {{ \Carbon\Carbon::parse($reservation_hour)->format('H:i') }}

    {{-- @component('mail::button', ['url' => route('cinema_reservation', $cinemaReservation->id)])
        Детали за резервацијата
    @endcomponent --}}

    Со почит,<br>
    Систем за резервации на {{ config('app.name') }}
@endcomponent
