@component('mail::message')
# Bem-vindo à Nanium!

Você tem uma reunião marcada para o dia {{$mailInfo->meetStartDate}}.

Reunião {{$mailInfo->meetingName}} :

Sala: {{$mailInfo->room}}<br>
Motivo: {{$mailInfo->visitReason}}

@component('mail::panel')
O seu código de barras:<br>

{!! DNS1D::getBarcodeHTML($mailInfo->meetStartDate, 'C128') !!}

@endcomponent


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
