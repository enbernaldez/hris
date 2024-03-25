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
setupNullInputRow("null_work_exp", [
  "we_from",
  "we_to",
  "we_position_title",
  "we_dept_agency",
  "we_mo_salary",
  "we_sg",
  "we_appointment_status",
  "we_govt_service",
  "we_addrow",
]);
