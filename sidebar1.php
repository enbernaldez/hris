<div class="col-2 bg d-flex col-xl-2 px-sm-2 px-0">
    <div
        class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
        <div class="input-group custom-rounded mt-3">
            <input type="search" class="form-control text-center mt-5 custom-rounded d-none d-lg-inline"
                placeholder="Search" />
        </div>
        <div class="divider-top d-none d-lg-inline"></div>
        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
            id="menu">
            <li class="nav-item mt-3">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">HOME</span>
                </a>
            </li>

            <!-- Accordion -->
            <li class="sidebar-item d-none d-lg-inline mt-2">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                    aria-expanded="false" aria-controls="pages"><i class="fa-regular fa-file-lines"></i>RSSO
                    V</a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item mt-2">
                        <a href="#" class="sidebar-link ms-5">ORD</a>
                    </li>
                    <li class="sidebar-item mt-2">
                        <a href="#" class="sidebar-link ms-5">CRASD</a>
                    </li>
                    <li class="sidebar-item mt-2">
                        <a href="#" class="sidebar-link ms-5">SOCD</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">ALBAY</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">CAMARINES NORTE</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">CAMARINES SUR</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">CATANDUANES</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">MASBATE</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">SORSOGON</span>
                </a>
            </li>
            <!-- Modal -->
            <div class="divider-bottom d-none d-lg-inline"></div>
            <li class="nav-item mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a href="#" class="nav-link px-sm-0 px-2">
                    <span class="d-none d-lg-inline">LOG IN</span>
                </a>
            </li>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body form">
                            <h1 class="text-dark text-center">LOG IN</h1>
                            <div class="px-3">
                                <label for="InputUsername" class="form-label"></label>
                                <input type="text" class="form-control" id="InputUsername" name="username"
                                    placeholder="username" aria-describedby="usernameHelp" required>
                            </div>
                            <div class="px-3">
                                <label for="InputPassword" class="form-label"></label>
                                <input type="password" class="form-control" id="InputPassword" name="pass"
                                    placeholder="password" required>
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn custom-button mt-5 text-white" id="login">LOG
                                    IN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("InputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>