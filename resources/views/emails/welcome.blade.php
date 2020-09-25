@component('mail::message')
# You registered as an employee

@component('mail::button', ['url' => ''])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
