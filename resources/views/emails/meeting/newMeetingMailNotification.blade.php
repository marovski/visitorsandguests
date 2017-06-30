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


{!! DNS1D::getBarcodeHTML("@{{ $mailInfo2->idVisitor  }}", 'QRCODE', 1,35) !!}




@endcomponent
@else


Obrigado,<br>
{{ config('app.name') }}
@endif
@endcomponent