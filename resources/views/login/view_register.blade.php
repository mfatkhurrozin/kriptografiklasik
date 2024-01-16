<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/')}}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/')}}dist/css/adminlte.min.css">
  <style>
    .card {
      border-radius: 15px; /* Adjust the value to control the roundness of the corners */
    }
  </style>
</head>
<body class="hold-transition register-page" style="background-color: #F9F5EB;">
  <div class="register-box">
    <div class="card" style="background-color: #152A38;">
      <div class="card-body register-card-body text-center" style="color: rgb(0, 0, 0);">
        <h1 style="margin-bottom: 40px;"><strong>Register</strong></h1>
        <form action="{{url('register')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control
            @error('name')
              is-invalid
            @enderror
            " placeholder="Full Name" name="name" value="{{ old('name')}}">
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control
            @error('username')
              is-invalid
            @enderror
            " placeholder="Username" name="username" value="{{ old('username')}}">
            @error('username')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control
                @error('email')
                    is-invalid
                @enderror
            " placeholder="Email" name="email" value="{{ old('email') }}">
            
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <input type="hidden" name="level" value="1">

          <div class="input-group mb-3">
            <input type="password" class="form-control
              @error('password') is-invalid @enderror
              " placeholder="Password" name="password" id="password">
            <div class="input-group-append">
              <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                <i class="fas fa-eye" id="togglePasswordIcon"></i>
              </span>
            </div>
            @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>


          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-block" style="background-color: #FFD700; width: 50%; margin: 0 auto; margin-top: 30px;">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="{{ asset('/')}}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/')}}dist/js/adminlte.min.js"></script>
<script>
  function togglePassword() {
    var passwordInput = document.getElementById("password");
    var togglePasswordIcon = document.getElementById("togglePasswordIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordIcon.className = "fas fa-eye-slash";
    } else {
      passwordInput.type = "password";
      togglePasswordIcon.className = "fas fa-eye";
    }
  }
</script>
</body>
</html>
