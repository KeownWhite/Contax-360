<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Promise to Pay</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
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
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sass.js/0.6.3/sass.min.js"></script>
    <script src="main.js"></script>

</head>

<body >

    <!-- Header -->
    <img src="images/flow-logo.png" class="flow-logo p-0" alt="Flow Logo">
    <i class="fas fa-tachometer-alt"></i> <span class="ml-1  text-col">Overview</span>
    <a href="Promise-to-pay-form.php"><button class="float-right"><span><i class="fas fa-file-alt ml-1"></i></span>
            <span class="ml-1">Promise to Pay Form</span></button></a>
    <div class="hr-margin">
        <hr>
    </div><br>
    <!-- <span class="ml-3">Fullfillments <span class="ml-5 FF">2,193</span><span class="verticalline ml-2"></span></span>
    <span class="ml-3">Partial Payment <span class="ml-5 PP">2,193</span><span class="verticalline ml-2"></span></span>
    <span class="ml-3">Broken Promises <span class="ml-5 BP">2,193</span></span>
    <div class="hr-margin2"><hr></div> -->
    <!-- End of Header -->

    <!-- Search Bar -->
    <!-- <form class="search-container">
        <input type="text" id="search-bar" placeholder="Search ...">
        <a href="#"><i class="fas fa-search search-icon"></i></a>
    </form> -->
    
    <div style="margin-right:28% !important" class="col mr-5 mb-5">
            <form id="submit" action="indexsearch.php" method="POST" class="needs-validation search-container"
                novalidate>
                <input class="form-control" autocomplete="off" id="search-bar" onkeypress="return isNumberKey(event)" name="query" type="text"
                    placeholder="Search ...">
                <a href="#" id="click"  onclick="this.form.submit()" ><i class="fas fa-search search-icon"></i></a>
            </form>
        </div>
    </div>
    <!-- End of Search Bar -->

    <!-- Overview -->
    <center>
        <form>
            <?php

    $servername = "192.168.1.100";
    $username = "flowcollections";
    $password = "7BqcQaLMuOlvKJFB";
    $dbname = "Flow_data";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

        $total_records_per_page = 5;

        $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query(
        $conn,
        "SELECT COUNT(*) As total_records FROM `ptp_info`"
        );
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; // total pages minus 1

        $result = mysqli_query(
            $conn,
            "SELECT 
                ptp_info.date_promised,
                ptp_info.amt_promised,
                ptp_info.notes,
                ptp_info.ptp_id,
                placement_info.FIRST_NAME,
                placement_info.LAST_NAME,
                placement_info.CONTACT_PHONE_1,
                placement_info.ACCOUNT_NO,
                placement_info.BILL_NO,
                placement_info.BILL_BALANCE,
                placement_info.BALANCE_0_30,
                placement_info.BALANCE_31_60,
                placement_info.BALANCE_61_90,
                placement_info.BALANCE_91_180,
                placement_info.BAL_181_360,
                placement_info.BAL_360_PLUS,
                placement_info.BAL_TOTAL,
                placement_info.cycle_id,
                placement_info.DUE_DT
                FROM ptp_info INNER JOIN placement_info ON placement_id=placement_id_fk LIMIT $offset, $total_records_per_page"
            );
        
          
            echo'
                <div class="container">
                    <div class="row row-down">
                            <div class="col-2">
                                <p class=" bold text-col">Customer Name</p>
                            </div>
                            <div class="col-1">
                                <p class=" bold  text-col">Status</p>
                            </div>
                            <div class="col-1">
                                <p class="bold  text-col">Account #</p>
                            </div>
                            <div class="col-1">
                                <p class=" bold  text-col">Bill #</p>
                            </div>
                            <div class="col-2">
                                <p class="bold  text-col">Date Promised</p>
                            </div>
                            <div class="col-2">
                                <p class=" bold  text-col">Amount Promised</p>
                            </div>
                            <div class="col-2">
                                <p class=" bold  text-col">Telephone Number</p>
                            </div>
                        
                    </div>
                </div>
            ';
            while($row = mysqli_fetch_array($result)){
            echo'
                <div class="container mb-3 mt-2">
                    <div class="row row-down">
                        <div class="col-2">
                            <!--<p class="small bold text-col">Customer Name</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small">'.$row ['FIRST_NAME'].' '.$row['LAST_NAME'].'</p>
                        </div>
                        <div class="col-1">
                        <!-- <p class="small bold  text-col">Status</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small"> FF</p>
                        </div>
                        <div class="col-1">
                            <!--<p class="small bold  text-col">Account #</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small">'.$row ['ACCOUNT_NO'].'</p>
                        </div>
                        <div class="col-1">
                        <!--<p class="small bold  text-col">Bill #</p>-->
                        <p style="color: rgb(92, 91, 91);" class="small">'.$row ['BILL_NO'].'</p>
                        </div>
                        <div class="col-2">
                            <!--<p class="small bold  text-col">Date Promised</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small">'.$row ['date_promised'].'</p>
                        </div>
                        <div class="col-2">
                            <!--<p class="small bold  text-col">Amount Promised</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small">'.$row ['amt_promised'].'</p>
                        </div>
                        <div class="col-2">
                            <!--<p class="small bold  text-col">Telephone Number</p>-->
                            <p style="color: rgb(92, 91, 91);" class="small">'.$row ['CONTACT_PHONE_1'].'</p>
                        </div>
                        <div style="margin-top:-4px; !important" class="col-1">
                            <button type="button" onclick="show('.$row ['ptp_id'].')"  class="details-btn clickMe">Details</button>
                        </div>
                    </div>
                            <div style="display:none;" id='.$row ['ptp_id'].'>

                            <table style="box-shadow: 3px 0px 3px #00000030;" class="table table-sm table-striped">
                          
                              <tr>
                                <th class="font-weight-light small" scope="col">Bill Bal</th>
                                <th class="font-weight-light small" scope="col">Due Date</th>
                                <th class="font-weight-light small"scope="col">Bal 0-30</th>
                                <th class="font-weight-light small" scope="col">Bal 31-60</th>
                                <th class="font-weight-light small" scope="col">Bal 61-90</th>
                                <th class="font-weight-light small" scope="col">Bal 91-180</th>
                                <th class="font-weight-light small" scope="col">Bal 181-360</th>
                                <th class="font-weight-light small" scope="col">Bal 360+</th>
                                <th class="font-weight-light small" scope="col">Bal Total</th>
                                <th class="font-weight-light small" scope="col">Bill cycle</th>
                                <th class="small" style="color:red !important;cursor:pointer" scope="col" onclick="hide('.$row ['ptp_id'].')">X</a></th>
                              </tr>
                          
                            <tbody>
                              <tr>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BILL_BALANCE'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['DUE_DT'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BALANCE_0_30'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BALANCE_31_60'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BALANCE_61_90'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BALANCE_91_180'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BAL_181_360'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BAL_360_PLUS'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['BAL_TOTAL'].'</td>
                                <td style="color: rgb(92, 91, 91);" class="small"> '.$row ['cycle_id'].'</td>  
                                <td></td>
                              </tr>
                            </tbody>
                          </table>      
                          
                          <table  style=" box-shadow: 3px 0px 3px #00000030;" class="table table-sm table-striped">
                          <tr>
                          <th class="font-weight-light small" scope="col">Notes: <b class="font-weight-light" style="color: rgb(92, 91, 91) !important;" scope="col"> '.$row ['notes'].'</b></th>
                          </tr>
                          </table>                  
                            </div>
                        </div>
                    </div>
                </div>

            ';}
            mysqli_close($conn);
            ?>

        </form>

    </center>
    <!-- End  Overview -->

    <center>
        <div style="background-color:transparent; box-shadow:none !important" class="container mt-5">
            <div>
                <strong style="float:right;" class="small bold text-col">Page
                    <?php echo $page_no." of ".$total_no_of_pages; ?>
                </strong>
            </div>

            <nav aria-label="Page navigation example">
                <ul style="margin-left:40%;" class="pagination">
                    <?php if($page_no > 1){
        echo '<li class="page-item"><a class="page-link" href="?page_no=1">First Page</a></li>';
        } ?>

                    <li class="page-item" <?php if($page_no <=1){ echo "class='disabled'" ; } ?>>
                        <a class="page-link" <?php if($page_no> 1){
                            echo "href='?page_no=$previous_page'";
                            } ?>>Previous</a>
                    </li>

                    <li class="page-item" <?php if($page_no>= $total_no_of_pages){
                        echo "class='disabled'";
                        } ?>>
                        <a class="page-link" <?php if($page_no < $total_no_of_pages) { echo
                            "href='?page_no=$next_page'" ; } ?>>Next</a>
                    </li>

                    <?php if($page_no < $total_no_of_pages){
        echo '<li class="page-item"><a class="page-link" href="?page_no='.$total_no_of_pages.'">Last &rsaquo;&rsaquo;</a></li>';
        }
        ?>
                </ul>
            </nav>

        </div>
    </center>




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
    <!-- Number Only Input Validation -->
<!-- <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script> -->
    <!-- End Of Number Only Input Validation -->


    <script>
        document.getElementById("click").onclick = function () {
            document.getElementById("submit").submit();
        }
    </script>
</body>

</html>