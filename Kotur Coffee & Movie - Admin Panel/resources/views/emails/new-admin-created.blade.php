@component('mail::message')
    # Креиран е нов администратор

    Здраво, **{{ $adminName ?? 'Админе' }}**!

    Креиран е нов администратор со следниве податоци:

    - **Име и презиме:** {{ $name }}
    - **E-пошта:** {{ $email }}

    @component('mail::button', ['url' => route('admins', $newAdmin->id)])
        Преглед на администратори 
    @endcomponent

    Со почит,<br>
    Систем за корисници на {{ config('app.name') }}
@endcomponent
