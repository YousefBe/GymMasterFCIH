@extends ('layout')
<head>
<link href="/css/signup.css" rel="stylesheet">
</heaad>
@section ('content')
<form action="/action_page.php" >
  <div class="Scontainer" class="col-md-12">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <div class="UserName">
    <label for="UserName"><b>UserName</b></label>
    <br>
    <input type="text" class="form-control" placeholder="Enter Your UserName" name="UserName" required>
    </div>


    <div class="email">
    <label for="email"><b>Email</b></label>
    <br>
    <input type="text" class="form-control"placeholder="Enter Email" name="email" required>
    </div>



    <div class="pass">
    <label for="psw"><b>Password</b></label>
    <br>
    <input type="password" class="form-control"placeholder="Enter Password" name="psw" required>
    </div>


    <div class="reppasas">
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <br>
    <input type="password" class="form-control"placeholder="Repeat Password" name="psw-repeat" required>
    </div>

  
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <br>
      <button type="submit"  class="btn btn-primary">Sign Up</button>
    </div>
  </div>
</form>


@endsection