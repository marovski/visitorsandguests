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


<<<<<<< HEAD
{!! DNS1D::getBarcodeHTML('$mailInfo2->idVisitor', '$mailInfo2->visitorName', 'C39') !!}
=======
{!! DNS1D::getBarcodeHTML('$mailInfo2->idVisitor', 'C128', 1,35) !!}


>>>>>>> 070336d80a52b7c7fa0e877fa05484a99ea6da06


@endcomponent
@else


Obrigado,<br>
{{ config('app.name') }}
@endif
@endcomponent
