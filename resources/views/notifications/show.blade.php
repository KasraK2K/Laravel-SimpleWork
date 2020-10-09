@extends('../layouts.app')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-center align-items-center"></div>
		<div class="row">
			<div class="col-md-12">
				@forelse($notifications as $notification)
					@if($notification->type === 'App\Notifications\PaymentResived')
						<p class="alert alert-success">We have recived ${{ $notification->data['amount'] }} payment at {{ $notification->created_at->format('Y/m/d H:i:s') }}</p>
					@endif
				@empty
					<p class="alert alert-primary">There is no unread notifications</p>
				@endforelse
			</div>
		</div>
	</div>
@endsection
