dateTypeArray = ["lnd_from", "lnd_from"];
numberTypeArray = ["lnd_hrs"];

function setupNullInputRow(checkboxId, inputIds) {
  const checkbox = document.getElementById(checkboxId);
  const inputs = inputIds.map((id) => document.getElementById(id));

  checkbox.addEventListener("change", function () {
    if (this.checked) {
      inputs.forEach((input) => {
        input.type = "text";
        input.value = "N/A";
        input.disabled = true;
      });
    } else {
      inputs.forEach((input) => {
        var date = false;
        var number = false;

        for (var i = 0; i < dateTypeArray.length; i++) {
          if (inputId === numberTypeArray[i]) {
            date = true;
            break;
          }
        }
        for (var i = 0; i < numberTypeArray.length; i++) {
          if (inputId === numberTypeArray[i]) {
            number = true;
            break;
          }
        }

        date ? (input.type = "date") : number ? (input.type = "number") : null;

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
  "lnd_hrs",
  "lnd_type",
  "lnd_conducted",
  "lnd_addrow",
]);
