@component('mail::message')
# WELCOME

<p>Hi {{$user->getNameOrEmail()}}, Thank you for your registration with {{getOption('web_title')}}.</p>

<p>Now,you will be able to log in to your BAF account with click the button below</p>


@component('mail::button', ['url' => route('page.login')])
	Login
@endcomponent

Kind regards,<br>
BAF Team
@endcomponent
