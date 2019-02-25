@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                            <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_role" class="col-md-4 col-form-label text-md-right">{{ __('user_role') }}</label>

                            <div class="col-md-6">
                                <input id="user_role" type="number" class="form-control{{ $errors->has('user_role') ? ' is-invalid' : '' }}" name="user_role" value="{{ old('user_role') }}" required>

                                @if ($errors->has('user_role'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('department_id') }}</label>

                            <div class="col-md-6">
                                <input id="department_id" type="text" class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" value="{{ old('department_id') }}" >

                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group_id" class="col-md-4 col-form-label text-md-right">{{ __('group_id') }}</label>

                            <div class="col-md-6">
                                <input id="group_id" type="number" class="form-control{{ $errors->has('group_id') ? ' is-invalid' : '' }}" name="group_id" value="{{ old('group_id') }}" >

                                @if ($errors->has('group_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('group_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
