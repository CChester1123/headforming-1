<title>View Product</title>
<?php

$prod_id = base64_decode($_GET['id']);
include 'includes/header.php';

$sql = $user->ViewEditProduct($prod_id);
while ($row = mysqli_fetch_array($sql)) {
?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Create Products</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Product Name</label>
                      <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['product']; ?>" readonly>
                      <input type="text" class="form-control" id="deptType" placeholder="Enter Product Description" value="<?php echo $deptType = $row['department'];?>" readonly hidden>

                      <input type="text" class="form-control" id="sealingtime" placeholder="Enter Minimum" value="<?php echo $user->value2Actual($row['sealingtimeRange']);?>" readonly >
                    </div>
                    <div class="col-sm">
                      <label>Product Description</label>
                      <input type="text" class="form-control" id="productDesc" placeholder="Enter Product Description" value="<?php echo $row['productDesc']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #111E6C; color: white;">
                <h3 class="card-title">RAW MATERIAL </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle</label>
                      <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>" readonly>
                    </div>
                    <div class="col-sm">
                      <label>Substrate</label>
                      <input type="text" class="form-control" id="subtrate" placeholder="Enter Substrate" value="<?php echo $row['subtrate']; ?>" readonly>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle Tree Color</label>
                      <input type="text" class="form-control" id="handleColor" placeholder="Enter Handle Color" value="<?php echo $row['handleColor']; ?>" readonly>
                    </div>

                    <div class="col-sm">
                      <label>Substrate Material Lot Number</label>
                      <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>" readonly>
                    </div>
                    <div class="col-sm">
                      <label>Handle Tree Material Lot Number</label>
                      <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>" readonly>
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm">
                      <label>Handle Tree Material Type</label>
                      <input type="text" class="form-control" id="machineTreeMatType" placeholder="Enter Handle Tree Material Type" value="<?php echo $row['machineTreeMatType']; ?>" readonly>
                    </div>

                    <div class="col-sm">
                      <label>Substrate Material Type</label>
                      <input type="text" class="form-control" id="substrateType" placeholder="Enter Handle Material Type" value="<?php echo $row['substrateType']; ?>" readonly>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
            if ($deptType == "Head Forming") {
              echo '<div class="card">
            <div class="card-header" style="background-color: #111E6C; color: white;">
              <h3 class="card-title">STANDARD PARAMETER</h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label style="color: #111E6C;">HEAD FORMING MACHINE</label>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Cutting Force (ton)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['cuttingforceRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingforce" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['cuttingforceRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Time (sec)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingtime" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['sealingtimeRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingtime" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingtimeRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Cutting Speed (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['cuttingspeedRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cuttingspeed" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['cuttingspeedRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Approaching Position (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="approachingposition" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1Actual($row['approachingpositionRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="approachingposition" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2Actual($row['approachingpositionRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Position Speed (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['sealingpositionspeedRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingpositionspeed" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingpositionspeedRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Sealing Position (mm/s)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingposition" placeholder="Enter Minimum" value="' . htmlspecialchars($user->value1actual($row['sealingpositionRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="sealingposition" placeholder="Enter Maximum" value="' . htmlspecialchars($user->value2actual($row['sealingpositionRange'])) . '" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Mode</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-5">
                          Position
                        </div>
                        <div class="col-sm-5">
                          <input type="checkbox" value="Position" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-5">
                          Pressure
                        </div>
                        <div class="col-sm-5">
                          <input type="checkbox" value="Pressure" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Mold Open Speed (mm/s)</label>
                  </div>
                  <div class="col-sm-8">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">

                          <input type="text" class="form-control" id="moldopenspeed" placeholder="Enter Mold Open Speed (mm/s)">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Water Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="watertemp" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="watertemp" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Air Pressure (psi)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="airpressure" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="airpressure" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Upper Heater Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="upperheatertemp" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Lower Heater Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowerheatertemp" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Upper Mold Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="uppermoldtemp" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Lower Mold Temperature (°C)</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lowermoldtemp" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>


          </div>';
            } else {
              echo '<div class="card">
            <div class="card-header" style="background-color: #111E6C; color: white;">
              <h3 class="card-title">STANDARD PARAMETER </h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label style="color: #111E6C;">THERMAL BONDING MACHINE</label>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Heater Temperature Upper and Lower</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterTempUpnLow" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterTempUpnLow" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Heater Open And Swab Handle Fixture Closing</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterSwabHandleFixture" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="heaterSwabHandleFixture" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm">
                    <label style="margin-left: 20px;">Fixture Closing Time</label>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Min
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="fixtureClosingTime" placeholder="Enter Minimum">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-2">
                          Max
                        </div>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="fixtureClosingTime" placeholder="Enter Maximum">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 

            </div>


          </div>';
            }
            ?>

          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #111E6C; color: white;">
                <h3 class="card-title"> DIMENSIONS </h3>
              </div>
              <div class="card-body">
                <div class="form-group">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Total Length (head+subtrate)(mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="totalLength" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="totalLength" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Length (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadlength" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Width (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadwidth" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab HeadThickness (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabheadthickness" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><br>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Handle Width (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlewidth" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Handle Thickness (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlethickness" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab handle Diameter (mm)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="swabhandlediameter" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Dimension Specs (1ht, 5 tips)</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="substrateDimention" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Pull / Seal Strength Specs (1ht, 5 tips) </label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pullSeatTest" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #111E6C; color: white;">
                <h3 class="card-title"> FUNCTIONALITY </h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-4">
                        <label style="margin-left: 20px;">No. of Tips per HT</label>
                      </div>
                      <div class="col-sm">
                        <input type="number" class="form-control" id="noHandleperHT" placeholder="Enter Handles">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <input type="text" list="employees" name="pulltest" class="form-control emp_id" id="pulltestdesc" value="Pull Test">
                        <datalist id="employees">
                          <option value="Pull Test" selected> Pull Test </option>
                          <option value="Seal Strength"> Seal Strength </option>
                          <datalist>



                            <!--   <select list="" name="pulltest" class="form-control emp_id" id="pulltestdesc" >
                                     <option value="Pull Test"  selected> Pull Test </option>
                                    <option value="Seal Strength"  > Seal Strength </option>        
                                </select> -->
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pulltest" placeholder="Enter Minimum">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="pulltest" placeholder="Enter Maximum">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Pulling</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpulling">
                                <option value="N/A">N/A</option>
                                <option value="GOOD">GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpulling">
                                <option value="N/A">N/A</option>
                                <option value="GOOD">GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm">
                        <label style="margin-left: 20px;">Swab Head Popping</label>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Min
                            </div>
                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpopping">
                                <option value="N/A">N/A</option>
                                <option value="GOOD">GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-2">
                              Max
                            </div>
                            <div class="col-sm-9">
                              <select class="form-control" id="swabheadpopping">
                                <option value="N/A">N/A</option>
                                <option value="GOOD">GOOD</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Save </a></li>
              <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back </a></li>
            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

<?php } ?>


<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #111E6C; color: white;">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
      </div>

      <div class="modal-body">
        Do you to create this product ?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
<script>
  $(document).on('click', '.btnBack', function() {
    window.location.href = "products2";
  });
</script>