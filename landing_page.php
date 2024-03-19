<!DOCTYPE html>

<html>
<?php
// include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
    <meta charset="UTF-8">
    <title>HRIS - Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
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
                <div class="row mt-4">
                    <!-- Column 1: Vision and Mission -->
                    <div class="col-3">
                        <div class="content text-center">
                            <h5>VISION</h5>
                            <p class="fs-6">
                                Solid, responsive, and world-class authority on quality
                                statistics, efficient civil registration, and inclusive
                                identification system.
                            </p>
                            <br><br>
                            <h5>MISSION</h5>
                            <p class="fs-6">
                                Deliver relevant and reliable statistics, efficient civil
                                registration services and inclusive identification system for
                                equitable development towards improved quality of life for
                                all.
                            </p>
                        </div>
                    </div>

                    <!-- Column 3: Core Values -->
                    <div class="col-5 text-center">
                        <div class="content">
                            <h5>CORE VALUES</h5>
                            <h6>INTEGRITY</h6>
                            <p class="fs-6">
                                We observe the highest standards of professional behavior by
                                exemplifying impartiality and independence in everything we
                                do. We stand firm against undue influence - ensuring that
                                integrity cuts across not only in the statistics we deliver,
                                but more importantly, in our people.
                            </p>
                            <h6>TRANSPARENCY</h6>
                            <p class="fs-6">
                                We ensure transparency in all interactions and transactions to
                                build and nurture trust inside and outside the PSA. We strive
                                for clear communication, shared knowledge, and informed,
                                all-inclusive decisions for cultivating mutual respect at all
                                levels of the organization.
                            </p>
                            <h6>ADAPTABILITY</h6>
                            <p class="fs-6">
                                We respond to change with a positive attitude and a
                                willingness to learn new ways to deliver our mandate. We stay
                                on top of technological advancements and never give up in the
                                face of challenges, instead finding them as opportunities to
                                discover and gain insights to further our services to the
                                public.
                            </p>
                        </div>
                    </div>
                    <!-- Column 2: Quality Policy -->
                    <div class="col-4 text-center">
                        <div class="content">
                            <h5>QUALITY POLICY</h5>
                            <p class="fs-6 me-3">
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
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>