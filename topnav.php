<nav class="navbar sticky-top">
    <div class="container">
        <div class="col mx-4">
            <a href="pds_form.php?form_section=personal_info">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "personal_info") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Personal Information
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=fam_bg">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "fam_bg") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Family Background
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=educ_bg">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "educ_bg") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Educational Background
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=cs_eligibility">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "cs_eligibility") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Civil Service Eligibility
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=work_exp">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "work_exp") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Work Experience
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=voluntary_work">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "voluntary_work") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Voluntary Work
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=lnd">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "lnd") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Learning & Development
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=other_info">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "other_info") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    Other Information
                </p>
            </a>
        </div>
        <div class="col mx-4">
            <a href="pds_form.php?form_section=ref">
                <p style="text-align:center;
                <?php
                if ($_GET['form_section'] == "ref") {
                    echo "color:#0f1636";
                }
                ?>
                ">
                    References
                </p>
            </a>
        </div>

    </div>
</nav>