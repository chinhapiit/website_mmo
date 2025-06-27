
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2024 © TEAM API IT </p>
            </div>
        </div>
    </div>
   
</footer>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert Library -->
  <script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('1c8704a870f8fbd34577', {
      cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        Swal.fire({
            title: "Thành công",
            icon: "success",
            text: `${JSON.stringify(data, null, 2)}`,
            customClass: {
                    confirmButton: "btn btn-primary"
                    }
        });
});
</script>