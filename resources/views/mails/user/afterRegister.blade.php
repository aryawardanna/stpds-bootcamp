@component('mail::message')
# Welcome

Hi {{ $user->name }}
<br>
Welcome to Stpds Bootcamp, your account has been created successfull. Now you can choose your best match camp!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
