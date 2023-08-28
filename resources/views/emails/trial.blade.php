<x-mail::message>
# Introduction

Hi, <b>{{$name}}</b>
Your trial has ended today. To continue using our service, please ckick the button
below to reactive your membership.
<x-mail::button :url="{{route('subscribe')}}">
Reactive Membership.
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
