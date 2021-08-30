<footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>SonTech</strong></a> &copy;
                            </p>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Soporte</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Ayuda</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacidad</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Letra Chica</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--Final de pagina-->
        </div>
    </div>

    <script src="<?php echo base_url();?>/js/app.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/datatable/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/datatable/DataTables-1.10.25/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
    });
    // Line chart
    </script>

</body>

</html>