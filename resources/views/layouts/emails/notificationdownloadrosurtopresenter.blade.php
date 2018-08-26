@extends('layouts.emails.master')

@section('content')
	<td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">                       
                            
        <p>Aplikan yang mungkin kamu kasih link ke web baru saja mendownload brosur. Segera di Follow up.</p>

		<p>Nama : {{$aplikan->nama}}</p>
        <p>No. Telpon : {{$aplikan->telepon}}</p>
        <p>Email : {{$aplikan->email}}</p>
        
    </td>
@stop