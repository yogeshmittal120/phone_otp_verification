<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once FCPATH . '/vendor/autoload.php';
use Twilio\Rest\Client;
class MainWebsite extends CI_Controller {
	private $sid;
    private $token;
    public function __construct()
    {
		
		parent::__construct();
        $this->sid = "YOUR_SID_HERE";
        $this->token = "YOUR_TOKEN_HERE";
    }

	private function common_view($views = [], $vars = [])
	{
		/* you can call model here */
		
			$vars['CURRENT_METHOD'] = $this->router->fetch_method();
			$this->load->view('frontend/layout/header.php', $vars);
			
			if (is_array($views)) {
				foreach ($views as $view) {
					$this->load->view('frontend/' . $view, $vars);
				}
			} else {
				$this->load->view('frontend/' . $views, $vars);
			}
			$this->load->view('frontend/layout/footer.php', $vars);
	}	
	
	public function index()
	{
		$this->common_view('index');
	}
	public function verfiy()
	{
		$this->common_view('verifyotp');
	}
	public function send_otp_sms()
    {
        $otp = $this->generate_otp();
        // For demo I'm using session to store the OTP,  you might want to store it in the DB
        $_SESSION['user_otp'] = $otp;
        // Reciever's phone number
        $phone_number = $this->input->post('phone');
        // Create Twilio client
        $client = new Client($this->sid, $this->token);
        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
            // the number you'd like to send the message to
            $phone_number,
            array(
                // A Twilio phone number for testing purpose
                'from' => '+17207105103',
                // the body of the text message you'd like to send
                'body' => 'Here is your OTP! ' . $otp
            )
        );
        // Redirect to the verfication page
        redirect(base_url('MainWebsite/verfiy'));
	}
	public function verify_otp()
    {
        // Get the otp value 
        $user_otp = $this->input->post('otp');
        if ($user_otp == $_SESSION['user_otp']) {
            echo " OTP is valid...";
        } else {
            echo "This OTP is invalid Or expired!!!";
        }
	}
	private function generate_otp(int $length = 4)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        return $otp;
    }

}
