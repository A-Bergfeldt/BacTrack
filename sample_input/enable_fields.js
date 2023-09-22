function enable_field() {
  var antibiotic1 = document.getElementById("antibiotic1");
  var antibiotic2 = document.getElementById("antibiotic2");
  var antibiotic3 = document.getElementById("antibiotic3");

  // Check if Antibiotic 1 is filled in
  if (antibiotic1.value !== "") {
      // Enable Antibiotic 2
      antibiotic2.disabled = false;
  } else {
      // Antibiotic 1 is not filled, disable Antibiotic 2 and 3
      antibiotic2.disabled = true;
      antibiotic3.disabled = true;
  }

  // Check if Antibiotic 2 is filled in
  if (antibiotic2.value !== "") {
      // Enable Antibiotic 3
      antibiotic3.disabled = false;
  } else {
      // Antibiotic 2 is not filled, disable Antibiotic 3
      antibiotic3.disabled = true;
  }
}