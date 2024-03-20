// ======================= N/A disable =======================
function setupNullInput(checkboxId, inputId) {
  const checkbox = document.getElementById(checkboxId);
  const input = document.getElementById(inputId);

  checkbox.addEventListener("change", function () {
    if (this.checked) {
      input.value = "N/A";
      input.disabled = true;
    } else {
      input.value = "";
      input.disabled = false;
    }
  });
}

// Call the function for each pair of checkbox and input
// FAMILY BACKGROUND
setupNullInput("null_spouse_mi", "spousename_middle");
setupNullInput("null_spouse_nameext", "spousename_extension");
setupNullInput("null_occupation", "occupation");
setupNullInput("null_bus", "business_name");
setupNullInput("null_busadd", "business_address");
setupNullInput("null_spouse_telno", "spouse_telno");
setupNullInput("null_father_mi", "fathername_middle");
setupNullInput("null_father_nameext", "fathername_extension");
setupNullInput("null_mother_mi", "mothername_middle");