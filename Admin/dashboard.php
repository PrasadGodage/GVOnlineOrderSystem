<?php
include('header/header.php');
// include('functions.php');
include('config.php');


date_default_timezone_set("Asia/Calcutta");
$today=date('Y-m-d');


// function getusernamebyvchid($con,$vchid)
// {
//     $selectquery = "SELECT * FROM `vouchersdtls` where `vouchersid`='$vchid' AND `DRCRtype`='DR'";
//     //  echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $legerid=$row['ledgerid'];

//    echo getPartyNameByLegerid($con,$legerid);
// }



// function getPartyNameByLegerid($con,$legerid)
// {
//     $selectquery = "SELECT * FROM `ledgermaster` where `ledgerid`='$legerid'";
//     //   echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $ledgername=$row['ledgername'];
//    return $ledgername;
// }
?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                    
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Users</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                            $usersql="SELECT * FROM `usermaster` WHERE `usertype`='customer'";
                            echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                          <a href="userlist.php">
                          <button class="btn btn-primary btn-sm ">View All</button>
                          </a>
                         </div>
                      </div>
                   
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">New Orders</h5>
                          <h2 class="mb-3 font-18">
                          <?php
                            $usersql="SELECT * FROM `ordermaster` where `orderstatus`='open'";
                            echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                         <img src="assets/img/banner/1.png" alt="">
                       </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Running Orders</h5>
                          <h2 class="mb-3 font-18">
                            
                          <?php
                            $usersql="SELECT * FROM `ordermaster` where `orderstatus`='Accept'";
                            echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>
                          </h2>
                          
                         </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Completed Orders</h5>
                          <h2 class="mb-3 font-18">
                          
                          <?php
                            $usersql="SELECT * FROM `ordermaster` where `orderstatus`='open'";
                            echo mysqli_num_rows(mysqli_query($con,$usersql));
                            ?>

                          </h2>
                         </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        


          <hr>
          <div class="row justify-content-end mb-3">
        <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">Create New Category</button> -->
        
        <!-- <a href="neworders.php">
        <button class="btn btn-primary ml-2">New Orders</button>
        </a> -->
        <a href="manageorders.php">
        <button class="btn btn-info ml-2">Accepted Orders</button>
        </a>
        <a href="assignedorders.php">
        <button class="btn btn-warning ml-2">Assigned Orders</button>
        </a>
        <a href="completedorders.php"> 
        <button class="btn btn-success ml-2">Completed Orders</button>
        </a>
        
       
      </div>
          <h4>New Orders</h4>
              
          <!-- id="tableExport" -->
          <table class="table table-striped table-hover"  style="width:100%;">
        <thead>
          <tr>

            <th>OrderID</th>
            <th>Date-Time</th>
            <th>Name</th>
            <th>Address</th>
            <th>Order Value</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="newordercontent">

        
        </tbody>
      </table>
          
                  </div>
                </div>
              </div>
            </div> 


      <div class="modal fade" id="vieworderitem" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">View Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <div class="container" id="vieworderitemcontainer">

              </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
          </div> 
        </section>


        <?php
 include('footers/footer.php');
?>

<script>

$(document).ready(function(){
  getdata();
  setInterval(function() {
    getdata();
            }, 10000); // 10000 milliseconds = 10 seconds
});

function getdata()
    {
        var isneworderexist ="isneworderexist";
        var nodatafound="<tr><td colspan=7 class='text-center'>No New Orders Found, Please Refresh Page to Check</td></tr>";
        
      $.ajax({
        url: "order_backend.php",
        type: "POST",
        data: {
          isneworderexist: isneworderexist,         
        },
        success: function(data) {
          console.log(data);
          var datalength=data.length;
          console.log("lenth of data is : "+datalength); 
          // $('#newordercontent').html(data);
          if(datalength>16)
          {
            $('#newordercontent').html(data);
              var audio = new Audio('audio/aud1.wav');
                audio.play();
          }else
          {
            $('#newordercontent').html(nodatafound);
          }
          // var audio = new Audio('audio/aud1.wav');
          //       audio.play();
       },
     }
     );
    }





    function vieworderitems(uniqueorderid)
    {

      $.post("order_backend.php", {
        uniqueorderid: uniqueorderid
      }, function(data, status) {
        // alert("Successfully");
        var menu = JSON.parse(data);
        //   $('#up_categoryname').val(user.name);
            console.log(menu);
           
        $('#hidden_id').val(menu.itemid);
        // $('#upvcname').val(menu.companyname);
        $('#upmenuname').val(menu.itemname);
        $('#upmenuunit').val(menu.unit);
        $('#upmenurate').val(menu.rate);
        $('#upbehavior').val(menu.itembehavior);
        $('#upmenucategory').val(menu.itemcategoryname);
        $('#upmakingtime').val(menu.makingtime);
        $('#updisc').val(menu.itemdisc);

      });
      $('#updatemenumodel').modal('show');


    }



function sendWhatsAppMessage(phone,message) {


  // URL encode the message and phone number
  message = encodeURIComponent(message);
  phone = encodeURIComponent(phone);

  // Construct the URL
  var url = 'https://api.whatsapp.com/send?phone=' + phone + '&text=' + message;

  // Open the URL in a new tab or window
  window.open(url, '_blank');
}

    
    function getstatus(orderid)
    {
        
        var status="Accept";
        $.ajax({
        url: "order_backend.php",
        type: "POST",
        data: {
            orderid: orderid,
            status: status,
        },
        success: function(data) {
          console.log(data);
          getdata()
       },
     }
     );

    }

    function getorderitems(orderid)
    {
    
        var orderidjs=orderid;
        $.ajax({
        url: "view_backend.php",
        type: "POST",
        data: {
          orderidjs: orderidjs,
        },
        success: function(data) {
          console.log(data);
          $('#vieworderitemcontainer').html(data);
          $('#vieworderitem').modal('show');

       },
     }
     );

    }
  </script>