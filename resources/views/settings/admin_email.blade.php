@extends('layouts.layout')
@section('title', 'Admin Email')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Admin Email</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">Admin Email</div>
            <div class="panel-body">
            
           	@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
                <div class="alert alert-danger" id="alertdanger" style="display:none"><strong>Alert!</strong> <span></span></div>
                <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
                {{ Form::open( ['url' => 'admin/settings/update-admin-email', 'files'=> true, 'id'=>'update_admin_email'] ) }}
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                
                
                @if( isset( $settings ) && count($settings) >0 )
                <input type="hidden" name="setting_id" id="setting_id" value="{{$settings[0]->id}}">
                @endif
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('admin_email', 'Admin E-mail')}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Email('admin_email',   (isset( $settings ) && count($settings) >0)? $settings[0]->value :''   , ['class' => 'form-control', 'placeholder'=>'Administrator Email', 'required'=>'required', 'id'=> 'admin_email'])}} </div>
                    </div>
                </div>
               
                
                <hr>
                {{Form::submit('Update Email',['class' => 'btn btn-primary'])}}
                <hr>
                {{ Form::close() }} </div>
        </div>
    </div>
</div>
@stop