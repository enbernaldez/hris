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
setupNullInputRow("null_lnd", [
  "lnd_title",
  "lnd_from",
  "lnd_to",
  "lnd_hours",
  "lnd_type",
  "lnd_conducted",
]);
