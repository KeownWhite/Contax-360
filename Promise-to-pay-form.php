<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Promise to Pay Form</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/sass.js/0.6.3/sass.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <!-- Header -->
    <a href="index.php"><img src="images/flow-logo.png" class="flow-logo p-0" alt="Flow Logo"></a>
    <a href="index.php"><i class="fas fa-tachometer-alt"></i> <span class="ml-1 active">Overview</span></a>
    <button class="float-right"><span><i class="fas fa-file-alt ml-1"></i> <span class="ml-1">Promise to Pay Form</span></button>
    <div class="hr-margin">
        <hr>
    </div><br>
    <!-- <span class="ml-3">Fullfillments <span class="ml-5 FF">2,193</span><span class="verticalline ml-2"></span></span>
        <span class="ml-3">Partial Payment <span class="ml-5 PP">2,193</span><span class="verticalline ml-2"></span></span>
        <span class="ml-3">Broken Promises <span class="ml-5 BP">2,193</span></span>
        <div class="hr-margin2"><hr></div> -->
    <!-- End of Header -->

    <?php 
// if (empty($_GET)){
    // $testing=10033202;
    // header("Location: formsearch.php?first_name=--A--first_name--B--&last_name=--A--last_name--B--&account_number=$testing&phone_number=--A--phone_number--B--&fullname=--A--fullname--B--");
     
// exit();
// }
?>

    <div class="row">
        <div class="col-3 ml-5">
            <p class="small bold text-col ml-1">Agent Name</p>
            <input class="form-control ml-1" value="<?php echo ($_GET["fullname"]) ?>" name="agent_name" type="text"
            placeholder="John Brown"
            readonly>
        </div>

        <div style="margin-right:28% !important" class="col mr-5">
            <form id="submit" action="formsearch.php" method="POST" class="needs-validation search-container"
                novalidate>
                <input class="form-control" autocomplete="off" id="search-bar" onkeypress="return isNumberKey(event)"
                    name="query" type="text" placeholder="Account Number">
                <!-- <a id="click" onclick="this.form.submit()" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-search search-icon"></i></a> -->
                <a id="click" onclick="this.form.submit()"><i style="cursor:pointer" class="fas fa-search search-icon"></i></a>
            </form>
        </div>
    </div>

    <form autocomplete="off" action="PTP-form.php" method="post" class="ml-1 mr-5">
        <div class="row form-size size">
        </div>
        <div id="hidden">
            <p class="ml-5 mr-1 text-center section-sep">Customer Information</p>
            <div class="ml-5 mr-l alert alert-danger display-error" style="display: none">
            </div>

            <div class="row mt-4">
                <div class="col ml-5">
                    <p class="small bold text-col">First Name</p>
                    <input class="form-control" name="first_name" value="<?php echo ($_GET["first_name"]) ?>"
                    type="text"
                    placeholder="Ahkeel" readonly>
                </div>

                <div class="col">
                    <p class="small bold text-col">Last Name</p>
                    <input class="form-control" name="last_name" value="<?php echo ($_GET["last_name"]) ?>"
                    type="text"
                    placeholder="Beckford"
                    readonly>
                </div>

                <div class="col">
                    <p class="small bold text-col">Account Number</p>
                    <input class="form-control" value="<?php echo ($_GET["ACCOUNT_NO"]) ?>" name="account_num"
                    type="text"
                    placeholder="00000000000"
                    readonly>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-4 ml-5">
                    <p class="small bold text-col">Date Promised</p>
                    <div class="inner-addon right-addon">
                        <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                        <input name="date_promised" id="date_promised" class="form-control date" data-date-format="yyyy-mm-dd"
                            type="text">

                    </div>
                </div>

                <div class="col-4">
                    <p class="small bold text-col">Amount Promised</p>
                    <div class="inner-addon right-addon">
                        <span class="input-group-addon"><i class="fas fa-dollar-sign"></i></span>
                        <input name="amt_promised" onkeypress="return isNumberKey(event)" class="form-control pad-lef"
                            type="text" id="amt_promised">

                    </div>
                </div>
            </div>

            <div class="ml-5 mt-4">
                <div class="form-group">
                    <label class="small bold text-col" for="exampleFormControlTextarea1">Notes</label>
                    <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>

            <button type="submit" id="submit-btn-contact" class="btn send-btn ml-5 mt-4">Submit<i class="fas ml-2 fa-paper-plane"></i></button>
        </div>
        <!-- End of Form -->

    </form>




    </form>

    <!-- Date Picker -->
    <script>
        var date = new Date();
        date.setDate(date.getDate());
        $('#date_promised').datepicker({
            startDate: date,
            autoclose: true
        });
    </script>

    <script>
        // $('.clickMe').click(function () {
        //     alert(this.id);
        // });
        function show(target) {
            document.getElementById(target).style.display = 'block';
        }

        function hide(target) {
            document.getElementById(target).style.display = 'none';
        }
    </script>

    <!-- End of Date Picker -->

    <!-- Number Only Input Validation -->
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <!-- End Of Number Only Input Validation -->


    <script>
        document.getElementById("click").onclick = function () {
            document.getElementById("submit").submit();
        }
    </script>

</body>

</html>