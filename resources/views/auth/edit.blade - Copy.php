@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                <!--
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('edit/'.$user->id) }}">
                -->
                    <form class="form-horizontal" role="form" method="POST"}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                            <!--
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            -->
                                <input id="name" type="text" class="form-control" name="name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hometown') ? ' has-error' : '' }}">
                            <label for="hometown" class="col-md-4 control-label">Home Town</label>

                            <div class="col-md-6">
                                <input id="hometown" type="text" class="form-control" name="hometown" value="{{ old('hometown') }}" required>

                                @if ($errors->has('hometown'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hometown') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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


                <!--
@section('content')
 {{ Form::open(URL::current(),'POST',array('class'=>'form-horizontal')) }}
 <fieldset>
 <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
 {{ Form::label('title','�^�C�g����',array('class'=>'control-label')) }}
 <div class="controls">
 {{ Form::text('title',$collections->title) }}
 {{ $errors->has('title') ? $errors->first('title','<p><span class="label label-important">:message</span></p>') : '' }}
 </div>
 </div>

 <div class="control-group">
 {{ Form::label('col_code','�R�[�h�ԍ�',array('class'=>'control-label')) }}
 <div class="controls">
 {{ Form::text('col_code',$collections->col_code) }}
 {{ $errors->has('col_code') ? $errors->first('col_code','<p><span class="label label-important">:message</span></p>') : '' }}
 </div>
 </div>
 <div class="control-group">
 {{ Form::label('save_space','�ۊǏꏊ',array('class'=>'control-label')) }}
 <div class="controls">
 {{ Form::text('save_space',$collections->save_space) }}
 {{ $errors->has('save_space') ? $errors->first('save_space','<p><span class="label label-important">:message</span></p>') : '' }}
 </div>
 </div>
 <div class="form-actions">
 {{ Form::hidden('id',$collections->id) }}
 {{ Form::submit('�f�[�^�X�V',array('class'=>'btn btn-primary')) }}
 </div>
 </fieldset>
 {{ Form::close() }}
@endsection
                -->
