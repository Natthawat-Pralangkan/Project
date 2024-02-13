<!-- <div id="footer">
    <p style="margin: 0;">&copy;COPYRIGHT @ 2023 NUNTABUREE. ALL RIGHTS RESERVED.</p>
</div> -->

<script src="<?php echo $baseUrl ?>/bootstrap-5.3.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submenuToggles = document.querySelectorAll('[data-bs-toggle="collapse"]');

        submenuToggles.forEach(submenuToggle => {
            submenuToggle.addEventListener('click', function() {
                const submenuIcon = this.querySelector('.fas');
                submenuIcon.classList.toggle('fa-chevron-down');
                submenuIcon.classList.toggle('fa-chevron-up');
            });
        });
    });
</script>

</body>

</html>