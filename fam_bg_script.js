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

function setupNullInputArray(checkboxId, inputIds, chkboxIds) {
  const checkbox = document.getElementById(checkboxId);
  const inputs = inputIds.map((id) => document.getElementById(id));
  const checkboxes = chkboxIds.map((id) => document.getElementById(id));

  checkbox.addEventListener("change", function () {
    if (this.checked) {
      inputs.forEach((input) => {
        input.value = "N/A";
        input.disabled = true;
      });
      checkboxes.forEach((chkbx) => {
        chkbx.checked = true;
        chkbx.disabled = true;
      });
    } else {
      inputs.forEach((input) => {
        input.value = "";
        input.disabled = false;
      });
      checkboxes.forEach((chkbx) => {
        chkbx.checked = false;
        chkbx.disabled = false;
      });
    }
  });
}

// ARRAYS
setupNullInputArray(
  "null_spouse",
  [
    "spousename_last",
    "spousename_first",
    "spousename_middle",
    "spousename_extension",
    "occupation",
    "business_name",
    "business_address",
    "spouse_telno",
  ],
  [
    "null_spouse_mi",
    "null_spouse_nameext",
    "null_occupation",
    "null_bus",
    "null_busadd",
    "null_spouse_telno",
  ]
);
setupNullInputArray(
  "null_father",
  [
    "fathername_last",
    "fathername_first",
    "fathername_middle",
    "fathername_extension",
  ],
  ["null_father_mi", "null_father_nameext"]
);
setupNullInputArray(
  "null_mother",
  ["mothername_last", "mothername_first", "mothername_middle"],
  ["null_mother_mi"]
);
setupNullInputArray("null_children", ["child_name", "child_dob"], []);
