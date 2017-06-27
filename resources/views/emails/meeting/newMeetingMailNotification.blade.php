@component('mail::message')

# Bem-vindo à Nanium @if(!empty( $mailInfo2->visitorName ))
{{ $mailInfo2->visitorName }}
@else
{{ $mailInfo2->username }}
@endif



Você tem uma reunião marcada para {{ date('M j, Y', strtotime($mailInfo->meetStartDate)) }}.

Reunião {{$mailInfo->meetingName}} :

Sala: {{$mailInfo->room}}<br>
Motivo: {{$mailInfo->visitReason}}

O seu código de barras:<br>

@component('mail::panel')

 @if(!empty( $mailInfo2->visitorName ))
{!! DNS1D::getBarcodeHTML('$mailInfo2->idVisitor', 'C128') !!}
@else
{!! DNS1D::getBarcodeHTML(['$mailInfo2->user_idUser', 'C128') !!}
@endif

@endcomponent


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
