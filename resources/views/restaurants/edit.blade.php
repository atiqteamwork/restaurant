@extends('layouts.layout')
@section('title', 'Add New Restaurant')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add New Restaurant</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">New Restaurant</div>
            <div class="panel-body">
            	<div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            
            	 <!--<select class="basic-select2 form-control" data-select1>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>-->
                                    

            	{{ Form::open(array('url' => 'admin/restaurant/add_new','id'=>'new_restaurant')) }}
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('city_id', 'City', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('city_id', [$cities],null ,['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('title', 'Restaurant Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('title','', ['class' => 'form-control', 'placeholder'=>'Enter Restaurant Name/Title', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('description', 'Description:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Description'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('email', 'Email Address', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Email('email','', ['class' => 'form-control', 'placeholder'=>'Email Address', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('address', 'Address', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('address','', ['class' => 'form-control', 'placeholder'=>'Enter Address', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('phone_primary', 'Primary Phone', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('phone_primary','', ['class' => 'form-control', 'placeholder'=>'Primary Phone', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('phone_secondary', 'Secondary Phone', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('phone_secondary','', ['class' => 'form-control', 'placeholder'=>'Secondary Phone'])}}
                                </div>
                            </div>
                        </div>
                        
                        <hr />
                        
                        
                         <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('open_time', 'Opening Time', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::time('open_time','', ['class' => 'form-control', 'placeholder'=>'12:00 AM', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        
                         <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('close_time', 'Closing Time', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::time('close_time','', ['class' => 'form-control', 'placeholder'=>'12:00 AM', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('is_takeaway_only', 'Restaurant Type', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('is_takeaway_only', ['true' =>'Takeaway Only', "false"=>'Delivery and Takeaway'],null ,['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label class="text-right">Auto Complete</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select class="basic-select2 form-control" multiple="multiple" data-select1>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        
                        {{Form::submit('Save Restaurant',['class' => 'btn btn-primary'])}}
                        
                        
                        <hr>


                        

                        <!--<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label class="text-right">Placeholder</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select class="select2-placeholder form-control" data-select2>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>-->

                        <hr>

                        <!--<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label class="text-right">Maximum Selection</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                        </div>-->
                    {{ Form::close() }}
            	
            </div>
        </div>
    </div>
</div>

@stop


@section('script') 
<!-- jQuery 2.2.3 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<script>
	$(document).ready(function () {	
		
		$("#new_restaurant").on("submit", function(){			
			$.ajax({
				type: "POST",
				url: "{{ url('admin/restaurant/add_new')}}",
				data: $(this).serialize(),
				success: function (response) {
					if (response == 'Success') {
						location.href = "{{ url('admin/restaurants')}}";		
					} else {
						$(".alert span").text( response );
						$(".alert").fadeIn(400);
					}
				}
			});
			
			return false;
		});
	});
</script> 
@stop