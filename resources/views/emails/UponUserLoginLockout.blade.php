@component('mail::message')
# Introduction

The user {{ $user }} has been locked out on {{ $timestamp }}.
Please allow 60 seconds before logging in again.

Thanks,<br>
{{ config('app.name') }} Staff
@endcomponent
