<h2>Job Creation Page</h2>

<!--1st form start-->
<form action="">
    <div class="container-fluid form-control text-center shadow">
        <div class="row py-3" style="min-height: 70px;">
            <div class="col d-flex me-2">
                <div class="w-25 bg-light me-1 shadow-sm">25</div>
                <div class="w-75 bg-info">date</div>
            </div>
            <div class="col-4 d-flex me-2">
                <div class="w-25 bg-light me-1 shadow-sm">25</div>
                <div class="w-75 bg-info">auto job number</div>
            </div>
            <div class="col-5 d-flex me-2">
                <div class="w-25 bg-light me-1 shadow-sm">25</div>
                <div class="w-50 bg-warning">Vehicle No</div>
                <div class="bg-info">Model will be auto loaded</div>
            </div>
        </div>
        <div class="row py-3" style="min-height: 70px;">
            <div class="col-4 me-3">
                <div class="row">
                    <div class="col bg-primary me-2">Driver_Name & ID No</div>
                    <div class="col bg-primary">Multiple Mechanic</div>
                </div>
            </div>
            <div class="col-md-6 bg-secondary me-3">Driver Complain</div>
            <div class="col bg-success">
                <div class="row">
                    <div class="col">Hour</div>
                    <div class="col">Day</div>
                </div>
            </div>
        </div>
    </div>
</form><br>

<!--1st form end-->

<form method="POST">
    <!-- Job Title -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-briefcase"></i> Job Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-align-left"></i> Description</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
    </div>

    <!-- Salary -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-dollar-sign"></i> Salary</label>
        <input type="number" class="form-control" name="salary" step="0.01">
    </div>

    <!-- Location -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-map-marker-alt"></i> Location</label>
        <input type="text" class="form-control" name="location">
    </div>

    <!-- Category -->
    <div class="mb-3">
        <label class="form-label"><i class="fas fa-list"></i> Category</label>
        <select class="form-control" name="category">
            <option value="IT">IT</option>
            <option value="Finance">Finance</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Education">Education</option>
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
</form>