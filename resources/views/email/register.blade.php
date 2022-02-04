@component('mail::message')
# TEST

Welcome

@component('mail::button', ['url' => 'http://texnopos.uz/'])
Active email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent