@component('mail::message')
# Order Detail

Thank you for ordering from BAF website. Below is your order detail your order :
 @component('mail::table')
    | Course Name   | Fee           | Payment Scheme|
    | ------------- |:-------------:| --------:|
    @foreach($order->items as $item)
    | {{$item->course->title}}      | {{toRp($item->price)}}      | {{$item->paymentScheme()}}      |
    @endforeach
@endcomponent

#Total {{toRp($order->total_price)}}
@component('mail::promotion')
	Please make payment ti the following Account	
	{!!getOption('bank_account')!!}
@endcomponent
@component('mail::button', ['url' => ''])
See at BAF Web
@endcomponent

Kind Regards,<br>
BAF Team


@component('mail::subcopy')
    {{getOption('web_title')}}
    Gedung Perkantoran International Finance Center Tower 2, Lantai 33 Jl. Jend. Sudirman Kav.22-23 Jakarta Selatan 12920

    Phone : +6287878917753            

    Email : info@bafstudies.com
@endcomponent


@endcomponent
