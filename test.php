<div class="row tilerow mt-3">
                            <?php
                            for ($i = 0; $i < 12; $i++) {
                                ?>
                                <div class="col-4 tile mt-3">
                                    <?php echo ($user_type == 'A') ?
                                        '<a href="pds_form.php?form_section=personal_info&action=view&office=' . $_GET['office'] . '&employee_id=#"
                                            style="text-decoration: none; color: inherit;">' : '';
                                    ?>
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="images/Bercilla.jpg" alt="Anjanette Bercilla" height="80px" width="auto"
                                                style="border-radius:12px">
                                        </div>
                                        <div class="col-8">
                                            <p style="margin: 0"><strong>APRIL CASSANDRA S. REGALARIO</strong></p>
                                            <p style="margin: 0; font-size: 14px;">Chief Statical Specialist V</p>
                                        </div>
                                    </div>
                                    <?php echo ($user_type == 'A') ? '</a>' : '' ?>

                                    <!-- Kebab menu -->
                                    <?php
                                    echo ($user_type == 'A') ?
                                        '<div class="col-1"
                                            style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                            <button class="btn menu-button">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>' : '';
                                    ?>
                                </div>

                                <!-- Context Menu -->
                                <div id="customContextMenu" style="display: none; width: 100px;" <?php echo ($user_type == 'A') ? ' class="admin"' : ''; ?>>
                                    <ul>
                                        <a href="pds_form.php?form_section=personal_info&action=edit&office=' . $_GET['office'] . '&employee_id=#"
                                            style="color: black;">
                                            <li>Edit</li>
                                        </a>
                                        <li data-bs-toggle="modal" data-bs-target="#modal_deleteRecord">Delete</li>
                                    </ul>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal_deleteRecord" tabindex="-1"
                                    aria-labelledby="modal_deleteRecordLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-content-style">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="delete">Delete Records</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex align-items-center">
                                                <div class="col text-center">
                                                    <p class="text-center" style="font-size: 1rem; margin-bottom: 0.5rem;">
                                                        Do you really want to delete the records of
                                                    </p>
                                                    <h5>APRIL CASSANDRA SASA REGALARIO?</h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <span style="margin-right: 40px;"></span>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>