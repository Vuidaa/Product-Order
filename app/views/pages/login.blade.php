@extends('layout.main')

@section('content')
	<div class='col-md-6 col-md-offset-3'>
        <h1 class='main-heading'>Administracijos prisijungimas</h1>
        {{Form::open(['route'=>'admin.login.post', 'role'=>'form'])}}
            <div class="form-group">
                {{Form::label('email','El. paštas:')}}
                {{Form::email('email',Input::old('email'),['class'=>'form-control','placeholder'=>'admin@page.lt'])}}

                @if($errors->has('email'))
                    <div class='alert alert-danger'>{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('password','Slaptažodis:')}}
                {{Form::password('password',['class'=>'form-control','placeholder'=>'password'])}}

                @if($errors->has('password'))
                    <div class='alert alert-danger'>{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class='form-group'>
                {{Form::submit('Prisijungti',['class'=>'btn btn-default'])}}
            </div>
        {{Form::close()}}
    </div>
@stop