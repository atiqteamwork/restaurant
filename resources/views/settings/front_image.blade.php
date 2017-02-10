@extends('layouts.layout')
@section('title', 'Front Page Background Image Setting')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Front Page Background Image Setting</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">Front Page Background Image Setting</div>
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
                {{ Form::open( ['url' => 'admin/settings/update-frontpage-image', 'files'=> true, 'id'=>'new_front_image'] ) }}
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="setting_id" id="setting_id" value="{{$settings[0]->id}}">
                
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('prev_image', 'Current Image')}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> <img width="80%" src="{{$image_path}}" align="Background Image" /> </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('image', 'Chose New Image')}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::File('image')}} </div>
                    </div>
                </div>
                
                
               
                
                <hr>
                {{Form::submit('Update Image',['class' => 'btn btn-primary'])}}
                <hr>
                {{ Form::close() }} </div>
        </div>
    </div>
</div>
@stop