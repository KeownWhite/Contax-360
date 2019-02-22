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
    <img src="images/flow-logo.png" class="flow-logo p-0" alt="Flow Logo">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span class="ml-1 active">Overview</span></a>
    <!-- <a href="Promise-to-pay-form.php"><button class="float-right"><span><i class="fas fa-file-alt ml-1"></i></span>
            <span class="ml-1">Promise to Pay Form</span></button></a> -->
    <div class="hr-margin"></div>
        <hr>
        <br>
        <div style="margin-right:28% !important" class="col mr-5">
            <form id="submit" action="formsearch.php" method="POST" class="needs-validation search-container" novalidate>
                <input class="form-control" autocomplete="off" value="<?php echo ($_GET["account_number"]) ?>"
                id="search-bar" onkeypress="return isNumberKey(event)" name="query"
                type="text" placeholder="Account Number">
                <a id="click" onclick="this.form.submit()"><i style="cursor:pointer" class="fas fa-search search-icon"></i></a>
                <br>
            </form>
        </div>
    </div>
    <?php

        $servername = "192.168.1.100";
        $username = "flowcollections";
        $password = "7BqcQaLMuOlvKJFB";
        $dbname = "Flow_data";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            error_reporting(0);


        $query = $_POST['query'];
        $account_num_query  =   "SELECT  
                                    placement_info.FIRST_NAME,
                                    placement_info.LAST_NAME,
                                    placement_info.CONTACT_PHONE_1,
                                    placement_info.CONTACT_PHONE_2,
                                    placement_info.CONTACT_PHONE_3,
                                    placement_info.ACCOUNT_NO,  
                                    placement_info.BILL_NO,
                                    placement_info.BALANCE_0_30,
                                    placement_info.BALANCE_31_60,
                                    placement_info.BALANCE_61_90,
                                    placement_info.BALANCE_91_180,
                                    placement_info.BAL_181_360,
                                    placement_info.BAL_360_PLUS,
                                    placement_info.BAL_TOTAL,
                                    placement_info.cycle_id,
                                    placement_info.DUE_DT
                                FROM placement_info
                                WHERE placement_info.ACCOUNT_NO = $query
                                ORDER BY placement_info.DUE_DT DESC";
        // echo($account_num_query);
        
    
        if(empty($query)){
            echo '';
        }else{
            echo'<div class="container" >';

            if($query){ 

                $query = htmlspecialchars($query);
                $result = mysqli_query($conn, $account_num_query);
                if ($result->num_rows > 0)
                {   $lastrow;
                    $html;
                    $result_counter=0;

            

                    
                    while($row = mysqli_fetch_array($result))
                    {
                       
                        $html = $html.'
                                            <br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$row ['BILL_NO'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['cycle_id'].'</h5>
                                                    <div class="collapse" id="rest_of_data'.$result_counter.'">
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="bill-info-tab" data-toggle="pill" href="#bill-info'.$result_counter.'" role="tab" aria-controls="bill-info" aria-selected="true">Bill Info</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="payments-made-tab" data-toggle="pill" href="#payments-made'.$result_counter.'" role="tab" aria-controls="payments-made" aria-selected="false">Payments/Promise</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active" id="bill-info'.$result_counter.'" role="tabpanel" aria-labelledby="bill-info-tab">
                                                                    <dl class="row">
                                                                        <dt class="col-sm-3 text-truncate">Account Number</dt>
                                                                        <dd class="col-sm-9">'.$row ['ACCOUNT_NO'].'</dd>

                                                                        <dt class="col-sm-3 text-truncate">Due Date</dt>
                                                                        <dd class="col-sm-9">'.$row ['DUE_DT'].'</dd>
                                                                        
                                                                        <dt class="col-sm-3">Balance Total</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BAL_TOTAL'].'</dd>

                                                                        <dt class="col-sm-3 text-truncate">Bal 0-30 </dt>
                                                                        <dd class="col-sm-9">$'.$row ['BALANCE_31_60'].'</dd>
                                                                        
                                                                        <dt class="col-sm-3 text-truncate">Bal 31-60</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BALANCE_31_60'].'</dd>

                                                                        <dt class="col-sm-3 text-truncate">Bal 61-90</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BALANCE_61_90'].'</dd>
                                                                        
                                                                        <dt class="col-sm-3 text-truncate">Bal 91-180</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BALANCE_91_180'].'</dd>

                                                                        <dt class="col-sm-3 text-truncate">Bal 181-360</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BAL_181_360'].'</dd>

                                                                        <dt class="col-sm-3 text-truncate">Bal 360+</dt>
                                                                        <dd class="col-sm-9">$'.$row ['BAL_360_PLUS'].'</dd>

                                                                    </dl>
                                                                <br>

                                                                
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal'.$result_counter.'">
                                                                Launch demo modal
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal'.$result_counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"  id="exampleModalLabel'.$result_counter.'">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form autocomplete="off" action="PTP-form.php" method="post" class="ml-1 mr-5">
                                                                            <div class="row form-size size">
                                                                            </div>
                                                                            <div id="hidden">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <p class="small bold text-col">First Name</p>
                                                                                        <input class="form-control" name="first_name"
                                                                                        type="text"
                                                                                        placeholder="'.$row['FIRST_NAME'].'"readonly>
                                                                                    </div>

                                                                                    <div class="col">
                                                                                        <p class="small bold text-col">Last Name</p>
                                                                                        <input class="form-control" name="first_name"
                                                                                        type="text"
                                                                                        placeholder="'.$row['LAST_NAME'].'"readonly>
                                                                                    </div>

                                                                                    <div class="col">
                                                                                        <p class="small bold text-col">Bill No</p>
                                                                                        <input class="form-control" name="bill_no"
                                                                                        type="text"
                                                                                        placeholder="'.$row ['BILL_NO'].'"readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <p class="small bold text-col">Agent</p>
                                                                                        <input class="form-control" name="agent"
                                                                                        type="text"
                                                                                        placeholder="Agent"readonly>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <p class="small bold text-col">Date Promised</p>
                                                                                        <div class="inner-addon right-addon">
                                                                                            <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                                                                            <input name="date_promised" id="date_promised" class="form-control date" data-date-format="yyyy-mm-dd"
                                                                                                type="text">

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col">
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
                                                                            </div>
                                                                            <!-- End of Form -->

                                                                        </form>



                                                                    </form>

                                                                    </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                            
                                                                        </div>          
                                                                    </div>
                                                                    
                                                                </div>
                                                                </div>                                                                
                                                            </div>
                                                            <div class="tab-pane fade" id="payments-made'.$result_counter.'"role="tabpanel" aria-labelledby="payments-made-tab">
                                                                <class="row">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Type</th>
                                                                                <th scope="col">Agent</th>
                                                                                <th scope="col">Made-By</th>
                                                                                <th scope="col">Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                    <tbody><br>'; 
                                //// end $HTML to inser payment information

                                //////// Get Payment information ///////////////////
                                $payment_html;
                                $union_query1=" SELECT payments_staging.PAYMENT_DATE AS DATE,
                                                        'Payment' as 'Type',
                                                        'SYSTEM' as PROMISE_BY,
                                                        payments_staging.created_on,
                                                        payments_staging.PAYMENT_AMOUNT AS AMOUNT                             
                                                        FROM payments_staging
                                                        WHERE payments_staging.BILL_NO=";
                                $union_query2=" UNION ALL
                                                SELECT  ptp_info.Agent,
                                                        ptp_info.date_promised AS DATE, 
                                                        'Promise' AS 'Type', 
                                                        ptp_info.PROMISE_BY, 
                                                        ptp_info.amt_promised AS AMOUNT
                                                FROM placement_info
                                                INNER JOIN ptp_info ON placement_info.placement_id = ptp_info.placement_id_fk
                                                WHERE placement_info.BILL_NO=";                                
                                                        
                                                        
                                $payment_staging_query=$union_query1.$row['BILL_NO'].$union_query2.$row['BILL_NO'];
                                                     
                                //echo($payment_staging_query);
                                $payment_staging_query_result = mysqli_query($conn, $payment_staging_query)  or die ('Unable to execute query. '. mysqli_error($link));
                                
                                $payment_row = mysqli_fetch_array($payment_staging_query_result);
                                $table_head;
                                $payment_html="";
                                $loop=0;
                                
                                //echo(sizeof($payment_row));
                                
                                // echo 'number of rows ' .mysqli_num_rows($row2);
                                while($payment_row = mysqli_fetch_array($payment_staging_query_result))
                                {
                                    $payment_html=$payment_html.'       <tr>
                                                                            <td>'.$payment_row['DATE'].'</td>
                                                                            <td>'.$payment_row['Type'].'</td>
                                                                            <td>'.$payment_row['Type'].'</td>
                                                                            <td>'.$payment_row['PROMISE_BY'].'</td>
                                                                            <td>$'.$payment_row['AMOUNT'].'</td>                            
                                                                        </tr>
                                                                    ';
                                    //echo 'number of rows-->'.$result_counter;
                                    //echo($payment_row['Type'].' ');
                                      
                                }
                                                               
                                
                                // resume HTML
                                $html = $html.$payment_html.'          
                                                                    
                                                                        </tbody>
                                                                    </table>                                             
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <a class="btn btn-light text-primary" data-toggle="collapse" href="#rest_of_data'.$result_counter.'" role="button" aria-expanded="false" aria-controls="rest_of_data">See More</a>
                                                        </div>
                                                    </div>   
                                                </div>';                         
                        $lastrow= $row;
                        $result_counter++;
                    }        
                
                    

                    echo'   <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Personal Info</h5>
                                            <dl class="row">                                               
                                                <dt class="col-sm-5 text-truncate">Name</dt>
                                                <dd class="col-sm-7">'.$lastrow['FIRST_NAME'].'&nbsp;&nbsp;'.$lastrow['LAST_NAME'].'</dd>

                                                <dt class="col-sm-5 text-truncate">Contact Number 1</dt>
                                                <dd class="col-sm-7">'.$lastrow['CONTACT_PHONE_1'].'</dd>
                                                
                                                <dt class="col-sm-5 text-truncate">Contact Number 2</dt>
                                                <dd class="col-sm-7">'.$lastrow['CONTACT_PHONE_2'].'</dd>

                                                <dt class="col-sm-5 text-truncate">Contact Number 3</dt>
                                                <dd class="col-sm-7">'.$lastrow['CONTACT_PHONE_3'].'</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    '.$html.'
                                </div>
                            </div><br><br>';
                    mysqli_close($conn);
                    
                }
                else{
                        echo'
                            <center>
                                <div class="mt-3 mb-3">
                                    <p>Oops, no results found</p>
                                </div>
                            </center>';
                    }
                
            }
        }
    ?>
    <script>
        function show(target) {
            document.getElementById(target).style.display = 'block';
        }

        function hide(target) {
            document.getElementById(target).style.display = 'none';
        }
    </script>

    <script>
        document.getElementById("click").onclick = function () {
            document.getElementById("submit").submit();
        }
    </script>
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