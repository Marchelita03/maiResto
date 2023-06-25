            <!-- Footer -->
            <footer class="sticky-footer bg-white fixed-bottom">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MaiResto 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

    <!-- Data Table -->
    <script src="<?php echo base_url() ?>/assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable();
        } );
        
        $(document).ready(function() {
            let table = $('#datatables2').DataTable({
                "columnDefs": [
                    {"searchable": false, "targets": 0},
                    {"searchable": false, "targets": 3},
                    {"searchable": false, "targets": 4},
                    {"searchable": false, "targets": 5},
                    {"searchable": false, "targets": 6},
                ]
            });
            table.on('search.dt', function () {
                const searchDt = table.column(5, {order: 'index', search: 'applied'}).data()
                let total = 0
                for (let i = 0; i < searchDt.length; i++) {
                    total += Number((searchDt[i].replace('Rp. ', '')).replace('.',''))
                }
                const IDRupiah = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                });
                const dtKeseluruhan = document.querySelector('[data-keseluruhan]')
                if (dtKeseluruhan) dtKeseluruhan.innerHTML = IDRupiah.format(total)
                return
            })

            /*
            //Search
            var dataTable = $('#user_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"<?php echo base_url() . 'admin/dataPenjualan/search'; ?>",
                type:"POST"
            },
            "columnDefs":[
             {
                 "targets":[0, 3, 4],
                 "orderable":false,
             },
           ], *
           //End
           */

        } ); 
    </script>

</body>

</html>