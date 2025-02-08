<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setActive(link) {
        document.querySelectorAll('.nav .nav-link').forEach((item) => {
            item.classList.remove('active');
        });
        link.classList.add('active');
    }
</script>
<script>
    function generateNumber() {
        let dateInput = document.getElementById("date").value;
        if (dateInput) {
            let formattedDate = dateInput.replace(/-/g, ""); // Convert YYYY - MM - DD to YYYYMMDD
            let randomNum = Math.floor(100 + Math.random() * 900); // Generate 3 - digit random number
            document.getElementById("autoNumber").value = formattedDate + "-" + randomNum;
        }
    }
</script>