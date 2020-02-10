<form class="form-signin" action="<?= base_url('MainWebsite/send_otp_sms') ?>" method="POST">
            <div class="text-center mb-4">
                <img class="mb-4" src="//newcodingera.com/wp-content/uploads/2018/12/Untitled-1.png" alt="" width="100%" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Codeigniter OTP Demo</h1>
            </div>
            <div class="form-label-group">
                <input type="text" id="phone-number" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                <label for="phone-number">Enter Phone Number. Ex +911010101010</label>
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Send OTP</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
        </form>