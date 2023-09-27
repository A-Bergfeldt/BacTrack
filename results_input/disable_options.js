
function disable_options(selectElement) {
  // Get the selected value
  var selectedValue = selectElement.value;

  // Get all dropdowns with the class "antibiotic-dropdown"
  var dropdowns = document.getElementsByClassName("antibiotic-dropdown");

  var allSelectedValues = [];
  for (var i = 0; i < dropdowns.length; i++) {
    allSelectedValues[i] = dropdowns[i].value;
  }

  // Loop through all the dropdowns
  for (var i = 0; i < dropdowns.length; i++) {
    // Enable all options
    var options = dropdowns[i].getElementsByTagName("option");
    for (var j = 1; j < options.length; j++) {
      options[j].removeAttribute("disabled");
    }

    // Disable the selected option in other dropdowns
    for (var j = 0; j < options.length; j++) {
      if (allSelectedValues.includes(options[j].value) && options[j].value != dropdowns[i].value) {
        options[j].setAttribute("disabled", "disabled");
      }
    }
  }
}

