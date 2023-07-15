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

      <h3>List of Registered Users</h3>
      <div class="row justify-content-end">
        <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">Create New Category</button> -->
        
        <!-- <a href="neworders.php">
        <button class="btn btn-primary ml-2">New Orders</button>
        </a> -->
        <!-- <a href="manageorders.php">
        <button class="btn btn-info ml-2">Accepted Orders</button>
        </a>
        <a href="assignedorders.php">
        <button class="btn btn-warning ml-2">Assigned Orders</button>
        </a>
        <a href="completedorders.php"> 
        <button class="btn btn-success ml-2">Completed Orders</button>
        </a>
         -->
       
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>Customer ID</th>
            <th>Name</th>
            <th>mob</th>
            <th>Email</th>
            <th>Address</th>
            <th>Reg. Date</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `usermaster` WHERE `usertype`='customer'";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $row['userid']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['contact']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['address']."-".$row['pincode']; ?></td>
          <td><?php echo $row['registrationdate']; ?></td>
         
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
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="assingdeliveryboy" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Assign Delivery Boy to Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="hidden_order_id" class="form-control">
                  <label for="">Select Boy</label>
                  <select name="" id="slsboyid" class="form-control">
                    <?php echo $slsdboy; ?>
                  </select>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-success" onclick="updatedeliveryboyinorder()">Assign Delivery Boy</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="updatemenumodel" tabindex="-1" role="dialog"
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
             
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" onclick="updatemenu()">update Menu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

  <!-- -----------------------------------------------------------------------------------------------------df -->
  




  <?php
  include('footers/footer.php');
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      // alert('hii');
    });


    function getdata(orderid)
    {
      console.log(orderid);

          $.post("order_backend.php", {
            orderid: orderid,
            getdata:getdata
      }, function(data, status) {
        var order = JSON.parse(data);
            console.log(menu);
      });
      $('#updatemenumodel').modal('show');




    }


    function updatedeliveryboyinorder()
    {

     var dlorderid=$('#hidden_order_id').val();
     var dlboyid=$('#slsboyid').val();
     var dlstatus="Assign";

      $.ajax({
        url: "order_backend.php",
        type: "POST",
        data: {
          dlorderid: dlorderid,
          dlboyid: dlboyid,
          dlstatus:dlstatus,
        
        },
        success: function(data) {
          console.log(data);
          // $('#basicModal').modal('hide');
           location.reload();
          // $('#tblcontent').html(data);
        },
      });
    }

    function setorderidtotxt(orderid)
    {
      $('#hidden_order_id').val(orderid);
      $('#assingdeliveryboy').modal('show');
      
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


  //   function savemenu() {
  //     // alert('fun');
  //     // menuname,menuunit,menurate,menucategory,behavior,makingtime,disc
  //     var menuname = $('#menuname').val();
  //     var menuunit = $('#menuunit').val();
  //     var menurate = $('#menurate').val();
  //     var behavior = $('#behavior').val();
  //     var menucategory = $('#menucategory').val();
  //     var makingtime = $('#makingtime').val();
  //     var disc = $('#disc').val();
  //     // var menuimage = $('#menuimage').val();

  //   //    console.log(menuname+"--"+menuunit+"--"+menurate+"--"+behavior+"--"+menucategory+"--"+makingtime+"--"+disc);
  //     $.ajax({
  //       url: "menu_backend.php",
  //       type: "POST",
  //       data: {
  //         menuname: menuname,
  //         menuunit: menuunit,
  //         menurate: menurate,
  //         behavior: behavior,
  //         menucategory: menucategory,
  //         makingtime: makingtime,
  //         disc: disc,
  //         // menuimage:menuimage,
  //       },
  //       success: function(data) {
  //         console.log(data);
  //         $('#basicModal').modal('hide');
  //        location.reload();
  //       //  $('#tblcontent').html(data);
  //      },
  //    }
  //    );
  //   }





  //   function getdata(updateid) {

  //       // alert("get details hii"+updateid);
  //     // $('#hidden_id').val(updateid);

  //     $.post("menu_backend.php", {
  //       updateid: updateid
  //     }, function(data, status) {
  //       // alert("Successfully");
  //       var menu = JSON.parse(data);
  //       //   $('#up_categoryname').val(user.name);
  //           console.log(menu);
           
  //       $('#hidden_id').val(menu.itemid);
  //       // $('#upvcname').val(menu.companyname);
  //       $('#upmenuname').val(menu.itemname);
  //       $('#upmenuunit').val(menu.unit);
  //       $('#upmenurate').val(menu.rate);
  //       $('#upbehavior').val(menu.itembehavior);
  //       $('#upmenucategory').val(menu.itemcategoryname);
  //       $('#upmakingtime').val(menu.makingtime);
  //       $('#updisc').val(menu.itemdisc);

  //     });
  //     $('#updatemenumodel').modal('show');


  //   }




  //   function updatemenu() {
  //     var hidden_id = $('#hidden_id').val();
  //     var upmenuname = $('#upmenuname').val();
  //     var upmenuunit = $('#upmenuunit').val();
  //     var upmenurate = $('#upmenurate').val();
  //     var upbehavior = $('#upbehavior').val();
  //     var upmenucategory = $('#upmenucategory').val();
  //     var upmakingtime = $('#upmakingtime').val();
  //     var updisc = $('#updisc').val();

  //    console.log(hidden_id+"--"+upmenuname+"--"+upmenuunit+"--"+upmenurate+"--"+upbehavior+"--"+upmenucategory+"--"+upmakingtime+"--"+updisc);
      
  //    $.ajax({
  //       url: "menu_backend.php",
  //       type: "POST",
  //       data: {
  //         hidden_id: hidden_id,
  //         upmenuname: upmenuname,
  //         upmenuunit: upmenuunit,
  //         upmenurate: upmenurate,
  //         upbehavior: upbehavior,
  //         upmenucategory: upmenucategory,
  //         upmakingtime: upmakingtime,
  //         updisc: updisc,
  //       },
  //       success: function(data) {
  //         console.log(data);
  //         // $('#basicModal').modal('hide');
  //         location.reload();
  //         // $('#tblcontent').html(data);
  //       },
  //     });
  //   }


  //   function deletedata(deleteid)
  //   {
  //       // alert(id); 
        
  // swal({
  //   title: "Are you sure?",
  //   text: "Once deleted, you will not be able to recover this Menu!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {

  //     $.ajax({
  //                   url: "menu_backend.php",
  //                   type: "POST",
  //                   data: {deleteid:deleteid},
  //                   success:function(data) {
  //                     swal("Poof! Your imaginary file has been deleted!", {
  //                       icon: "success",
  //                     });
  //                       location.reload(true);
  //                      //alert("sucess");
  //               //   readrecord();
  //                   },
  //               });


  //   } else {

  //   }
  // });

  //   }
  </script>