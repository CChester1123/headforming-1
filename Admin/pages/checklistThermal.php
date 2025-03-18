<title>Thermal && In-Process Audit</title>

<?php
$prod_id = base64_decode($_GET['Productid']);
$type = $_GET['type'];
$department = $_GET['department'];

if ($type == "" || $prod_id == "") {
    header("Location: checklist");
}
include 'includes/header.php';
$sql = $user->ViewEditProduct($prod_id);
while ($row = mysqli_fetch_array($sql)) {
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #111E6C; color: white;">
                                <h3 class="card-title"> AUDIT LIST </h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Work Order</label>
                                            <input type="text" class="form-control" id="workorder" placeholder="Enter Work Order">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Date</label>
                                            <input type="text" class="form-control" id="date" placeholder="Enter Product Description" value="<?php echo date("F j, Y"); ?>" disabled>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Time</label>
                                            <input type="datetime-local" class="form-control" id="time" value="<?php echo date('Y-m-d\TH:i'); ?>" />

                                        </div>

                                        <div class="col-sm">
                                            <label>Shift</label>
                                            <select class="form-control" id="shift">
                                                <option value="AM">AM</option>
                                                <option value="PM">PM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-sm">
                                            <label>Operator/s Name</label>
                                            <input type="text" class="form-control" id="operatorName" placeholder="Enter Operator Name">
                                        </div>

                                        <div class="col-sm">
                                            <label>Assigned Team Leader</label>
                                            <select class="form-control" id="teamLead">
                                                <option value="asd">asd</option>
                                                <option value="dsa">dsa</option>
                                            </select>
                                        </div>

                                        <div class="col-sm ">
                                            <label>Machine No.</label>
                                            <select name="cars" class="form-control" id="machineNo">
                                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" id="product" placeholder="Enter Product Name" value="<?php echo $row['productname']; ?>" disabled>
                                        </div>

                                        <?php $qual = isset($_GET['qual']) ? $_GET['qual'] : '';
                                        ?>
                                        <div class="col-sm">
                                            <label>Type</label>
                                            <select id="type" class="form-control" disabled>
                                                <option value="In-Process Audit" <?php echo ($qual == 'In-Process Audit') ? 'selected' : ''; ?>>In-Process Audit</option>
                                                <option value="Start-up Qualification" <?php echo ($qual == 'Start-up Qualification') ? 'selected' : ''; ?>>Start-up Qualification</option>
                                                <option value="Product Change" <?php echo ($qual == 'Product Change') ? 'selected' : ''; ?>>Product Change</option>
                                            </select>
                                        </div>


                                        <!-- <?php $dept = isset($_GET['dept']) ? $_GET['dept'] : '';
                                                ?>
                                        <div class="col-sm">
                                            <label>Department</label>
                                            <select id="department" class="form-control">
                                                <option value="Thermal Bonding" <?php echo ($dept == 'Thermal Bonding') ? 'selected' : ''; ?>>Thermal Bonding</option>
                                                <option value="Head Forming" <?php echo ($dept == 'Head Forming') ? 'selected' : ''; ?>>Head Forming</option>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="mr-1">Quality</label>
                                            <input type="text" id="InspectedBY" value="<?php echo $_SESSION['name']; ?>" class="form-control" readonly>
                                        </div>

                                        <div class="col-sm">
                                            <label class="mr-1">Maintenance</label>
                                            <select class="form-control" id="maintenancecheced" data-placeholder="Maintenance By" style="width: 100%;">
                                                <?php
                                                $sql = $user->selectMaintenance();
                                                while ($list1 = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $list1['employeeID']; ?>"><?php echo $list1['fullName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <!-- <?php if ($type == "In-Process Audit") {     ?>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm">
                                                <label>Operator(s)</label>
                                                <input type="text" class="form-control template" id="myTextbox" placeholder="Enter Operator(s)">
                                            </div>
                                            <div class="col-sm">
                                                <label>Time</label>
                                                <input type="datetime-local" class="form-control trans_num" id="myTextbox2">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> -->

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
                                <h3 class="card-title">In-Process Audit</h3>
                            </div>

                            <div class="card-body">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Handle Part Number</label>
                                            <input type="text" class="form-control" id="handle" placeholder="Enter Handle" value="<?php echo $row['handle']; ?>">
                                        </div>

                                        <div class="col-sm">
                                            <label>Substrate Material Part NUmber</label>
                                            <input type="text" class="form-control" id="substrate" placeholder="Enter Handle" value="<?php echo $row['substrate']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="col-sm">
                                                <label>Handle Tree Color</label>
                                                <select class="form-control" id="handleTreeColor">
                                                    <option value="Light green">Light Green</option>
                                                    <option value="Orange">Orange</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Light blue">Light Blue</option>
                                                    <option value="White">White</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label>Substrate Material Lot Number</label>
                                            <input type="text" class="form-control" id="substrateLotNum" placeholder="Enter Substrate Material Lot Number" value="<?php echo $row['substrateLotNum']; ?>">
                                        </div>
                                        <div class="col-sm">
                                            <label>Handle Tree Material Lot Number</label>
                                            <input type="text" class="form-control" id="handleTreeMaterialNum" placeholder="Enter Tree Material Number" value="<?php echo $row['handleTreeMaterialNum']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label>Swab Handle with Texwipe Logo?</label>
                                            <select class="form-control" id="texwipeLogo">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                        <div class="col-sm">
                                            <label>Remarks</label>
                                            <input type="text" class="form-control" id="remarksInprocess" placeholder="Enter Remarks">
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
                                <h3 class="card-title"> THERMAL BONDING MACHINE PARAMETERS </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    <!-- fgfg -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <br><label style="margin-left: 20px;">HEATER TEMPERATURE UPPER AND LOWER</label>
                                            </div>

                                            <div class="col-sm">
                                                <label>Minumum</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value1actual($row['heaterTempUpnLowRange'])); ?> °C" readonly disabled>
                                            </div>

                                            <div class="col-sm">
                                                <label>Maximum</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value2actual($row['heaterTempUpnLowRange'])); ?> °C" readonly disabled>
                                            </div>

                                            <div class="col-sm">
                                                <label>Actual</label><br>
                                                <input type="text" class="form-control" id="actTempUpnLow" placeholder="Enter Actual">
                                            </div>

                                            <div class="col-sm">
                                                <label>Remarks</label>
                                                <input type="text" class="form-control" id="TempUpnLow" placeholder="" disabled>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <br><label style="margin-left: 20px;">Heating Time</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value1actual($row['heatingTimeRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value2actual($row['heatingTimeRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actHeatingTime" placeholder="Enter Actual">
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="HeatingTime" placeholder="" disabled>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Heater Open and Swab Handle Fixture Closing</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value1actual($row['heaterSwabHandleFixtureRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value2actual($row['heaterSwabHandleFixtureRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actSwabHandleFixture" placeholder="Enter Actual">
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="SwabHandleFixture" placeholder="" disabled>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Fixture Closing Time</label>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value1actual($row['fixtureClosingTimeRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user->value2actual($row['fixtureClosingTimeRange'])); ?> .secs" readonly disabled>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="actFixtureClosingTime" placeholder="Enter Actual">
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" class="form-control" id="FixtureClosingTime" placeholder="" disabled>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>

                                            <div class="col-sm"><br>
                                            </div>

                                            <div class="col-sm"><br>
                                                <select class="form-control" id="productionStats">
                                                    <option value="Continue Production" selected>Continue Production</option>
                                                    <option value="Stop Production">Stop Production</option>
                                                </select>
                                            </div>

                                            <div class="col-sm"><br>
                                                <input type="text" id="remarksProduction" class="form-control actualDataLoop result" placeholder="Enter Remarks">
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
                                <h3 class="card-title"> FUNCTIONALITY </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;">Visual Inspection (20 HT)</label>

                                            </div>

                                            <div class="col-sm-3">
                                                <select class="form-control" id="visualInpection">
                                                    <option value="Passed">PASSED</option>
                                                    <option value="Failed">FAILED</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <input type="text" id="remarksVisual" class="form-control actualDataLoop result" placeholder="Enter Remarks">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label style="margin-left: 20px;"><br>Resistance of Substrate to Handle Tip (5 locations)</label>
                                            </div>

                                            <div class="col-sm-3"><br>
                                                <select class="form-control" id="resistanceInpection">
                                                    <option value="Passed">PASSED</option>
                                                    <option value="Failed">FAILED</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm"><br>
                                                    <input type="text" id="remarksResistance" class="form-control actualDataLoop result" placeholder="Enter Remarks">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label style="color: red; margin-left: 30px;"> NOTE:</label><br>
                                            <label style="color: red; margin-left: 100px;">Process Inspection:<br>
                                                Any non conformance found requires immediate correction of process, quarantine of affected lot and follow non-conforming SOP.</label><br><br>
                                            <label style="color: red; margin-left: 100px;">Process and Visual Inspection of Product for each Operator: <br>
                                                QA shall conduct verification if found one (1) reject during visual inspection for each operator. Operator shall do 100% re inspection if found another one (1) similar reject. QA will then verify the re worked products as well as finished goods (if there is any). Follow Non–conforming SOP if reject are still found. </label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    <?php }    ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li><a type="button" class="btn btn-primary mr-1 fas fa-check-circle btnSave"> Submit </a></li>
                        <li><a type="button" class="btn btn-danger mr-1 fas far fa-arrow-alt-circle-left btnBack"> Back </a></li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    </div>

    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #111E6C; color: white;">
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                </div>

                <div class="modal-body">
                    Do you to submit this checklist ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmitDelete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    </div>
    <?php include 'includes/footer.php';
    include  'includes/validation.php';
    ?>
    <script>
        function compareNumbers(groupIndex) {
            let number1 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "1").value) - 0.1;
            let number2 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "2").value) + 0.1;
            var number3 = parseFloat(document.getElementById("actualDataLoopa" + groupIndex + "3").value);
            var resultElement = document.getElementById("actualDataLoopResult" + groupIndex);

            if (number3 == "") {
                resultElement.value = "test";
            } else if (isNaN(number2)) {
                if (number3 > number1) {
                    resultElement.value = "Good";
                } else {
                    resultElement.value = "Out of specs";
                }
            } else if ((number1 < number3 && number3 < number2) || (number2 < number3 && number3 < number1)) {
                resultElement.value = "Good";
            } else {
                resultElement.value = "Out of specs";
            }
        }

        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        $(document).on('click', '.btnBack', function() {
            window.location.href = "checklist";
        });

        $(document).on('click', '.btnSave', function() {

            $("#deleteModal").modal("show");
        });

        $(document).on('click', '#dataSubmitDelete', function() {
            $("#dataSubmitDelete").attr("disabled", true);

            var pick = "17";
            var status = "Pending";

            var workorder = $.trim(encodeURI($("#workorder").val()));
            var date = $.trim(encodeURI($("#date").val()));
            var time = $.trim(encodeURI($("#time").val()));
            var shift = $.trim(encodeURI($("#shift").val()));
            var operatorName = $.trim(encodeURI($("#operatorName").val()));

            var teamLead = $.trim(encodeURI($("#teamLead").val()));
            var machineNo = $.trim(encodeURI($("#machineNo").val()));
            var product = $.trim(encodeURI($("#product").val()));
            var type = $.trim(encodeURI($("#type").val()));
            var InspectedBY = $.trim(encodeURI($("#InspectedBY").val()));

            var maintenancecheced = $.trim(encodeURI($("#maintenancecheced").val()));
            var handle = $.trim(encodeURI($("#handle").val()));
            var substrate = $.trim(encodeURI($("#substrate").val()));
            var handleTreeColor = $.trim(encodeURI($("#handleTreeColor").val()));
            var substrateLotNum = $.trim(encodeURI($("#substrateLotNum").val()));

            var handleTreeMaterialNum = $.trim(encodeURI($("#handleTreeMaterialNum").val()));
            var texwipeLogo = $.trim(encodeURI($("#texwipeLogo").val()));
            var remarksInprocess = $.trim(encodeURI($("#remarksInprocess").val()));
            var actTempUpnLow = $.trim(encodeURI($("#actTempUpnLow").val()));
            var TempUpnLow = $.trim(encodeURI($("#TempUpnLow").val()));

            var actHeatingTime = $.trim(encodeURI($("#actHeatingTime").val()));
            var HeatingTime = $.trim(encodeURI($("#HeatingTime").val()));
            var actSwabHandleFixture = $.trim(encodeURI($("#actSwabHandleFixture").val()));
            var SwabHandleFixture = $.trim(encodeURI($("#SwabHandleFixture").val()));
            var actFixtureClosingTime = $.trim(encodeURI($("#actFixtureClosingTime").val()));
            var FixtureClosingTime = $.trim(encodeURI($("#FixtureClosingTime").val()));

            var productionStats = $.trim(encodeURI($("#productionStats").val()));
            var remarksProduction = $.trim(encodeURI($("#remarksProduction").val()));
            var visualInpection = $.trim(encodeURI($("#visualInpection").val()));
            var remarksVisual = $.trim(encodeURI($("#remarksVisual").val()));
            var resistanceInpection = $.trim(encodeURI($("#resistanceInpection").val()));
            var remarksResistance = $.trim(encodeURI($("#remarksResistance").val()));

            var fd = new FormData();
            fd.append('pick', pick);
            fd.append('status', status);

            fd.append('workorder', workorder);
            fd.append('date', date);
            fd.append('time', time);
            fd.append('shift', shift);
            fd.append('operatorName', operatorName);

            fd.append('teamLead', teamLead);
            fd.append('machineNo', machineNo);
            fd.append('product', product);
            fd.append('type', type);
            fd.append('InspectedBY', InspectedBY);

            fd.append('maintenancecheced', maintenancecheced);
            fd.append('handle', handle);
            fd.append('substrate', substrate);
            fd.append('handleTreeColor', handleTreeColor);
            fd.append('substrateLotNum', substrateLotNum);

            fd.append('handleTreeMaterialNum', handleTreeMaterialNum);
            fd.append('texwipeLogo', texwipeLogo);
            fd.append('remarksInprocess', remarksInprocess);
            fd.append('actTempUpnLow', actTempUpnLow);
            fd.append('TempUpnLow', TempUpnLow);

            fd.append('actHeatingTime', actHeatingTime);
            fd.append('HeatingTime', HeatingTime);
            fd.append('actSwabHandleFixture', actSwabHandleFixture);
            fd.append('SwabHandleFixture', SwabHandleFixture);
            fd.append('actFixtureClosingTime', actFixtureClosingTime);
            fd.append('FixtureClosingTime', FixtureClosingTime);

            fd.append('productionStats', productionStats);
            fd.append('remarksProduction', remarksProduction);
            fd.append('visualInpection', visualInpection);
            fd.append('remarksVisual', remarksVisual);
            fd.append('resistanceInpection', resistanceInpection);
            fd.append('remarksResistance', remarksResistance);

            for (let pair of fd.entries()) {
                console.log(pair[0] + ": " + pair[1]);
            }

            $.ajax({
                url: "../pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(result) {

                    // alert(result);
                    if ($.trim(result) != 0) {
                        $.notify("Account Created Successfully ", "success");
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

        function cuttonforce() {
            var cuttingforce1 = document.getElementsByClassName("cuttingforce1");
            var cuttingforce2 = document.getElementsByClassName("cuttingforce2");
            var cuttingforce3 = document.getElementsByClassName("cuttingforce3");
            var cuttingforcevalidation = document.getElementsByClassName("cuttingforcevalidation");


            cuttingforcevalidation.textContent = "Out of specs";
        }

        $(document).on('click', '#toggleButton', function() {
            var textbox = document.getElementById("myTextbox");
            var textbox2 = document.getElementById("myTextbox2");
            textbox.disabled = !textbox.disabled;
            textbox2.disabled = !textbox2.disabled;
        });
    </script>