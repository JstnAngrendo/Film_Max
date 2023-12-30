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

      button {
          margin-top: 30px;
          margin-bottom: 0;
          border: 0;
          border-radius: 50px;
          background-color: #C69749;
          color: white;
          cursor: pointer;
          height: 40px;
      }

      button:hover {
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
      
  </style>
</head>
<body>
    <div class="col-md-5">
      @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      @endif

    <div class="container">
        <h2>Sign In</h2>
        <form action={{route('login')}} method="post">
          @csrf
            <label for="username">Email Address:</label>
            <input class="@error('email') is-invalid @enderror" type="email" name="email" id="username" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" placeholder="Enter your email address" required value={{ old('email') }}>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

            <label for="password">Password:</label>
            <input type="password" name="password" id="password"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" placeholder="Enter your password" required>

            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="/register">Register here</a></p>
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