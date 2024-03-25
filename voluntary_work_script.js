function setupNullInputRow(checkboxId, inputIds) {
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

// ARRAYS
setupNullInputRow("null_vw", [
  "vw_nameaddress",
  "vw_from",
  "vw_to",
  "vw_hrs",
  "vw_position",
  "vw_addrow",
]);
