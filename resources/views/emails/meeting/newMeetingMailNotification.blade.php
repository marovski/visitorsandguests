@component('mail::message')

# Bem-vindo à Nanium @if(!empty( $mailInfo2->visitorName ))
{{ $mailInfo2->visitorName }}
@else
{{ $mailInfo2->username }}
@endif



Tem uma reunião marcada para {{ date('M j, Y', strtotime($mailInfo->meetStartDate)) }}, às {{ date('H:i', strtotime($mailInfo->meetStartDate)) }}.

<b>Reunião:</b> {{$mailInfo->meetingName}} 

<b>Sala:</b> {{$mailInfo->room}}<br>

<b>Tópico:</b> {{$mailInfo->visitReason}}

 @if(!empty( $mailInfo2->visitorName ))
Código de barras identificativo da reunião:<br>

@component('mail::panel')

  <div align="center">
{!! DNS2D::getBarcodeSVG("Id Meeting:$mailInfo->idMeeting,Id Visitor:$mailInfo2->idVisitor, Visitor Name:$mailInfo2->visitorName, Visitor Email:$mailInfo2->visitorEmail", 'QRCODE') !!}
 </div> 
@endcomponent
@endif
@if(empty($mailInfo2->visitorCitizenCard) && empty($mailInfo2->idUser))
Para esta reunião é <b>obrigatória</b> a sua identificação . Por favor traga o seu documento de identificação.
@endif<br>
<br>
Obrigado,<br>
{{ config('app.name') }}
@endcomponent