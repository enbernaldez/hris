
<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file, heading, and content parameters are set
    if (isset($_POST['file']) && isset($_POST['headingId']) && isset($_POST['heading']) && isset($_POST['contentId']) && isset($_POST['content'])) {
        // Get file, heading, and content from POST parameters
        $file = $_POST['file'];
        $headingId = $_POST['headingId'];
        $heading = $_POST['heading'];
        $contentId = $_POST['contentId'];
        $content = $_POST['content'];

        // Construct the HTML content to be written to the file
        $htmlContent = '<h5 contenteditable="true" id="' . $headingId . '">' . $heading . '</h5><p class="fs-6" contenteditable="true" id="' . $contentId . '">' . htmlspecialchars($content) . '</p>';

        // Write the HTML content to the file
        if (file_put_contents($file, $htmlContent) !== false) {
            // Return success response
            echo json_encode(array('status' => 'success'));
        } else {
            // Return error response if file writing fails
            echo json_encode(array('status' => 'error', 'message' => 'Failed to write to file.'));
        }
    } else {
        // Return error response if parameters are missing
        echo json_encode(array('status' => 'error', 'message' => 'File, heading, and content parameters are required.'));
    }
} else {
    // Return error response for invalid request method
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}

