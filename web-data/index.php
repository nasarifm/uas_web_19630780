<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery-3.4.1.min.js"></script>
  <style>
		body {
	          background: url(img/bg.jpg) no-repeat fixed;
	          -webkit-background-size: 100% 100%;
	          -moz-background-size: 100% 100%;
	          -o-background-size: 100% 100%;
	          background-size: 100% 100%;
          }
          
    .row {
			margin:100px auto;
			width:350px;
			text-align:center;
		}

  </style>
</head>

<body>
<div class="container col-md-10 pull-center row">
			<div class="card">
				<div class="card-body">
          <div class="class container col-md-12 text-dark text-center">
            <h3>Silahkan Login</h3>
          </div>
               <form action="home.php" method="post">

                  <div class="form-group">
                  <h4>username</h4>
                     <input type="text" name="username" class="form-control">
                   </div>
            
                   <div class="form-group">
                   <h4>password</h4>
                    <input type="password" name="password" class="form-control">
                    </div>
                    <td></td>
                    <td><input type="submit" name="login" value="Log In"></td>
                    </tr>
                    </table>
                </form>
        </div>
      </div>
    </div>
</body>

</html>