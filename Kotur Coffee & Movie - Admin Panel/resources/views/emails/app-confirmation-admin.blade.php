@component('mail::message')
    # Нова пријава за работа

    Здраво, **{{ $adminName ?? 'Админе' }}**!

    Имаме нова пријава со следниве податоци:

    - **Име и презиме:** {{ $full_name }}
    - **Телефон:** {{ $phone_number }}
    - **E-пошта:** {{ $email }}
    - **Позиција:** {{ $position }}
    - **CV:** [Превземи CV]({{ asset('storage/' . $cv_path) }})

    Пријавата е примена на {{ \Carbon\Carbon::parse($application->created_at)->format('d.m.Y H:i') }}.

    @component('mail::button', ['url' => route('admin.applications.show', $application->id)])
        Преглед на пријавата
    @endcomponent

    Со почит,<br>
    {{ config('app.name') }} – тим за вработување
@endcomponent
