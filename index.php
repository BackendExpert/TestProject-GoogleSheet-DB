<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5"> google sheet form</h3>
            <form id="frmSubmit" method="POST">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="" name="name" required="">
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email </label>
                    <input type="email" class="form-control" name="email" required="">
                </div>

                <div class="mb-3">
                    <label for="Mobile" class="form-label">Mobile</label>
                    <input type="tel" class="form-control" id="" name="mobile" required="">
                </div>
                <div class="mb-3">
                    <label for="Message" class="form-label">Message</label>
                    <input type="text" name="message" class="form-control" style="width: 100%; height:200px;">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <div id="msg"></div>
            </form>
        </div>
    </div>
</div>

<script>

    jQuery('#frmSubmit').on('submit', function(e) {
        e.preventDefault();
        jQuery('#msg').html('Please wait...');
        jQuery('#btnSubmit').attr('disabled', true);
        jQuery.ajax({
            url: 'https://script.google.com/macros/s/AKfycbwS1e5fe4O17OOBQ-W-1VWHw1qHMAAGOT1IFtXdUdtEc7Y1NMWIRqZ8Va9uq5OQBCRn/exec',

            type: 'post',
            data: jQuery('#frmSubmit').serialize(),

            success: function(result) {

                resend();

            }
        });
    });

    function resend() {
        jQuery.ajax({
            url: 'process.php',
            type: 'post',

            data: jQuery('#frmSubmit').serialize(),
            success: function(result) {

                jQuery('#frmSubmit')[0].reset();

                jQuery('#msg').html(result);

                jQuery('#btnSubmit').attr('disabled', false);

                //window.location.href='';
            }

        });

    }

</script>