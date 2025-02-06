<div class="col-md-2 vh-100 mt-0 pt-0 bg-light shadow-sm collapse show" id="navbar">
        <nav class="d-md-block vh-100" style="font-family: sans-serif; font-size: 14px;">
                <a class="nav-link text-dark align-items-center" href="../index.php">
                        <h4 class="py-3 text-center text-success fw-bold">Dashboard</h4>
                </a>
                <ul class="d-flex flex-column nav">
                        <li class="nav-item fw-bolder"><a class="nav-link align-items-center" href="/Vehicle_Maintenance/index.php" onclick="setActive(this)"><i
                                                class="fa fa-house me-2"></i>Home</a></li>
                        <li class="nav-item fw-bolder"><a class="nav-link align-items-center" href="#" onclick="setActive(this)"><i
                                                class="fa fa-user-alt me-2"></i>Admin</a></li>
                        <div class="accordion" id="accordion_list">
                                <li class="nav-item accordion-item">
                                        <a class="nav-link fw-bolder d-flex" data-bs-toggle="collapse" data-bs-target="#submenu1"
                                                aria-expanded="true" aria-controls="submenu1" href="#submenu1"><i
                                                        class="fa-solid fa-screwdriver-wrench me-2"></i>Workshop<span
                                                        class="fa fa-chevron-down ms-auto"></span>
                                        </a>
                                        <ul class="accordion-collapse collapse show" data-bs-parent="#accordion_list" id="submenu1"
                                                style="font-family: sans-serif; font-size: 12px;">
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Job creation.php"
                                                                onclick="setActive(this)">Job Creation</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Requisition creation.php"
                                                                onclick="setActive(this)">Requisition
                                                                Creation</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Out_door Job.php"
                                                                onclick="setActive(this)">Out_door Job</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Out station bill posting.php"
                                                                onclick="setActive(this)">Out_door bill
                                                                posting</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Out station job.php"
                                                                onclick="setActive(this)">Out_station
                                                                job</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Out station bill posting.php"
                                                                onclick="setActive(this)">Out_station bill
                                                                posting</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Vehicle entry.php"
                                                                onclick="setActive(this)">Vehicle Entry</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="/Vehicle_Maintenance/Workshop/Vendor entry.php"
                                                                onclick="setActive(this)">Vendor Entry</a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item accordion-item">
                                        <a class="nav-link fw-bolder d-flex" data-bs-toggle="collapse" data-bs-target="#submenu2"
                                                aria-expanded="false" aria-controls="submenu2" href="#submenu2"><i
                                                        class="fa-solid fa-shop me-2"></i>Store<span class="fa fa-chevron-down ms-auto"></span>
                                        </a>
                                        <ul class="accordion-collapse collapse" data-bs-parent="#accordion_list" id="submenu2"
                                                style="font-family: sans-serif; font-size: 12px;">
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Requisition
                                                                Issue</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Out_station
                                                                Issue</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Bill Postings</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Item Entry</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Supplier
                                                                Entry</a></li>
                                        </ul>
                                </li>
                                <li class="nav-item accordion-item">
                                        <a class="nav-link fw-bolder d-flex" data-bs-toggle="collapse" data-bs-target="#submenu3"
                                                aria-expanded="false" aria-controls="submenu3" href="#submenu3"><i
                                                        class="fa-solid fa-file-alt me-2"></i>Report<span class="fa fa-chevron-down ms-auto"></span>
                                        </a>
                                        <ul class="accordion-collapse collapse" data-bs-parent="#accordion_list" id="submenu3"
                                                style="font-family: sans-serif; font-size: 12px;">
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Vehicle Qty Info</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Date Wise Report</a></li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Vehicle Wise Report</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Iteam Wise Report</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link hover-effect rounded-3 fw-semibold" href="#"
                                                                onclick="setActive(this)">Branch Wise Report</a></li>
                                        </ul>
                                </li>
                        </div>
                </ul>
        </nav>
</div>