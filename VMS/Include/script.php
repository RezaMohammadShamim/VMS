<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Script for active navigation link -->
<script>
    function setActive(link) {
        document.querySelectorAll('.nav .nav-link').forEach((item) => {
            item.classList.remove('active');
        });
        link.classList.add('active');
    }
</script>

<!-- Script for auto-generate the Job Number -->
<script>
    function generateNumber() {
        let dateInput = document.getElementById("date").value;
        if (dateInput) {
            let formattedDate = dateInput.replace(/-/g, ""); // Convert YYYY-MM-DD to YYYYMMDD
            let randomNum = Math.floor(100 + Math.random() * 900); // Generate 3-digit random number
            document.getElementById("autoNumber").value = formattedDate + "-" + randomNum;
        }
    }
</script>

<!-- Script for auto-load Model based on Vehicle Selection -->
<script>
    $(document).ready(function() {
        $("#vehicle_search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/VMS/Config/fetch_vehicle.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.registration_no, // Displayed in suggestions
                                value: item.registration_no, // Set in input
                                model: item.model // Model for auto-fill
                            };
                        }));
                    }
                });
            },
            minLength: 1, // Start suggesting after 1 character

            // Automatically set model field when suggestions appear
            response: function(event, ui) {
                if (ui.content.length > 0) {
                    $("#model").val(ui.content[0].model); // Set model from first suggestion
                }
            },

            // Updates model when hovering or navigating with arrow keys
            focus: function(event, ui) {
                $("#model").val(ui.item.model);
                $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove previous highlight
                return false;
            },

            // Set values when selecting a suggestion
            select: function(event, ui) {
                $("#vehicle_search").val(ui.item.value);
                $("#model").val(ui.item.model);
                return false; // Prevent default action
            },

            open: function() {
                var firstSuggestion = $(".ui-menu .ui-menu-item").first();
                if (firstSuggestion.length) {
                    firstSuggestion.addClass("ui-state-active"); // Auto-hover first item
                    firstSuggestion.trigger("mouseenter"); // Simulate hover
                }
            }
        });

        // Remove first hover effect when pressing arrow keys
        $("#vehicle_search").on("keydown", function(event) {
            if (event.key === "ArrowDown" || event.key === "ArrowUp") {
                $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove highlight from first item
            }
        });

        // Update model when hovering over suggestions
        $(document).on("mouseenter", ".ui-menu .ui-menu-item", function() {
            $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove highlight from other items
            $(this).addClass("ui-state-active"); // Highlight hovered item
            var model = $(this).data("model");
            if (model) {
                $("#model").val(model);
            }
        });

        // Select first suggestion with Enter
        $("#vehicle_search").on("keydown", function(event) {
            if (event.key === "Enter") {
                var firstSuggestion = $(".ui-menu .ui-menu-item.ui-state-active").first();
                if (firstSuggestion.length) {
                    firstSuggestion.trigger("click");
                    return false; // Prevent default Enter action
                }
            }
        });
    });
</script>

<!-- Script for Multiple Mechanic Selection -->
<script>
    $(document).ready(function() {
        let selectedMechanics = [];

        // Search mechanics dynamically
        $('#multiple_mechanic').on('input', function() {
            let searchTerm = $(this).val().trim();

            if (searchTerm.length > 0) {
                $.ajax({
                    url: '/VMS/Config/fetch_mechanics.php',
                    method: 'GET',
                    data: {
                        q: searchTerm
                    },
                    success: function(response) {
                        const mechanics = JSON.parse(response);
                        let dropdownContent = '';

                        mechanics.forEach(function(mechanic) {
                            if (!selectedMechanics.some(m => m.name === mechanic)) {
                                dropdownContent += `
                                    <div class="dropdown-item">
                                        <label>
                                            <input type="checkbox" class="mechanic-checkbox" data-name="${mechanic}"> 
                                            ${mechanic}
                                        </label>
                                    </div>`;
                            }
                        });

                        $('#mechanicDropdown').html(dropdownContent).show();
                    },
                    error: function() {
                        console.log('Error fetching mechanics.');
                    }
                });
            } else {
                $('#mechanicDropdown').hide();
            }
        });

        // Select mechanics from dropdown
        $(document).on('change', '.mechanic-checkbox', function() {
            let mechanic = $(this).data('name');

            if ($(this).prop('checked')) {
                if (!selectedMechanics.some(m => m.name === mechanic)) {
                    selectedMechanics.push({
                        name: mechanic
                    });
                    displaySelectedMechanics();
                }
            } else {
                selectedMechanics = selectedMechanics.filter(m => m.name !== mechanic);
                displaySelectedMechanics();
            }
        });

        // Function to display selected mechanics
        function displaySelectedMechanics() {
            let htmlContent = '';
            let hiddenInputs = '';

            selectedMechanics.forEach(function(mechanic) {
                htmlContent += `
                    <div class="selected-mechanic badge bg-dark p-2 me-1">
                        ${mechanic.name} 
                        <span class="text-danger remove-mechanic" style="cursor:pointer;" data-mechanic="${mechanic.name}">✖</span>
                    </div>`;

                hiddenInputs += `<input type="hidden" name="multiple_mechanic[]" value="${mechanic.name}">`;
            });

            $('#selectedMechanicsList').html(htmlContent);
            $('#hiddenMechanicInputs').html(hiddenInputs);
        }

        // Remove mechanic from selected list
        $(document).on('click', '.remove-mechanic', function() {
            let mechanicToRemove = $(this).data('mechanic');
            selectedMechanics = selectedMechanics.filter(m => m.name !== mechanicToRemove);
            displaySelectedMechanics();
        });

        // Hide dropdown when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('#multiple_mechanic, #mechanicDropdown').length) {
                $('#mechanicDropdown').hide();
            }
        });
    });
</script>


<!-- Script for auto-load Id_no based on Driver_name and auto load driver_name based on driver_id Selection -->
<script>
    $(document).ready(function() {
        // Search by Driver Name
        $("#driver_search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/VMS/Config/fetch_driver.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.driver_name,
                                value: item.driver_name,
                                id: item.driver_id
                            };
                        }));
                    }
                });
            },
            minLength: 1,
            focus: function(event, ui) { // Live update on hover
                $("#driver_id").val(ui.item.id);
            },
            select: function(event, ui) {
                $("#driver_search").val(ui.item.value);
                $("#driver_id").val(ui.item.id);
                return false;
            }
        });

        // Search by Driver ID
        $("#driver_id").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/VMS/Config/fetch_driver_id.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.driver_id,
                                value: item.driver_id,
                                name: item.driver_name
                            };
                        }));
                    }
                });
            },
            minLength: 1,
            focus: function(event, ui) { // Live update on hover
                $("#driver_search").val(ui.item.name);
            },
            select: function(event, ui) {
                $("#driver_id").val(ui.item.value);
                $("#driver_search").val(ui.item.name);
                return false;
            }
        });
    });
</script>

<!--Scripts for message disappear after few moments-->
<script>
    // Wait for the DOM to fully load
    document.addEventListener("DOMContentLoaded", function() {
        let message = document.getElementById("successMessage_1");
        if (message) {
            setTimeout(function() {
                message.style.display = "none"; // Hide after 2 seconds
            }, 2000); // 2000ms = 2 seconds
        }
    });
</script>