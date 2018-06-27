<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
<br>

  <ul class="nav justify-content-center">
    <!--li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li-->
    <li class="nav-item" style="font-family: 'Montserrat', sans-serif;">
      <h2><a class="nav-link" href="{{ route('contacts.index') }}">  {{ config('app.name') }} </a></h2>
    </li>
    <li class="nav-item">&nbsp;&nbsp;
    <a href='{{ URL::previous() }}' data-toggle="tooltip" title="Back">
      <img  height="55" width="33" src="{{ asset('css/back.svg') }}">
    </a>
    </li>    
  </ul>
  <hr> 

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div>
{{-- display success message --}}
    @if (Session::has('success2'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success:</strong> {{ Session::get('success2') }}
      </div>
    @endif
    {{-- display error message --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error:</strong
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif   

    <form action="{{ route('contacts.update', [$contactEdit->id]) }}" method='POST'>
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    	 <div class="form-group">
              <label>First Name:</label>
              <input type="text" class="form-control" name="ufname"
               value="{{ $contactEdit->fname }}">
            </div>
            <div class="form-group">
              <label>Last Name:</label>
              <input type="text" class="form-control" name="ulname" 
              value="{{ $contactEdit->lname }}">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email"
                value="{{ $contactEdit->email }}">
              </div>
              <div class="form-group">
                  <label>Phone Number:</label>
                  <input type="number" class="form-control" name="unumber"
                  value="{{ $contactEdit->number }}">
                </div>
            <input type="submit" class="btn btn-success " value="Save Changes">
            <a href="{{ URL::previous() }}" class="btn btn-danger ">Go Back</a>
    </form>
  </div>
        </div>
        <div class="col-md-2"></div>
    </div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>

