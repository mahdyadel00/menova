@component('mail::message')

Hi {{$details['discuss']->user->full_name}},

I hope this email finds you well.
<br>
Unfortunately, after reviewing you'r disscus we can't accept this discuss.

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
