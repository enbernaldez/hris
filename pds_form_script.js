// ================================= Citizenship =================================
const citizenshipSelect = document.getElementById("citizenship");
const citizenshipBySelect = document.getElementById("citizenship_by");
const citizenshipCountryInput = document.getElementById("citizenship_country");

citizenshipSelect.addEventListener("change", function () {
  if (this.value === "D") {
    // If Dual Citizenship is selected, enable Citizenship By and Citizenship Country
    citizenshipBySelect.disabled = false;
    citizenshipCountryInput.disabled = false;
  } else {
    // Otherwise, disable them
    citizenshipBySelect.disabled = true;
    citizenshipCountryInput.disabled = true;
    // Reset Citizenship By and Citizenship Country values when Citizenship changes
    citizenshipBySelect.value = "";
    citizenshipCountryInput.value = "";
  }
});

// ============ Same as the Residential Address Checkbox ============
function copyValues(source, destination, isChecked, checkbox) {
  // destination.value = isChecked ? source.value : '';
  if (chk_same.checked) {
    destination.value = source.value;
    destination.disabled = true;

    // If source is null, input is disabled and N/A checkbox is checked
    if (source.value == "N/A") {
      checkbox.checked = true;
    }
  } else {
    destination.disabled = false;
  }
}

// Get references to the checkbox and input text elements
const chk_same = document.getElementById("same_add");
const sourceInputs = [
  document.getElementById("radd_houseblocklot"),
  document.getElementById("radd_street"),
  document.getElementById("radd_subdivisionvillage"),
  document.getElementById("radd_barangay"),
  document.getElementById("radd_citymunicipality"),
  document.getElementById("radd_province"),
  document.getElementById("radd_zipcode"),
];
const destinationInputs = [
  document.getElementById("padd_houseblocklot"),
  document.getElementById("padd_street"),
  document.getElementById("padd_subdivisionvillage"),
  document.getElementById("padd_barangay"),
  document.getElementById("padd_citymunicipality"),
  document.getElementById("padd_province"),
  document.getElementById("padd_zipcode"),
];
const naCheckboxes = [
  document.getElementById("null_phbl"),
  document.getElementById("null_pst"),
  document.getElementById("null_psv"),
];

// Add event listener to the checkbox
chk_same.addEventListener("change", function () {
  // Iterate over source and destination inputs, copying values accordingly
  sourceInputs.forEach((source, index) => {
    copyValues(
      source,
      destinationInputs[index],
      chk_same.checked,
      naCheckboxes[index]
    );
  });
});

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
// PERSONAL INFORMATION
setupNullInput("null_middle", "name_middle");
setupNullInput("null_ext", "name_ext");
setupNullInput("null_rhbl", "radd_houseblocklot");
setupNullInput("null_rst", "radd_street");
setupNullInput("null_rsv", "radd_subdivisionvillage");
setupNullInput("null_phbl", "padd_houseblocklot");
setupNullInput("null_pst", "padd_street");
setupNullInput("null_psv", "padd_subdivisionvillage");
setupNullInput("null_telno", "tel_no");
setupNullInput("null_emailadd", "email_add");
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

// ============================ N/A DISABLE ARRAY ============================
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

// // ===================================== CITY/MUNICIPALITY FILTER =====================================
// $(document).ready(function () {
//   $("#radd_province").change(function () {
//     var provinceName = $(this).val();
//     if (provinceName) {
//       $.ajax({
//         type: "POST",
//         url: "fetch_cities.php", // Provide the URL to the server-side script to handle the AJAX request
//         data: { province_name: provinceName },
//         success: function (html) {
//           $("#radd_citymunicipality").html(html);
//         },
//       });
//     } else {
//       $("#radd_citymunicipality").html(
//         '<option value="" disabled selected value>--select--</option>'
//       );
//     }
//   });
// });