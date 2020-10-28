
</div>
</div>

<script src="<?= $config->asset('js/material.min.js') ?>"></script>
<script src="<?= $config->asset('js/jquery/dist/jquery.js') ?>"></script>
<script src="<?= $config->asset('js/toastr/toastr.js') ?>"></script>
<script src="<?= $config->asset('js/app.js') ?>"></script>
<?php
if (isset($_SESSION['message'])) {
    ?>
    <script>
        toastr.<?= $_SESSION['type'] ?>('<?= $_SESSION['message']?>', '<?= strtoupper($_SESSION['type']) ?>')
    </script>
<?php
    $_SESSION['message']=null;
    $_SESSION['type']=null;
}
?>
</body>
</html>
