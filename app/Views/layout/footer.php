<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">Iqwana Indah Puspita</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?= base_url('assets/js/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/js/app.min.js') ?>"></script>
<!-- Pace (Loading animation) -->
<script src="<?= base_url('assets/js/pace.min.js') ?>"></script>

<!-- Render Custom Script per page (jika ada) -->
<?= $this->renderSection('script') ?>

</body>
</html>