@component('mail::message')
# Bem-vindo à Nanium!

Você tem uma reunião marcada para : {{ date('M j, Y', strtotime($mailInfo->meetStartDate)) }}.

Tópico: {{$mailInfo->meetingName}} :

Sala: {{$mailInfo->room}}<br>
Motivo: {{$mailInfo->visitReason}}

O seu código de barras:<br>
@component('mail::panel')

{!! DNS1D::getBarcodeHTML($mailInfo->meetStartDate, 'C128') !!}
@endcomponent


@component('mail::button',['url' => 'www.nanium.pt', 'color' => 'green'])
IMPRIMIR
@endcomponent


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
