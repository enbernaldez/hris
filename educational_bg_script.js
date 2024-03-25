        // Define handleNA function
        function handleNA(checkboxId, inputId) {
            const checkbox = document.getElementById(checkboxId);
            const input = document.getElementById(inputId);

            checkbox.addEventListener("change", function() {
                if (this.checked) {
                    input.value ="N/A";
                    input.disabled = true;
                } else {
                    input.value = "";
                    input.disabled = false;
                }
            })
        }

        // Call handleNA function for each pair of checkbox and input
        handleNA("null_from", "p_attendance_fromE");
        handleNA("null_to", "p_attendance_toE");