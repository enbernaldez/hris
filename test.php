
                        <!-- test for employee tiles if there's no employees yet -->
                        <div class="row tilerow mt-3">
                        <?php                        
                        for ($i = 0; $i < 12; $i++) {
                            ?>
                            <div class="col-4 tile mt-3">
                                <a href="pds_form.php?form_section=personal_info&employee_id=#&action=view"
                                    style="text-decoration: none; color: inherit;">
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
                                </a>
                                <!-- Kebab menu -->
                                <div class="col-1"
                                    style="position: absolute; z-index: 10; margin-left: 393px; margin-top: -86px">
                                    <button class="btn menu-button">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Context Menu -->
                            <div id="customContextMenu" style="display: none; width: 100px;">
                                <ul>
                                    <a href="pds_form.php?form_section=personal_info&employee_id=#&action=edit"
                                        style="color: black;">
                                        <li>Edit</li>
                                    </a>
                                    <li data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</li>
                                </ul>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div style="height: 300px; weight: 342px" class="modal-content">
                                        <div class="modal-header d-flex justify-content-end align-items-center">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                style="margin-top: 5px; margin-right: 10px;"></button>
                                        </div>
                                        <div class="modal-header d-flex justify-content-center align-items-center">
                                            <h3 class="modal-title" id="deleteModalLabel"><strong>Are you sure?</strong></h3>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <h5 style="text-align: center; font-weight: normal;">Do you really want to delete
                                                these records?</h5>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-secondary btn-sm me-1" data-bs-dismiss="modal"
                                                style="height: 38px; width: 88px; border-radius: 8px;">Cancel</button>
                                            <span style="margin-right: 40px;"></span>
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                                style="height: 38px; width: 88px; background-color: #F90000; border-radius: 8px;">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                        <div class="mt-5">
                            <a href="pds_form.php?form_section=personal_info&action=add">
                                <button type="button" class="btn btn-primary"
                                    style="margin-left: 10px; background-color: #283872; border: none;">
                                    Add Employee
                                </button>
                            </a>
                            <?php
                            echo '
                                <a href="organizational_chart.php?scope=' . $_GET['scope'] . '&office=' . $_GET['office'] . '" style="margin-right: 10px; float: right; color: #283872">
                                    View organizational chart
                                </a>
                            ';
                            ?>
                        </div>