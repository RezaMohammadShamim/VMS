<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setActive(link) {
        document.querySelectorAll('.nav .nav-link').forEach((item) => {
            item.classList.remove('active');
        });
        link.classList.add('active');
    }
</script>