<?php
include_once("../Config/function.php");

$obj = new vms();
if (isset($_POST['IndoorJob'])) {
    $msg = $obj->indoor_job();
}
?>

<div class="container-fluid shadow-sm justify-content-around">
    <!-- First part for Indoor Job -->
    <form class="form-control" action="" method="POST">
        <div class="row shadow-sm mb-4">
            <h5 class="bg-light p-1 fw-bold text-primary">Indoor Job Creation</h5>
        </div>
        <?php if (isset($msg)) { ?>
            <div id="successMessage_1" class="alert alert-success">
                <?php echo $msg; ?>
            </div>
        <?php } ?>

        <div class="row">
            <!-- Date and Job Number Inputs -->
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                    <input type="date" id="date" name="date" class="form-control" required onchange="generateNumber()">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-text-width"></i></span>
                    <input type="text" id="autoNumber" name="autoNumber" placeholder="Job Number" class="form-control w-25" readonly>
                    <input type="text" class="form-control fw-bold" name="branch_name" style="font-size: smaller;" placeholder="Branch Name">
                </div>
            </div>
            <!-- Vehicle Info -->
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-truck"></i></span>
                    <input class="form-control w-25" type="text" id="vehicle_search" name="vehicle_reg" placeholder="Enter Vehicle No">
                    <div id="suggestions"></div>
                    <input class="form-control" type="text" id="model" name="model" placeholder="Model" readonly>
                </div>
            </div>
        </div>

        <!-- Mechanic Selection Section -->
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-wrench"></i></span>
                    <input type="text" id="multiple_mechanic" class="form-control" placeholder="Search Mechanics..." autocomplete="off">
                    <!-- Dropdown for mechanic search results -->
                    <div id="mechanicDropdown" class="dropdown-content"></div>

                    <!-- Selected mechanics list -->
                    <div id="selectedMechanicsList" class="mt-2"></div>

                    <!-- Hidden field(s) to store selected mechanics -->
                    <div id="hiddenMechanicInputs"></div>
                </div>
            </div>
            <!-- Driver Selection Section -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-motorcycle"></i></span>
                    <input class="form-control w-25" type="text" id="driver_search" name="driver_name" placeholder="Enter Driver Name">
                    <div id="suggestions"></div>
                    <input class="form-control" type="text" id="driver_id" name="driver_id" placeholder="ID No">
                </div>
            </div>
            <!-- Driver's Complaint -->
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    <textarea class="form-control" type="text" name="driver_complain" placeholder="Driver's complain" required></textarea>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <button class="btn btn-primary fw-bold mt-2" type="submit" name="IndoorJob">Save the Job</button>
        </div>
    </form>
    <!--2nd part for viewing Indoor Job & step to create Requisition-->
    <div class="row mt-5">
        <div class="">
            <table class="table table-hover text-center">
                <thead class="bg-warning">
                    <tr>
                        <th>SL No.</th>
                        <th>Job Date</th>
                        <th>Registration No.</th>
                        <th>Model</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Job No.</th>
                        <th>Done Req.</th>
                        <th>Create Req.</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>