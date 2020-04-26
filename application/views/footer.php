</section>

<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-migrate-1.2.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui-1.10.3.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/modernizr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pace.min.js') ?>"></script>
<script src="<?= base_url('assets/js/retina.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.cookies.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.autogrow-textarea.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.mousewheel.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.tagsinput.min.js') ?>"></script>
<script src="<?= base_url('assets/js/toggles.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/colorpicker.js') ?>"></script>
<script src="<?= base_url('assets/js/dropzone.min.js') ?>"></script>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/datatables-demo.js') ?>"></script>

<script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2.js') ?>"></script>
<script src="<?= base_url('assets/js/sweetalert-dev.js') ?>"></script>

<script src="<?= base_url('assets/js/prova_candidato.js') ?>"></script>

<!-- SCRIPT PARA MENSAGEM DE CADASTRO - ALTERAR - DELETE -->
<script>
    <?php if (isset($_GET['candidato_cadastrar'])) : ?>
        swal("Cadastrado!", "Candidato foi cadastrado com sucesso.", "success");
    <?php endif; ?>
    <?php if (isset($_GET['candidato_editar'])) : ?>
        swal("Alterado!", "Candidato foi alterado com sucesso.", "success");
    <?php endif; ?>
    <?php if (isset($_GET['candidato_deletar'])) : ?>
        swal("Deletado!", "Candidato deletado com sucesso.", "success");
    <?php endif; ?>
</script>


</body>

</html>