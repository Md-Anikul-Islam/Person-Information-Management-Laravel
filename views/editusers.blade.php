<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link real="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
<!-- THIS PART ARE DESIGN PART -->
  
<style type="text/css">

.row 
{
    background-color: #CED6CA;
}
h2
{
  background-color: #DCE613;
}
a 
{
   padding: 5px;
}

  </style>
</head>








<body>

<div class="container">
  <h2 class="text-center">Edit User Basic From</h2>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
  
  <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))

           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           </p>
         @endif
      @endforeach
  </div> 
  
  
  
<!-- SET TO AGIN DATA UPDATE -->
  
  
  
  <form action="{{url('/update-users')}}" method="post"  enctype="multipart/form-data">
  @csrf
  <input type="hidden" value="{{$userdata['ID']}}" name="user_id">
    <div class="form-group">
      <label for="NAME">NAME:</label>
      <input type="text" class="form-control" value="{{$userdata['NAME']}}" placeholder="Enter your name" name="name">
    </div>
   
    <div class="form-group">
      <label for="	EMAIL">	EMAIL:</label>
      <input type="	text" class="form-control" value="{{$userdata['EMAIL']}}" placeholder="Enter your email" name="email">
    </div>

    <div class="form-group">
      <label for="	PHONE">	PHONE:</label>
      <input type="	number" class="form-control" value="{{$userdata['PHONE']}}" placeholder="Enter your number" name="phone">
    </div>  

    
    <div class="form-group">
      <label for="IMAGE">IMAGE:</label>
      <input type="file" class="form-control"   name="image">
    </div>

    <div class="form-group">
    <img src="{{asset('public/img/'.$userdata['IMAGE'])}}" width="150px" height="150px" />
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>


</div>
</body>
</html>