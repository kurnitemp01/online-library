</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal search filter -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter By</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>client/search/advanced" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-2 col-form-label">Book Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Book Name" name="book_name">
                                </div>
                                <label for="staticEmail" class="col-md-2 col-form-label">Author Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Author Name" name="author">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-2 col-form-label">Book Type</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Book Type" name="book_type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-2 col-form-label">Publish Start</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" placeholder="Publish Start" value="2023" step="1" min="1950" max="2023" name="year_start">
                                </div>
                                <label for="staticEmail" class="col-md-2 col-form-label">Publish End</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" placeholder="Publidh End"  value="2023" step="1" min="1950" max="2023" name="year_end">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-md-2 col-form-label">Book Page</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Book Page" name="page">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                <form>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    <script src="<?= base_url() ?>assets/js/custom-js.js"></script>

    <script>
        const base_url = "<?= base_url() ?>";
        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 450,
            margin: 20,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1200: {
                    items: 5
                },
                1600: {
                    items: 7
                }
            }
        });
    </script>

</body>

</html>