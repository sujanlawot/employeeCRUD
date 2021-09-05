@if( Session::has('success'))
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{ Session::get('success') }}</p>  
  </div>
@elseif( Session::has('error'))
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Sorry!</h4>
    <p>{{ Session::get('error') }}</p>  
  </div>    
@endif