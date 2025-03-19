<title>Checklist</title>
<?php include 'includes/header.php'; ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Checklist</h1>
        </div>

        <?php if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') { ?>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-info fa fa-plus-square createProduct" data-toggle="modal" data-target="#CreateModal"> Add Checklist </a></li>
            </ol>
          </div>
        <?php   } ?>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Accounts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center;">Action</th>
                    <th style="text-align:center;">Date</th>
                    <th style="text-align:center;">Auditor</th>
                    <th style="text-align:center;">Work Order</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Product Number</th>
                    <th style="text-align:center;">Status</th>
                    <!-- <th style="text-align:center;">Maintenance Status</th>         -->
                    <!-- <th style="text-align:center;">Team Lead Status</th>  </tr> -->
                </thead>
                <tbody>
                  <?php
                  if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') {
                    $sql = $user->GetCheckList();
                  } else {
                    $sql = $user->GetCheckListChecker($_SESSION['emp_id']);
                  }

                  while ($row = mysqli_fetch_array($sql)) { ?>
                    <tr>
                      <td style="text-align:center;">
                        <?php  //if($row['status'] == "Rejected" && $row['count']  == "0") {
                        ?>
                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnDuplicate  btn-warning btn-sm' title='Duplicate Record'><i class="fa fa-clone" style='font-size:15px'></i> </button>
                        <?php //} 
                        ?>
                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnView  btn-primary btn-sm' title='View Record'><i class='fa fa-search-plus' style='font-size:15px'></i> </button>
                        <?php if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') {
                          if ($row['status'] == "Pending" || $row['status'] == "") { ?>
                            <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnEdit  btn-success btn-sm' title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button>

                            <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnDelete  btn-danger btn-sm' title='Delete Record'><i class='fa fa-trash' style='font-size:15px'></i> </button>



                        <?php }
                        } ?>
                      </td>

                      <td style="text-align:center;"><?php echo htmlentities($row['date']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['InspectedBY']); ?></td>


                      <td style="text-align:center;"><?php echo htmlentities($row['workorder']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['type']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['product']); ?></td>
                      <td style="text-align:center;"><?php echo (htmlentities($row['status']) == '' ? 'Pending' : $row['status']); ?></td>
                      <!-- <td style="text-align:center;"><?php // echo (htmlentities($row['status_maintenance']) == '' ? 'Pending' : $row['status_maintenance']);
                                                          ?></td> -->
                      <!-- <td style="text-align:center;"><?php //echo (htmlentities($row['status_TL']) == '' ? 'Pending' : $row['status_TL']);
                                                          ?></td> -->
                    </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> THERMAL BONDING </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="text-align:center;">Action</th>
                    <th style="text-align:center;">Date</th>
                    <th style="text-align:center;">Auditor</th>
                    <th style="text-align:center;">Work Order</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Product Number</th>
                    <th style="text-align:center;">Status</th>
                    <!-- <th style="text-align:center;">Maintenance Status</th>         -->
                    <!-- <th style="text-align:center;">Team Lead Status</th>  </tr> -->
                </thead>
                <tbody>
                  <?php
                  if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') {
                    $sql = $user->GetCheckListThermal();
                  } else {
                    $sql = $user->GetCheckListChecker($_SESSION['emp_id']);
                  }

                  while ($row = mysqli_fetch_array($sql)) { ?>
                    <tr>
                      <td style="text-align:center;">
                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnDuplicate2  btn-warning btn-sm' title='Duplicate Record'><i class="fa fa-clone" style='font-size:15px'></i> </button>

                        <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnView2  btn-primary btn-sm' title='View Record'><i class='fa fa-search-plus' style='font-size:15px'></i> </button>

                        <?php if ($_SESSION['account_type'] == 'QA' || $_SESSION['account_type'] == 'Admin' || $_SESSION['account_type'] == 'QA Manager') {
                          if ($row['status'] == "Pending" || $row['status'] == "") { ?>
                            <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnEdit2  btn-success btn-sm' title='View Record'><i class='fa fa-pen' style='font-size:15px'></i> </button>

                            <button type='button' id='<?php echo htmlentities(base64_encode($row['id'])); ?>' class='btnDelete2  btn-danger btn-sm' title='Delete Record'><i class='fa fa-trash' style='font-size:15px'></i> </button>
                        <?php }
                        } ?>
                      </td>

                      <td style="text-align:center;"><?php echo htmlentities($row['date']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['InspectedBY']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['workorder']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['type']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['product']); ?></td>
                      <td style="text-align:center;"><?php echo htmlentities($row['status']); ?></td>
                    </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</div>

<div class="modal fade" id="createList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">

          <!-- <div class="form-group">
            <label> department </label>
            <select id="department" class="form-control">
              <option value="Head Forming" selected>Head Forming</option>
              <option value="Thermal Bonding">Thermal Bonding</option>
            </select>
          </div>

          <div class="form-group">
            <label> FG PART NO. </label>
            <select id="partNo" class="form-control" onchange="jsFunction()">
              <option value="" active>Choose Item Code</option>
              <?php
              $sql = $user->selectPartNo();
              while ($list = mysqli_fetch_array($sql)) { ?>
                <option value="<?php echo base64_encode($list['id']); ?>"><?php echo $list['productname']; ?> - <?php echo $list['department']; ?></option>
              <?php } ?>
            </select>
          </div> -->

          <div class="form-group">
            <label>Classification</label>
            <select id="department" class="form-control" onchange="filterPartNo()">
              <option value="Head Forming" selected>Head Forming</option>
              <option value="Thermal Bonding">Thermal Bonding</option>
            </select>
          </div>

          <div class="form-group">
            <label>FG PART NO.</label>
            <select id="partNo" class="form-control" onchange="updateDepartment()">
              <option value="" active>Choose Item Code</option>
              <?php
              $sql = $user->selectPartNo();
              while ($list = mysqli_fetch_array($sql)) { ?>
                <option value="<?php echo base64_encode($list['id']); ?>" data-department="<?php echo $list['department']; ?>">
                  <?php echo $list['department']; ?> - <?php echo $list['productname']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label> Qualification</label>
            <select id="type" class="form-control">
              <option value="Start-up qualification" selected>Start-up qualification</option>
              <option value="In-Process Audit">In-Process Audit</option>
              <option value="Product Change">Product Change</option>
            </select>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createAccount" id="createProduct">Create</button>
        <button type="button" class="btn btn-Danger" data-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="duplicateList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          Do you want to create a duplicate copy?


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createAccount" id="duplicateBtn">Yes</button>
        <button type="button" class="btn btn-Danger" data-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="duplicateList2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          Do you want to create a duplicate copy?


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createAccount" id="duplicateBtn2">Yes</button>
        <button type="button" class="btn btn-Danger" data-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>
</div>




<div class="modal fade" id="deleteList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          Do you want to create a delete copy?


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createAccount" id="deleteBtn">Yes</button>
        <button type="button" class="btn btn-Danger" data-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteList2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          Do you want to create a delete copy?


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary createAccount" id="deleteBtn2">Yes</button>
        <button type="button" class="btn btn-Danger" data-dismiss="modal">No</button>

      </div>
    </div>
  </div>
</div>
</div>

<?php include 'includes/footer.php'; ?>
<script>
  // Function to filter FG PART NO. based on the selected department
  function filterPartNo() {
    const selectedDepartment = document.getElementById("department").value;
    const partNoOptions = document.querySelectorAll("#partNo option");

    partNoOptions.forEach(option => {
      if (option.value === "") {
        // Always show the default "Choose Item Code" option
        option.style.display = "block";
      } else {
        // Show or hide based on the department
        if (option.getAttribute("data-department") === selectedDepartment) {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      }
    });

    // Reset the selected value of the FG PART NO. dropdown if it doesn't match the department
    const selectedPartNo = document.getElementById("partNo");
    if (selectedPartNo.value !== "" && selectedPartNo.querySelector(`option[value="${selectedPartNo.value}"]`).getAttribute("data-department") !== selectedDepartment) {
      selectedPartNo.value = "";
    }
  }

  // Function to update the department dropdown based on the selected FG PART NO.
  function updateDepartment() {
    const selectedPartNo = document.getElementById("partNo");
    const selectedOption = selectedPartNo.options[selectedPartNo.selectedIndex];

    if (selectedOption.value !== "") {
      // Get the department from the selected FG PART NO.
      const department = selectedOption.getAttribute("data-department");

      // Set the department dropdown to the corresponding department
      const departmentDropdown = document.getElementById("department");
      departmentDropdown.value = department;

      // Filter the FG PART NO. dropdown to show only options for the selected department
      filterPartNo();

      // Ensure the selected FG PART NO. remains selected
      selectedPartNo.value = selectedOption.value;
    } else {
      // If "Choose Item Code" is selected, reset the department dropdown
      document.getElementById("department").value = "Head Forming"; // Default department
      filterPartNo();
    }
  }

  // Initial call to filter FG PART NO. based on the default department
  filterPartNo();

  $(document).on('click', '.createProduct', function() {
    $("#createList").modal("show");
  });

  $(document).on('click', '#createProduct', function() {
    var partNo = $.trim($("#partNo").val()),
      type = $.trim($("#type").val()),
      department = $.trim($("#department").val());

    if (!partNo) {
      $.notify("Please select Part No", "error");
      return;
    }

    $("#createList").modal("show");

    var url = (department === "Thermal Bonding" && type === "In-Process Audit") ?
      "checklistThermal" :
      "checklistCreate";

    location.href = `${url}?Productid=${encodeURIComponent(partNo)}&type=${encodeURIComponent(type)}&department=${encodeURIComponent(department)}`;
  });



  $(document).on('click', '.btnView', function() {
    id = $(this).attr("id");
    location.href = "checklistView?id=" + id;
  });

  $(document).on('click', '.btnView2', function() {
    id = $(this).attr("id");
    location.href = "checklistThermalView?id=" + id;
  });

  $(document).on('click', '.btnEdit', function() {
    id = $(this).attr("id");
    location.href = "checklistEdit?id=" + id;
  });

  $(document).on('click', '.btnEdit2', function() {
    id = $(this).attr("id");
    location.href = "checklistThermalEdit?id=" + id;
  });

  $(document).on('click', '.btnDuplicate', function() {
    id = $(this).attr("id");
    $("#duplicateList").modal("show");
  });

  $(document).on('click', '.btnDuplicate2', function() {
    id = $(this).attr("id");
    $("#duplicateList2").modal("show");
  });

  $(document).on('click', '#duplicateBtn2', function() {

    var pick = "18";
    var fd = new FormData();
    fd.append('pick', pick);
    fd.append('id', id);
    $.ajax({
      url: "../pages/codes/admin_control.php",
      data: fd,
      processData: false,
      contentType: false,
      type: 'POST',
      success: function(result) {
        if ($.trim(result) != 0) {
          $.notify("Checklist Successfully Duplicated ", "success");
          setTimeout(function() {
            window.location.href = "checklist";
          }, 2000);
        } else {
          $.notify("Problem Encounter! please contact your administrator", "error");
          $("#dataSubmitDelete").attr("disabled", false);
        }
      }
    });

  });

  // $(document).on('click', '#duplicateBtn', function() {


  //   var pick = "15";
  //   var fd = new FormData();
  //   fd.append('pick', pick);
  //   fd.append('id', id);
  //   $.ajax({
  //     url: "../pages/codes/admin_control.php",
  //     data: fd,
  //     processData: false,
  //     contentType: false,
  //     type: 'POST',
  //     success: function(result) {
  //       if ($.trim(result) != 0) {
  //         $.notify("Checklist Successfully Duplicated ", "success");
  //         setTimeout(function() {
  //           window.location.href = "checklist";
  //         }, 2000);
  //       } else {
  //         $.notify("Problem Encounter! please contact your administrator", "error");
  //         $("#dataSubmitDelete").attr("disabled", false);
  //       }
  //     }
  //   });



  // });


  $(document).on('click', '.btnDelete', function() {
    id = $(this).attr("id");
    $("#deleteList").modal("show");
  });

  $(document).on('click', '.btnDelete2', function() {
    id = $(this).attr("id");
    $("#deleteList2").modal("show");
  });

  $(document).on('click', '#deleteBtn', function() {

    // alert(id);
    var pick = "16";
    var fd = new FormData();
    fd.append('pick', pick);
    fd.append('id', id);
    $.ajax({
      url: "../pages/codes/admin_control.php",
      data: fd,
      processData: false,
      contentType: false,
      type: 'POST',
      success: function(result) {
        // alert(result);
        if ($.trim(result) != 0) {
          $.notify("Checklist Delete Successfully  ", "success");
          setTimeout(function() {
            window.location.href = "checklist";
          }, 2000);
        } else {
          $.notify("Problem Encounter! please contact your administrator", "error");
          $("#dataSubmitDelete").attr("disabled", false);
        }
      }
    });



  });

  $(document).on('click', '#deleteBtn2', function() {

// alert(id);
var pick = "19";
var fd = new FormData();
fd.append('pick', pick);
fd.append('id', id);
$.ajax({
  url: "../pages/codes/admin_control.php",
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function(result) {
    // alert(result);
    if ($.trim(result) != 0) {
      $.notify("Checklist Delete Successfully  ", "success");
      setTimeout(function() {
        window.location.href = "checklist";
      }, 2000);
    } else {
      $.notify("Problem Encounter! please contact your administrator", "error");
      $("#dataSubmitDelete").attr("disabled", false);
    }
  }
});



});
</script>