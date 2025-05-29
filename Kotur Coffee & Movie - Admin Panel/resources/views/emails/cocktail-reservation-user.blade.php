@component('mail::message')
# Резервација за маса

Здраво {{ $full_name }},

Ви благодарам што ни се јавивте за резервирање на маса. Еве ги деталите на Вашата порака:

- **Име и презиме:** {{ $full_name }}
- **E-пошта:** {{ $email }}
- **Тип на настан:** {{ $event_type }}
- **Порака:**  
  {{ $message }}

**Датум на резервација:** {{ \Carbon\Carbon::parse($reservation_date)->format('d.m.Y') }}  
**Време на резервација:** {{ \Carbon\Carbon::parse($reservation_hour)->format('H:i') }}

Со почит,<br>
{{ config('app.name') }}
@endcomponent