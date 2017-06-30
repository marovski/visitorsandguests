@component('mail::message')

# Bem-vindo à Nanium @if(!empty( $mailInfo2->visitorName ))
{{ $mailInfo2->visitorName }}
@else
{{ $mailInfo2->username }}
@endif



Tem uma reunião marcada para {{ date('M j, Y', strtotime($mailInfo->meetStartDate)) }}, às {{ date('H:i', strtotime($mailInfo->meetStartDate)) }}.

Reunião {{$mailInfo->meetingName}} :

Sala: {{$mailInfo->room}}<br>

Motivo: {{$mailInfo->visitReason}}

 @if(!empty( $mailInfo2->visitorName ))
O seu código de barras:<br>

@component('mail::panel')

  <div align="center">
{!! DNS2D::getBarcodeSVG("@{{ $mailInfo2->idVisitor  }}", 'QRCODE') !!}

 </div> 


@endcomponent
@else


Obrigado,<br>
{{ config('app.name') }}
@endif
@endcomponent