<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		
		<!-- Meta tag for Ajax form submit -->
        <meta name="_token" content="{{csrf_token()}}" />
		
        <title>Grocery Store</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      <div class="container">
         <div class="alert alert-success" id="response-msg">Response Msg Will Show Here</div>
         <div id="faq_no"></div>
         <form id="myForm">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" id="type">
            </div>
            <div class="form-group">
               <label for="price">Price:</label>
               <input type="text" class="form-control" id="price">
             </div>
             <div class="form-group">
               <label for="select">Select</label>
               <select class="form-control" id="select">
                  <option value="one">One</option>
                  <option value="tow">Two</option>
                  <option value="three">Three</option>
               </select>
             </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
          </form>
      </div>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
	  
	  <!-- Action on change select option -->
      <script>
         jQuery(document).ready(function(){
            jQuery('#select').on('change', function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

            jQuery.ajax({
               url: "{{ url('/grocery/post') }}",
               method: 'post',
               data: {
                  name: jQuery('#name').val(),
                  type: jQuery('#type').val(),
                  price: jQuery('#price').val(),
                  select: jQuery('#select option:selected').val()
               },
               success: function(result){
                  jQuery('#response-msg').show();
                  jQuery('#response-msg').html(result.values);
               }});
            });
         });
      </script>

      <!-- Action on click submit button -->
	  <script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

            jQuery.ajax({
               url: "{{ url('/grocery/post') }}",
               method: 'post',
               data: {
                  name: jQuery('#name').val(),
                  type: jQuery('#type').val(),
                  price: jQuery('#price').val()
               },
               success: function(result){
                  jQuery('#response-msg').show();
                  jQuery('#response-msg').html(result.values);
               }});
            });
         });
      </script>
	  
    </body>
</html>