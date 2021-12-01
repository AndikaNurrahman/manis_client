<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fetch extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(); // you have missed this line.

        $this->load->database();
    }
    public function index()
    {
        if (isset($_POST['view'])) {
            // $con = mysqli_connect("localhost", "root", "", "notif");
            if ($_POST["view"] != '') {

                $this->db->set('status', '1');
                $this->db->where('status', 0);
                $this->db->update('aktifasi');
            }



            $this->db->order_by('tgl', 'DESC');
     
            $this->db->where('status', 0);
            $result = $this->db->get('aktifasi');
            $output = '';

            if ($result->num_rows() > 0) {

                foreach ($result->result() as $row) {
                    $now = date("Y-m-d H:i:s");
                    $nows = timespan(strtotime($row->tgl), $now);
                    $output = '
                    <div class="dropdown-item">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <div class="media-body">
                            <div class="notification-para">
                            <span class="user-name">' . $row->pesan . '</div>
                            <div class="notification-meta-time">' .  $nows . ' Ago</div>
                        </div>
                    </div>
                </div>  ';
                }
            } else {
                $output = '  <div class="dropdown-item">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <div class="media-body">
                        <div class="notification-para">
                        <span class="user-name">Tidak ada notif</div>
                       </div>
                </div>
            </div>';
            }
            $this->db->where('status', 0);
            $count =  $result = $this->db->get('aktifasi')->num_rows();
            $data = array(
                'notification' => $output,
                'unseen_notification'  => $count
            );

            echo json_encode($data);
        }
    }
}
