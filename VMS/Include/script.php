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

        // Event for typing in the mechanic search field
        $("#multiple_mechanic").on("keyup", function() {
            let query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "/VMS/Config/fetch_mechanics.php",
                    type: "GET",
                    data: {
                        q: query
                    },
                    dataType: "json",
                    success: function(data) {
                        let dropdown = $("#mechanicDropdown");
                        dropdown.empty().show();

                        // Display mechanics not already selected
                        data.forEach(function(item) {
                            if (!selectedMechanics.some(m => m.id === item.id)) {
                                dropdown.append(
                                    `<label>
                                        <input type="checkbox" value="${item.id}" data-name="${item.text}"> ${item.text}
                                    </label><br>`
                                );
                            }
                        });
                    }
                });
            } else {
                $("#mechanicDropdown").hide();
            }
        });

        // Event for handling mechanic selection
        $(document).on("change", "#mechanicDropdown input[type='checkbox']", function() {
            let mechanicId = $(this).val();
            let mechanicName = $(this).data("name");

            if (this.checked) {
                selectedMechanics.push({
                    id: mechanicId,
                    name: mechanicName
                });
                updateSelectedList(); // Update list of selected mechanics
                $("#multiple_mechanic").val(""); // Clear input field after selection
            }
        });

        // Function to update the list of selected mechanics
        function updateSelectedList() {
            let listContainer = $("#selectedMechanicsList");
            listContainer.empty();

            selectedMechanics.forEach((mechanic, index) => {
                listContainer.append(`
                    <div class="selected-mechanic">
                        ${mechanic.name} <button class="remove-mechanic" data-index="${index}">❌</button>
                    </div>
                `);
            });
        }

        // Event for removing a selected mechanic from the list
        $(document).on("click", ".remove-mechanic", function() {
            let index = $(this).data("index");
            selectedMechanics.splice(index, 1); // Remove from list
            updateSelectedList(); // Re-render selected mechanics list
        });

        // Close mechanic dropdown when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest(".input-group").length) {
                $("#mechanicDropdown").hide();
            }
        });

        // Prevent dropdown from closing when clicking inside the dropdown
        $(document).on("click", "#mechanicDropdown", function(e) {
            e.stopPropagation();
        });
    });
</script>