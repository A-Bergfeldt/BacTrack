
function disable_options(selectElement) {
    // Get the selected value
    var selectedValue = selectElement.value;

    // Get all dropdowns with the class "antibiotic-dropdown"
    var dropdowns = document.getElementsByClassName("antibiotic-dropdown");

    // Loop through all the dropdowns
    for (var i = 0; i < dropdowns.length; i++) {
        // Skip the current dropdown
        if (dropdowns[i] === selectElement) continue;

        // Disable the selected option in other dropdowns
        var options = dropdowns[i].getElementsByTagName("option");
        for (var j = 0; j < options.length; j++) {
            if (options[j].value === selectedValue) {
                options[j].setAttribute("disabled", "disabled");
            }
        }
    }
}

