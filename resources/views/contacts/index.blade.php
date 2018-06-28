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
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Add</button>
    </li-->
    <li class="nav-item" style="font-family: 'Montserrat', sans-serif;">
      <h2><a class="nav-link" href="./">  {{ config('app.name') }} </a></h2>
    </li>
    <li class="nav-item">&nbsp;&nbsp;
    <a class="btn btn-primary" href='create'>Add</a>
    </li>
    
  </ul>
  <hr>


  <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
    {{-- display success message --}}
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    @endif

    {{-- display delete message --}}
    @if (Session::has('success1'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success:</strong> {{ Session::get('success1') }}
      </div>
    @endif
            <table class="table table-hover ">
                <thead class="thead-light">
                    <th>Contacts</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody> 
                {{-- display stored contacts --}}
                @if (count($storedContacts) > 0)
                    @foreach ($storedContacts as $storedContact)
                        <tr>
             <td><a href="{{ route('contacts.show', ['contacts'=>$storedContact->id]) }}">{{ $storedContact->fname }} {{ $storedContact->lname }}</a> </td>
                            <td><a href="{{ route('contacts.edit', ['contacts'=>$storedContact->id]) }}" >
                                <img height="35" width="23" title="Edit" src="{{ asset('css/create.svg') }}">
                                </a>
                            </td>
                            <td >
                                <form action="{{ route('contacts.destroy', ['contacts'=>$storedContact->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <input type="image" height="35" width="23" title="Delete" src="{{ asset('css/trash.svg') }}" value="Delete">
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
</body>
</html>

