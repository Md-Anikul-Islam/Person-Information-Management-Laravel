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
  <h2 class="text-center">Basic From</h2>
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
  
  
  
  
  
  <!-- THIS PART ARE THE FROM PART -->
  
  <form action="{{url('/userdata')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="NAME">NAME:</label>
      <input type="text" class="form-control"  placeholder="Enter your name" name="name">
    </div>

    <div class="form-group">
      <label for="	EMAIL">	EMAIL:</label>
      <input type="	text" class="form-control"  placeholder="Enter your email" name="email">
    </div>

    <div class="form-group">
      <label for="	PHONE">	PHONE:</label>
      <input type="	number" class="form-control"  placeholder="Enter your number" name="phone">
    </div>

    <div class="form-group">
      <label for="IMAGE">IMAGE:</label>
      <input type="file" class="form-control"   name="image">
    </div>

     
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>

<!-- THIS PART ARE DESIGN PART OF FROM EDIT AND DELETE DATA -->


<div class="row">
<div class="col-md-12">
<table class="table table-hover">
    <thead>
      <tr>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>IMAGE</th>
        <th>ACTION</th>
      </tr>
    </thead>


    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user['NAME']}}</td>
        <td>{{$user['EMAIL']}}</td>
        <td>{{$user['PHONE']}}</td>
        <td><img src="{{asset('public/img/'.$user['IMAGE'])}}" width="150px" height="150px" /></td>
       
        <td><a href="{{url('/edit-users/'.$user['ID'])}}">edit</a><a href="{{url('/delete-users/'.$user['ID'])}}">delete</a></td>
      </tr> 
    @endforeach
    </tbody>

</table>
</div>
</div>   

</div>
</body>
</html>