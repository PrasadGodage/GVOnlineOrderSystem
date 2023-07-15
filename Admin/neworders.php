<?php
include('header/header.php');

//select Component
$query1 = "SELECT * FROM deliveryboymaster";
$result1 = mysqli_query($con, $query1);
$slsdboy='<option value="">--- Select Boy ---</option>';
while ($row1 = mysqli_fetch_assoc($result1)) {
    $slsdboy.='<option value="' . $row1['id'] . '">' . $row1['deliveryboy_name'] . '</option>';
}


?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>Manage New Orders</h3>
      <div class="row justify-content-end">
        <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">Create New Category</button> -->
        
        <!-- <a href="neworders.php">
        <button class="btn btn-primary ml-2">New Orders</button>
        </a> -->
        <a href="manageorders.php">
        <button class="btn btn-info ml-2 mt-1">Accepted Orders</button>
        </a>
        <a href="assignedorders.php">
        <button class="btn btn-warning ml-2 mt-1">Assigned Orders</button>
        </a>
        <a href="completedorders.php"> 
        <button class="btn btn-success ml-2 mt-1">Completed Orders</button>
        </a>
        
       
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
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
        <tbody>
<?php

$selectmenulist="SELECT * FROM `ordermaster` where `orderstatus`='open'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $row['orderid']; ?></td>
          <td><?php echo $row['orderdate']."-".$row['ordertime']; ?></td>
          <td><?php getusernamebyid($con,$row['userid']) ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['orderbillamount']; ?></td>
          <td>
          <button class="btn btn-success" onclick="view(<?php echo $row['orderid'] ?>)">Accept Order</button>
          </td>
          <td>
            <button class="btn btn-primary" onclick="getorderitems(<?php echo $row['orderid'] ?>)">View</button>
    </td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
  <td colspan=7 class='text-center'>No New Orders Found, Please Refresh Page to Check</td>
  </tr>";
}



?>

        
        </tbody>
      </table>
    </div>
  </section>


  <!-- -----------------------------------------------------------------------------------------------------df -->
  


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

  <!-- -----------------------------------------------------------------------------------------------------df -->
  




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      //  alert('hii');
    });


    function view(id)
    {
      var orderid=id;
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
          location.reload();  
              // swal({
              //     title: "Are you sure?",
              //     text: "Do you Want to send Message on whatsapp",
              //     icon: "warning",
              //     buttons: true,
              //     dangerMode: true,
              //   })
              //   .then((willDelete) => {
              //     if (willDelete) {

              //       sendWhatsAppMessage("8412003013","Demo Code HTMLDirectoryElement");

              //     } else {
              //       location.reload();
              //     }
              //   });
       },
     }
     );


    }

    // function getdata(orderid)
    // {
    //   console.log(orderid);

    //       $.post("order_backend.php", {
    //         orderid: orderid,
    //         getdata:getdata
    //   }, function(data, status) {
    //     var order = JSON.parse(data);
    //         console.log(menu);
    //   });
    //   $('#updatemenumodel').modal('show');
    // }


    function getstatus(orderid)
    {
        alert('hii');
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
           
              swal({
                  title: "Are you sure?",
                  text: "Do you Want to send Message on whatsapp",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    sendWhatsAppMessage("8412003013","Demo Code HTMLDirectoryElement");

                  } else {

                  }
                });
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


    function getstatus(orderid)
    {
        
    //     var status="Assign";
    //     // var status=$('#orderstatus').val();
    //     // alert(orderid+"-"+status);
    //     $.ajax({
    //     url: "order_backend.php",
    //     type: "POST",
    //     data: {
    //         orderid: orderid,
    //         status: status,
    //     },
    //     success: function(data) {
    //       console.log(data);
    //    },
    //  }
    //  );

    }


  </script>