<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ROOT_MEMO</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="data/signup.php">
      <img class="mb-4" src="root_kjh.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign UP</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="id" id="inputEmail" class="form-control" placeholder="ID" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign UP</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>
