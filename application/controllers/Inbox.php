<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->database();
    }
    function send()
    {


        if (isset($_POST['message'])) {


            $id = $_POST['id'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $token = $this->db->get_where('settings', ['apiwa'])->row_array();
            $data = array(
                'message_id' => $id,
                'phone' => $phone,
                'message' => $message,
                'date' => date('m'),
            );
            $input = $this->db->insert('inbox', $data);
            Apiwa($phone, $message, $token);
            if ($input) {
                echo nuLL;
            } else {
                echo "Error: ";
            }
        }
    }
}
