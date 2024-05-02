<!DOCTYPE html>
<html>
<?php include_once "db_conn.php"; ?>

<head>
    <meta charset="UTF-8">
    <title>HRIS - Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="hris_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="local_style.css">
</head>

<body>
    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">

            <?php
            include_once "sidebar1.php";
            ?>
            <!-- Logo and content -->
            <div class="col-10">
                <img src="images/PSA banner.jpg" alt="PSA Banner" height="auto" class="img-fluid">
                <div class="row mt-5">
                    <!-- Column 1: Vision and Mission -->
                    <div class="col-3 my-auto">
                        <div class="content text-center">
                            <?php include_once "landingpage_contents/vision_content.html"; ?>
                            <!-- <h5 contenteditable="true" id="visionHeading">VISION</h5>
                            <p class="fs-6" contenteditable="true" id="visionContent">
                                Solid, responsive, and world-class authority on quality
                                statistics, efficient civil registration, and inclusive
                                identification system.
                            </p> -->
                            <br><br>
                            <?php include_once "landingpage_contents/mission_content.html"; ?>
                            <!-- <h5 contenteditable="true" id="missionHeading">MISSION</h5>
                            <p class="fs-6" contenteditable="true" id="missionContent">
                                Deliver relevant and reliable statistics, efficient civil
                                registration services and inclusive identification system for
                                equitable development towards improved quality of life for
                                all.
                            </p> -->
                        </div>
                    </div>

                    <!-- Column 3: Core Values -->
                    <div class="col-4 text-center my-auto">
                        <div class="content">
                            <h5 id="corevaluesHeading">CORE VALUES</h5>
                            <br>
                            <?php include_once "landingpage_contents/firstCorevalues_content.html"; ?>
                            <br>
                            <?php include_once "landingpage_contents/secondCorevalues_content.html"; ?>
                            <br>
                            <?php include_once "landingpage_contents/thirdCorevalues_content.html"; ?>
                            <!-- <h5 contenteditable="true">CORE VALUES</h5>
                            <div class="core-values">
                                <div class="core-value">
                                    <h6 contenteditable="true">INTEGRITY</h6>
                                    <p class="fs-6" contenteditable="true">
                                        We observe the highest standards of professional behavior by
                                        exemplifying impartiality and independence in everything we
                                        do. We stand firm against undue influence - ensuring that
                                        integrity cuts across not only in the statistics we deliver,
                                        but more importantly, in our people.
                                    </p>
                                </div>
                                <div class="core-value">
                                    <h6 contenteditable="true">TRANSPARENCY</h6>
                                    <p class="fs-6" contenteditable="true">
                                        We ensure transparency in all interactions and transactions to
                                        build and nurture trust inside and outside the PSA. We strive
                                        for clear communication, shared knowledge, and informed,
                                        all-inclusive decisions for cultivating mutual respect at all
                                        levels of the organization.
                                    </p>
                                </div>
                                <div class="core-value">
                                    <h6 contenteditable="true">ADAPTABILITY</h6>
                                    <p class="fs-6" contenteditable="true">
                                        We respond to change with a positive attitude and a
                                        willingness to learn new ways to deliver our mandate. We stay
                                        on top of technological advancements and never give up in the
                                        face of challenges, instead finding them as opportunities to
                                        discover and gain insights to further our services to the
                                        public.
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Column 4: Quality Policy -->
                    <div class="col-5 text-center my-auto">
                        <div class="content">
                            <?php include_once "landingpage_contents/qualitypolicy_content.html"; ?>
                            <!-- <h5 contenteditable="true">QUALITY POLICY</h5>
                            <p class="fs-6 me-3" contenteditable="true">
                                We, the Philippine Statistics Authority, commit to deliver
                                relevant and reliable statistics, efficient civil registration
                                services and inclusive identification system to our clients
                                and stakeholders. We adhere to the UN Fundamental Principles
                                of Official Statistics in the production of quality
                                general-purpose statistics. We commit to deliver efficient
                                civil registration services and inclusive identification
                                system in accordance with the laws, rules and regulations, and
                                other statutory requirements. We endeavor to live by the
                                established core values and corporate personality of PSA and
                                adopt the appropriate technology in the development of our
                                products and delivery of services to ensure customer
                                satisfaction. We commit to continually improve the
                                effectiveness of our Quality Management System towards
                                equitable development for improved quality of life for all.
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $user_type = $_SESSION['user_type'] ?? 'V';
    echo ($user_type == 'A') ?
        '<div style="position: absolute; z-index: 10; bottom: 50px; right: 50px;">
            <button type="button" class="btn btn-primary" onclick="editText(this)">Edit</button>
        </div>' : '';
    ?>

    <script>
        // Get the elements by their IDs
        function addInputListener(headingId, contentId, file) {
            var heading = document.getElementById(headingId);
            var content = document.getElementById(contentId);

            heading.addEventListener('input', function () {
                updateContent(file, headingId, heading.innerText, contentId, content.innerText);
            });

            content.addEventListener('input', function () {
                updateContent(file, headingId, heading.innerText, contentId, content.innerText);
            });
        }

        // Call the function for each pair of heading and content elements
        addInputListener('visionHeading', 'visionContent', 'landingpage_contents/vision_content.html');
        addInputListener('missionHeading', 'missionContent', 'landingpage_contents/mission_content.html');
        addInputListener('qualitypolicyHeading', 'qualitypolicyContent', 'landingpage_contents/qualitypolicy_content.html');
        addInputListener('firstCorevaluesHeading', 'firstCorevaluesContent', 'landingpage_contents/firstCorevalues_content.html');
        addInputListener('secondCorevaluesHeading', 'secondCorevaluesContent', 'landingpage_contents/secondCorevalues_content.html');
        addInputListener('thirdCorevaluesHeading', 'thirdCorevaluesContent', 'landingpage_contents/thirdCorevalues_content.html');

        // Function to update content in HTML file via AJAX
        function updateContent(file, headingId, heading, contentId, content) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_content.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            console.log('Content updated successfully.');
                        } else {
                            console.error('Error updating content: ' + response.message);
                        }
                    } else {
                        console.error('Error updating content: ' + xhr.statusText);
                    }
                }
            };
            xhr.send('file=' + encodeURIComponent(file) + '&headingId=' + encodeURIComponent(headingId) + '&heading=' + encodeURIComponent(heading) + '&contentId=' + encodeURIComponent(contentId) + '&content=' + encodeURIComponent(content));
        }

        function editText(button) {
            if (button.textContent == 'Edit') {
                // Get all <p> elements on the page
                var paragraphs = document.querySelectorAll('p');

                // Loop through each <p> element
                paragraphs.forEach(paragraph => {
                    // Enable editing mode
                    paragraph.setAttribute("contenteditable", "true");
                    button.textContent = 'Done'; // Update button text
                });
            } else if (button.textContent == 'Done') {
                // Get all <p> elements on the page
                var paragraphs = document.querySelectorAll('p');

                // Loop through each <p> element
                paragraphs.forEach(paragraph => {
                    // Disable editing mode
                    paragraph.setAttribute("contenteditable", "false");
                    button.textContent = 'Edit'; // Update button text
                });
            }
        }

    </script>

</body>

</html>