
<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/backend/js/bootstrap.min.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/backend/js/sb-admin-2.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/datatables/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables-responsive/dataTables.responsive.js'); ?>"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-tabela').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>
