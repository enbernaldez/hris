// ======================= N/A disable =======================
function setupNullInput(checkboxId, inputIds) {
  const checkbox = document.getElementById(checkboxId);
  const inputs = inputIds.map((id) => document.getElementById(id));

  checkbox.addEventListener("change", function () {
    if (this.checked) {
      inputs.forEach((input) => {
        input.value = "N/A";
        input.disabled = true;
      });
    } else {
      inputs.forEach((input) => {
        input.value = "";
        input.disabled = false;
      });
    }
  });
}

// Call the function for each pair of checkbox and input
// FAMILY BACKGROUND
setupNullInput("null_spouse", ["spousename_last", "spousename_first", "spousename_middle", "spousename_extension", "occupation", "business_name", "business_address", "spouse_telno"]);
setupNullInput("null_father", ["fathername_last", "fathername_first", "fathername_middle", "fathername_extension"]);
setupNullInput("null_mother", ["mothername_last", "mothername_first", "mothername_middle"]);
setupNullInput("null_children", ["child_name", "child_dob"]);
