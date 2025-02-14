<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    function setActive(link) {
        document.querySelectorAll('.nav .nav-link').forEach((item) => {
            item.classList.remove('active');
        });
        link.classList.add('active');
    }
</script>

<!--script for auto generate the Job Number-->
<script>
    function generateNumber() {
        let dateInput = document.getElementById("date").value;
        if (dateInput) {
            let formattedDate = dateInput.replace(/-/g, ""); // Convert YYYY - MM - DD to YYYYMMDD
            let randomNum = Math.floor(100 + Math.random() * 900); // Generate 3 - digit random number
            document.getElementById("autoNumber").value = formattedDate + "-" + randomNum;
        }
    }
</script>

<!--Model will be autoload based on vehicle selection-->
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

            // ✅ Automatically set model field when suggestions appear
            response: function(event, ui) {
                if (ui.content.length > 0) {
                    $("#model").val(ui.content[0].model); // Set model from first suggestion
                }
            },

            // 🔹 Model updates when hovering or navigating with arrow keys
            focus: function(event, ui) {
                $("#model").val(ui.item.model);
                $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove previous highlight
                return false;
            },

            // ✅ Set values when selecting a suggestion
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

        // 🔹 Remove first hover effect when pressing arrow keys
        $("#vehicle_search").on("keydown", function(event) {
            if (event.key === "ArrowDown" || event.key === "ArrowUp") {
                $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove highlight from first item
            }
        });

        // 🔹 Model updates when hovering over suggestions
        $(document).on("mouseenter", ".ui-menu .ui-menu-item", function() {
            $(".ui-menu .ui-menu-item").removeClass("ui-state-active"); // Remove highlight from other items
            $(this).addClass("ui-state-active"); // Highlight hovered item
            var model = $(this).data("model");
            if (model) {
                $("#model").val(model);
            }
        });

        // 🔹 Select first suggestion with Enter
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