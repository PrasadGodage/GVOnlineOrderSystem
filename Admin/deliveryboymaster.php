<?php
include('header/header.php');
?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->

      <h3>All Delivery Boy Data</h3>
      <div class="row justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create New Boy</button>
      </div>
      <hr>



      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
        <thead>
          <tr>

            <th>#</th>
            <th>Name</th>
            <th>Mob</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php

$selectmenulist="SELECT * FROM `deliveryboymaster`";

$res=mysqli_query($con,$selectmenulist);

if(mysqli_num_rows($res)>0)
{
  $num=1;
		while($row=mysqli_fetch_array($res))
    {?>
        <tr>
          <td><?php echo $num; ?></td>
          
          <td><?php echo $row['deliveryboy_name']; ?></td>
          <td><?php echo $row['deliveryboy_mob']; ?></td>
          <td>
            <button class="btn btn-warning" onclick="getdata(<?php echo $row['id']; ?>)"><i data-feather="edit"></i></button>
            &nbsp<button class="mt-1 btn btn-danger" onclick="deletedata(<?php echo $row['id']; ?>)">X</button></td>
        </tr>
    <?php 
    $num++;
  }
}else{
  echo "<tr>
        <td colspan='3' align='center'>No Category Found</td>
  </tr>";
}



?>

        
        </tbody>
      </table>
    </div>
  </section>

  <!-- model started -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Boy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <label for="">Delivery Boy Name</label>
                  <input type="text" class="form-control" id="boyname">
                  <label for="">Delivery Boy Mobile Number</label>
                  <input type="number" class="form-control" id="boymob">
                  <!-- <label for="">Delivery Boy A</label>
                  <input type="text" class="form-control" id="catname"> -->
                  <!-- <label for="">Delivery Boy p</label>
                  <input type="text" class="form-control" id="catname"> -->
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" onclick="savecate()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  <!-- model ends -->

  <!-- -----------------------------------------------------------------------------------------------------df -->
  <!-- Menu update code here -->
   <!-- model started -->
   <div class="modal fade" id="updatemenumodel" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <input type="hidden" id="hidden_id">
                  <label for="">Delivery Boy Name</label>
                  <input type="text" class="form-control" id="upboyname">
                  <label for="">Delivery Boy Mobile Number</label>
                  <input type="number" class="form-control" id="upboymob">
                </form>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" onclick="updatecate()">Update</button>
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

    function savecate() {
      // alert('fun');
      // menuname,menuunit,menurate,menucategory,behavior,makingtime,disc
      var boyname = $('#boyname').val();
      var boymob = $('#boymob').val();
     
      $.ajax({
        url: "deliveryboy_backend.php",
        type: "POST",
        data: {
            boyname: boyname,
            boymob: boymob,
         
        },
        success: function(data) {
          console.log(data);
          $('#basicModal').modal('hide');
         location.reload();
        //  $('#tblcontent').html(data);
       },
     }
     );
    }





    function getdata(updateid) {

        // alert("get details hii"+updateid);
      // $('#hidden_id').val(updateid);

      $.post("deliveryboy_backend.php", {
        updateid: updateid
      }, function(data, status) {
        // alert("Successfully");
        console.log(data);
        var boydata = JSON.parse(data);
        //   $('#up_categoryname').val(user.name);
           
           
        $('#hidden_id').val(boydata.id);
        // $('#upvcname').val(menu.companyname);
        $('#upboyname').val(boydata.deliveryboy_name);
        $('#upboymob').val(boydata.deliveryboy_mob);
       

      });
      $('#updatemenumodel').modal('show');


    }




    function updatecate() {
      var hidden_id = $('#hidden_id').val();
      var upboyname = $('#upboyname').val();
      var upboymob = $('#upboymob').val();
     

     $.ajax({
        url: "deliveryboy_backend.php",
        type: "POST",
        data: {
          hidden_id: hidden_id,
          upboyname: upboyname,
          upboymob: upboymob,
       
        },
        success: function(data) {
          console.log(data);
          // $('#basicModal').modal('hide');
         location.reload();
          // $('#tblcontent').html(data);
        },
      });
    }


    function deletedata(deleteid)
    {
        // alert(id); 
        
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Boy Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {

      $.ajax({
                    url: "deliveryboy_backend.php",
                    type: "POST",
                    data: {deleteid:deleteid},
                    success:function(data) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                        location.reload(true);
                       //alert("sucess");
                //   readrecord();
                    },
                });


    } else {

    }
  });

    }
  </script>