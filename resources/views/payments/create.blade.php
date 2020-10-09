@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center"></div>
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
            @endif
            <form action="/payments" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ">Make Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
