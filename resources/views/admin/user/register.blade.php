<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EAT & OAT | Create an account</title>
  <link rel="stylesheet" href="\bootstrap4\css\bootstrap.min.css">
  <style>
    .wrapper {
      display: grid;
      grid-auto-flow: column;
      grid-template-columns: repeat(2, 1fr);
      grid-auto-rows: 1fr;
      /* border: 1px solid #ccc; */
      box-shadow: 0px 0px 5px rgba(150, 150, 150, 0.4);
      border-radius: 10px;
    }
    .left-section {
      overflow: hidden;
    }
    .right-section {
      padding: 10px 20px;
    }
    img {
      height: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
    }
    .password {
      position: relative;
    }
    .view {
      position: absolute;
      right: 10px;
      top: 5px;
      color: #aaa;
      font-size: 1.25em;
      cursor: pointer;
    }
    .view:hover {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container mt-4 mb-2">
    <div class="row">
      <div class="col">
        <div class="wrapper">
          <div class="left-section">
            <img src="\img\bg\regist2.jpg" alt="">
          </div>
          <div class="right-section">
            <h3 class="text-secondary text-center">CREATE AN ACCOUNT</h3>
            <h6 class="text-secondary text-center">EAT & OAT</h6>
            <hr>
            
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone (e.g. 085591453940)">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="password">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                  <span class="view" id="toggleView" role="button">&bemptyv;</span>
                </div>
                <span class="text-secondary d-none" id="isMatch">Password can only contain alphanumeric and symbols</span>
              </div>
              <button type="reset" class="btn btn-warning">&circlearrowleft; Reset</button>
              <button type="submit" class="btn btn-success">Submit &raquo;</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script type="text/javascript">
    window.onload = function () {

      (function () {
        let pswd = document.getElementById('password');
        const visibleBtn = document.getElementById('toggleView');
        let message = document.getElementById('isMatch');

          visibleBtn.addEventListener('click', function(e) {
            if (pswd.getAttribute('type') == 'password') {
              pswd.setAttribute('type', 'text');
            } else {
              pswd.setAttribute('type', 'password');
            }
          });
        
        pswd.addEventListener('blur', function(e) {
          pswd.setAttribute('type', 'password');
        });

      })();

    }
  </script>
  <script src="\jquery\jquery-3.3.1.min.js"></script>
  <script src="\bootstrap4\js\bootstrap.min.js"></script>
</body>
</html>