@component('mail::message')
# Вашата пријава е примена

Здраво {{ $full_name }},

Ви благодариме што аплициравте за позиција **{{ $position }}**. Податоците што ги добивме:

- **Име и презиме:** {{ $full_name }}
- **Телефон:** {{ $phone_number }}
- **E-пошта:** {{ $email }}
- **CV:** [Превземи го Вашиот CV]({{ asset('storage/' . $cv_path) }})

Вашата пријава беше примена на {{ \Carbon\Carbon::parse($application->created_at)->format('d.m.Y H:i') }}. Ќе ве контактираме наскоро.

Со почит,<br>
Тим за вработување на {{ config('app.name') }}
@endcomponent