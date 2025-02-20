<div class="container-fluid shadow-sm">
    <!--1st part for making Indoor Job-->
    <form class="form-control" action="#" method="GET">
        <div class="row shadow-sm mb-4">
            <h5 class="bg-light p-1 fw-bold text-primary">Indoor Job Creation</h5>
        </div>
        <div class="row justify-content-around">
            <!-- Codes for auto generate the job number & Branch Selection-->
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                    <input type="date" id="date" name="date" class="form-control"
                        required onchange="generateNumber()">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-text-width"></i></span>
                    <input type="text" id="autoNumber" name="autoNumber" placeholder="Job Number"
                        class="form-control w-25" readonly>
                    <input type="text" class="form-control fw-bold" style="font-size: smaller;" placeholder="Branch Name">
                </div>
            </div>
            <!-- Codes for operate the vehicle_list -->
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-truck"></i></span>
                    <input class="form-control w-25" type="text" id="vehicle_search" placeholder="Enter Vehicle No">
                    <div id="suggestions"></div>
                    <input class="form-control" type="text" id="model" placeholder="Model" readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Codes for operate the employee_list -->
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-wrench"></i></span>
                    <input type="text" id="multiple_mechanic" class="form-control" placeholder="Responsible mechanics">
                    <div id="mechanicDropdown" class="dropdown-content"></div>
                    <div id="selectedMechanicsList"></div> <!--Selected Mechanics List Will Appear Here -->
                </div>
            </div>
            <!-- Codes for operate the driver_list -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-motorcycle"></i></span>
                    <input class="form-control w-25" type="text" id="driver_search" placeholder="Enter Driver Name">
                    <div id="suggestions"></div>
                    <input class="form-control" type="text" id="driver_id" placeholder="ID No">
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    <textarea class="form-control" type="text" placeholder="Driver's complain" required></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-primary fw-bold mt-2">Save the Job</button>
        </div>
    </form>
    <!--2nd part for viewing Indoor Job & step to create Requisition-->
    <div class="row mt-5">
        <div class="form-control text-center">
            <table class="table table-hover">
                <thead class="bg-info">
                    <tr class="border rounded">
                        <th>SL No.</th>
                        <th>Date</th>
                        <th>Registration No.</th>
                        <th>Model</th>
                        <th>Driver Name</th>
                        <th>Driver ID</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Completed Req.</th>
                        <th>Create Req.</th>
                    </tr>
                </thead>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                    </tr>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>