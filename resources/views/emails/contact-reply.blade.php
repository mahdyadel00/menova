@component('mail::message')
# Welcome, {{$data['name']}}
 
{{$data['reply']}} 
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
