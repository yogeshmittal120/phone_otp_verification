<form class="form-signin" action="<?= base_url('OTPmanager/verify_otp') ?>" method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="//newcodingera.com/wp-content/uploads/2018/12/Untitled-1.png" alt="" width="100%" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Enter your OTP To verify</h1>
            </div>
            <div class="form-label-group">
                <input type="text" id="otp" name="otp" class="form-control" placeholder="OTP" required>
                <label for="phone-number">Enter OTP</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Verify OTP</button>
            <a href="<?= base_url('OTPmanager') ?>" class="btn btn-lg btn-danger btn-block" type="submit">Back</a>
</form>