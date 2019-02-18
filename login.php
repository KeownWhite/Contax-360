<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Promise to Pay</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
        <!-- Compiled and minified CSS -->
    
<!-- Compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/sass.js/0.6.3/sass.min.js"></script>
    <script src="main.js"></script>
    <style>
    @-webkit-keyframes fadeInDown {
    from {
        opacity:0;
        -webkit-transform: translatey(-10px);
        -moz-transform: translatey(-10px);
        -o-transform: translatey(-10px);
        transform: translatey(-10px);
    }
    to {
        opacity:1;
        -webkit-transform: translatey(0);
        -moz-transform: translatey(0);
        -o-transform: translatey(0);
        transform: translatey(0);
    }
}
@-moz-keyframes fadeInDown {
    from {
        opacity:0;
        -webkit-transform: translatey(-10px);
        -moz-transform: translatey(-10px);
        -o-transform: translatey(-10px);
        transform: translatey(-10px);
    }
    to {
        opacity:1;
        -webkit-transform: translatey(0);
        -moz-transform: translatey(0);
        -o-transform: translatey(0);
        transform: translatey(0);
    }
}
@keyframes fadeInDown {
    from {
        opacity:0;
        -webkit-transform: translatey(-10px);
        -moz-transform: translatey(-10px);
        -o-transform: translatey(-10px);
        transform: translatey(-10px);
    }
    to {
        opacity:1;
        -webkit-transform: translatey(0);
        -moz-transform: translatey(0);
        -o-transform: translatey(0);
        transform: translatey(0);
    }
}
.in-down {
    -webkit-animation-name: fadeInDown;
    -moz-animation-name: fadeInDown;
    -o-animation-name: fadeInDown;
    animation-name: fadeInDown;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
    -o-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-animation-duration: 1s;
    -moz-animation-duration: 1s;
    -o-animation-duration: 1s;
    animation-duration: 1s;
}


    </style>
</head>

<body class="background">
<img src="images/flow-logo.png" class="flow-logo p-0 mb-5" alt="Flow Logo">
    <!-- <div class="hr-margin">
    <hr>
</div><br> --><br>

    <div class="container mt-5 in-down" style="width:25% !important">
        <div class="mt-2">
            <h4 class="text-col mb-3 text-center">Login</h4>
            <p class="text-center">Welcome beck! Login to access customer's Promise to Pay</p>
            <form method="post">
                <div class="row">
                    <div class="col mb-3">
                        <span class="small bold text-col">Username</span>
                        <input class="form-control" name="first_name" value=""
                        type="text">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <span class="small bold text-col">Password</span>
                        <input class="form-control" name="last_name" value=""
                        type="password">
                    </div>
                </div>
                <div class="row-3">
                    <button style="background-color:#00abe8;color:white" type="submit" id="submit-btn-contact" class="col btn send-btn mb-2">Continue<i class="fas fa-arrow-circle-right ml-3"></i></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>