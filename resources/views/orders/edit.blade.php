@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Edit Order: {{ $order->id }}</h1>

            @if($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                {!! Form::open(['route' => ['admin.orders.update', $order->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('id','ID:') !!}
                    {!! Form::text('id', $order->id, ['class'=>'form-control','disabled']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status:') !!}
                    {!! Form::select('status', $status, $order->status, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save Order', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

        </div>
    </div>
@endsection