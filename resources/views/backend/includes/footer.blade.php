<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<livewire:scripts/>

@stack('js_scripts')

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    setTimeout(function () {
        $('#displayMessage').hide();
    }, 2500);
</script>
</body>
</html>
