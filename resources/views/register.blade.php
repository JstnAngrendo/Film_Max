
{{-- <div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
      <form action="{{ route('register') }}" method="post">
        @csrf
        
        <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username"required value={{ old('username')}}>
            <label for="username">Username</label>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"id="email" placeholder="name@example.com" required value={{ old('email')}} >
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    
        
        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
    </main>
  </div>
</div> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <style>
      body {
          /* font-family: inter; */
          background-color: #f4f4f4;
          margin: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
      }

      .container {
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          width: 400px;
      }

      .container h2{
          display: flex;
          justify-content: center;
      }

      form {
          padding: 0 40px;
          display: flex;
          flex-direction: column;
      }

      label {
          margin-bottom: 8px;
      }

      input {
          border: 1px solid rgba(0, 0, 0, 0.2);
          border-radius: 8px;
          padding: 8px;
          margin-bottom: 16px;
          box-sizing: border-box;
      }

      Button {
          margin-top: 10px;
          margin-bottom: 0;
          border: 0;
          border-radius: 50px;
          background-color: #C69749;
          color: white;
          cursor: pointer;
          height: 40px;
      }

      Button:hover {
          background-color: #986e2b;
      }

      .register-link {
          text-align: center;
      }

      .register-link a{
          color: red;
          text-decoration: none;
      }

      ::placeholder{
          opacity: 50%;
      }
      
      span{
          color: red;
      }
  </style>
</head>
<body>

    <div class="container">
        <h2>Create Account</h2>
        <form action={{ route('register') }} method="post">
          @csrf
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="@error('username') is-invalid @enderror" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" placeholder="Enter your username" required value={{ old('username')}}>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email"  class="@error('email') is-invalid @enderror" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" placeholder="Enter your email address" required value={{ old('email')}}> 
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" placeholder="Enter your password" required>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="/">Login</a></p>
        </div>
    </div>

    <script>
        function clearPlaceholder(element) {
            element.placeholder = '';
        }

        function restorePlaceholder(element) {
            if (element.value === '') {
                element.placeholder = 'Enter your ' + element.name;
            }
        }
    </script>

</body>
</html>
