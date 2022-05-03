@component('mail::message')
# Post Title: {{$post->title}},

{{$post->description}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
