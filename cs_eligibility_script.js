function addRow() {
  // Clone the input-row element
  var newRow = document.querySelector(".row-row").cloneNode(true);

  // Clear input values in the cloned row
  newRow.querySelectorAll("input").forEach((input) => {
    input.value = "";
  });

  // Append the cloned row to the container
  document.querySelector(".row-container").appendChild(newRow);

  // Change the N/A checkbox to a delete button
  var checkbox = newRow.querySelector(".form-check-input");
  checkbox.checked = false; // Uncheck the checkbox
  checkbox.id = ""; // Remove id to avoid duplication
  checkbox.removeAttribute("onclick"); // Remove onclick event
  checkbox.setAttribute("type", "button"); // Change type to button
  checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
  checkbox.nextElementSibling.textContent = "Delete"; // Change label text
}

function checkNA(checkbox) {
  var inputs = document.querySelectorAll(".group-na");
  var cse_addrow = document.getElementById("cse_addrow");
  if (checkbox.checked) {
    inputs.forEach(function (input) {
      input.value = "N/A";
      input.disabled = true;
      cse_addrow.disabled = true;
    });
  } else {
    inputs.forEach(function (input) {
      input.value = "";
      input.disabled = false;
      cse_addrow.disabled = false;
    });
  }
}

function deleteRow(button) {
  var row = button.closest(".row-row");
  row.remove();
}
