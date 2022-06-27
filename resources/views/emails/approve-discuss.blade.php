@component('mail::message')

Hi {{$details['discuss']->user->full_name}},

I hope this email finds you well.
<br>

Thanks for sharing this disucss with our community, after reviewing you'r discuss <br>
we accepted it. you can see it on:<br>

@component('mail::button', ['url' => route('frontend.discusses.show', $details['discuss']->uuid)])
  View Discuss
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
