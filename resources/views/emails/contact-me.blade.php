@component('mail::message')

# It works again!

Topic name is {{ $topic }}

- List element one
- List element two
- List element three
- List element four

@component('mail::button', ['url' => 'http://google.com'])
	Visit Site Now
@endcomponent

@endcomponent

