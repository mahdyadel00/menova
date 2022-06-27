@component('mail::message')

New discuss has been published <br>

@component('mail::button', ['url' => route('admin.discusses.show', $details['discuss']->id)])
  View Discuss
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
