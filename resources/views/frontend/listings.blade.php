<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant Search</title>
</head>

<body>

@foreach( $dishes as $dish)
	{{$dish->dish_title}} <a href="#" class="add-to-cart" data-key="{{$dish->id}}" data-value="Dishes">Add to Cart</a><br>
    
@endforeach

<br />
@foreach( $deals as $deal)
	{{ $deal->deal_title }} <a href="#" class="add-to-cart" data-key="{{$deal->id}}" data-value="Deals">Add to Cart</a><br>
    
@endforeach
</body>
</html>

<script>
	$(document).ready(function() {
		var test = $("#restaurant_id").val();
		
		
		$("#add-to-cart").click(function() {
            
        });
		
		
		
        $('#restaurant_text').keyup(function () {
			var keyword = $(this).val();
			var len		= keyword.length;
			
			if( len >= 3) {
				$.ajax({
					type: 'POST',
					url: "{{url('c/get_restaurants')}}",
					data:{
						'keyword': keyword,
						'_token': '{{csrf_token()}}'
					},
					success: function (response) {
						$("#restaurants").html(response);
					},
					error:function () {
						
					}
				});
				
			}
		});
		
		
		$("#restaurants").change(function() {			
			var restaurant_id = $(this).val();
			
			$.ajax({
				type: 'POST',
				url: "{{url('c/get_restaurant_areas')}}",
				data:{
					'restaurant_id': restaurant_id,
					'_token': '{{csrf_token()}}'
				},
				success: function (response) {
					$("#areas").html(response);
				},
				error:function () {
					
				}
			});
        });
		
		
		$("#search_dishes").on("submit", function(){
	
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'), // "{{url('c/get_restaurants')}}",
				data:$(this).serialize(),
				success: function (response) {
					alert( "Test" );
				},
				error:function () {
					alert("Some error");
				}
			});
			
			
			return false;	
		})
		
    });
	
</script>