<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container" style="padding-top: 1%;">
        <div class="card">
            <div class="card-body col-md-12">
                <h5 class="card-title">Add user</h5>
                <form action="{{route('user.store')}}" method="post">
    @csrf
                <div class="row">
            
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="First name" aria-label="first_name" name="first_name">
                    </div>
                    @error('first_name')
                    <span>{{$message}}</span>
                    @enderror
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="last_name" name="last_name">
                    </div>
                    @error('last_name')
                    <span>{{$message}}</span>
                    @enderror
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="Email" aria-label="email" name="email">
                    </div>
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="Phone number" aria-label="phone_number" name="phone_number">
                    </div>
                    @error('phone_number')
                    <span>{{$message}}</span>
                    @enderror
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="State" aria-label="state" name="state">
                    </div>
                    @error('state')
                    <span>{{$message}}</span>
                    @enderror
                    <div class="col-md-6" style="padding-top: 1%;">
                        <input type="text" class="form-control" placeholder="Country" aria-label="country" name="country">
                    </div>
                    @error('country')
                    <span>{{$message}}</span>
                    @enderror

                    <div class="col" style="padding-top: 1%;">
                        <button style="float: right;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
                </form>
            </div>
        
        </div>

  @if($message = Session::get('success'))
  <div class="alert alert-success">
  <p>{{ $message}}</p>
  </div>
  @endif


 
          <div class="card" style="margin-top: 5%;">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First_name</th>
                    <th scope="col">Last_name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone_number</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td >{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->country }}</td>
                    
      <!-- modal start -->              
      <div class= "modal fade" id="edit-modal-{{$user->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
<form action="{{ route('user.update',$user->id) }}" method="post" id="editform">
   @csrf

<div class="modal-body">

    <div class="form-group">
    <label>First name</label>
    <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" class="form-control" placeholder="First name">
    </div>
    @error('first_name')
    <span>{{$message}}</span>
    @enderror
    <div class="form-group">
    <label>Last name</label>
    <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}"  class="form-control" placeholder="Last name">
    </div>
    @error('last_name')
    <span>{{$message}}</span>
    @enderror
    <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" id="email" value="{{$user->email}}"  class="form-control" placeholder="Email">
    </div>
    @error('email')
    <span>{{$message}}</span>
     @enderror
    <div class="form-group">
    <label>Phone number</label>
    <input type="text" name="phone_number" id="phone_number" value="{{$user->phone_number}}" class="form-control" placeholder="Phone number">
    </div>
    @error('phone_number')
     <span>{{$message}}</span>
    @enderror
    <div class="form-group">
    <label>State</label>
    <input type="text" name="state" id="state" value="{{$user->state}}" class="form-control" placeholder="State">
    </div>
    @error('state')
    <span>{{$message}}</span>
    @enderror
    <div class="form-group">
    <label>Country</label>
    <input type="text" name="country" id="country" value="{{$user->country}}" class="form-control" placeholder="Country">
    </div>
    @error('country')
    <span>{{$message}}</span>
     @enderror
    </div>
    <div class="model-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
     <button type="submit" class="btn btn-primary">Update data</button>
     </div>
     </form>
     </div>
     </div>
     </div>

     <!-- End modal -->
     <td>
        <a class="btn btn-primary" style="margin-right:5%" data-toggle="modal" data-target="#edit-modal-{{$user->id}}" >Edit</a>
        <form action="{{ route('user.destroy',$user->id) }}" method="post">
    {{csrf_field() }}

                    <button  class="btn btn-danger">Delete</button>
                    <form>
                    </td>
                    </tr>
                   @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>