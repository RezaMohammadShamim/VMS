<div class="container-fluid shadow-sm">
    <form class="form-control" action="#" method="POST">
        <div class="row shadow-sm mb-4 border rounded">
            <h5 class="bg-light p-1 fw-bold text-primary">Indoor Job Creation</h5>
        </div>
        <div class="row justify-content-around">
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
                    <input type="text" id="autoNumber" name="autoNumber"
                        class="form-control" readonly>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-truck"></i></span>
                    <input class="form-control w-25" type="text" placeholder="Registration Number" required>
                    <input class="form-control" type="text" placeholder="Model" required>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-wrench"></i></span>
                    <input class="form-control" type="text" placeholder="Multiple Mechanic" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-motorcycle"></i></span>
                    <input class="form-control w-25" type="text" placeholder="Driver Name" required>
                    <input class="form-control" type="text" placeholder="Office ID" required>
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
</div>