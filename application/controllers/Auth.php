<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
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
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('UserModel');
    $this->load->model('UserModelClient');
    $this->load->model('M_Account');
    $this->load->database();
  }
  public function index()
  {
    if ($this->session->userdata('authenticated')) {
      redirect('dashboard');
    } // Jika user sudah login (Session authenticated ditemukan)

    $this->load->view('/_auth/auth_header');
    $this->load->view('/auth/login');
    $this->load->view('/_auth/auth_footer');
  }
  public function admin()
  {
    if ($this->session->userdata('authenticated')) {
      redirect('dashboard');
    } // Jika user sudah login (Session authenticated ditemukan)

 
    $this->load->view('/auth/admin');
    
  }
  function login()
  {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $this->db->get('mikrotik');

    foreach ($query->result() as $row) {
      $ip = $row->mkipadd;
      $mkuser = $row->mkuser;
      $mkpassword = $row->mkpassword;
      $status = $row->status;
    }



    $user = $this->UserModel->post($email);

    if (empty($user)) {
      $this->session->set_flashdata('message', 'email tidak ditemukan');
      redirect('auth');
      echo 'email tidak ditemukan';
    } else {
      $pass = $user->user_password;
      $verif = password_verify($password, $pass);
      if ($verif) {
        $session = array(
          'authenticated' => true,
          'email' => $user->user_email,
          'user_name' => $user->user_name,
          'user_id' => $user->user_id,
          'user_image' => $user->user_image,
          'role' => $user->role_id,
          'mkipadd' => $ip,
          'mkuser' => $mkuser,
          'mkpassword' => $mkpassword,
          'api' => $status
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        $this->session->set_flashdata('message', 'Selamat Datang Kembali! ' . $user->user_name . ' ');
        redirect('dashboard'); // Redirect ke halaman welcome
      } else {
        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata

        redirect('auth/admin'); // Redirect ke halaman login
      }
    }
  }



  function loginclient()
  {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $this->db->get('mikrotik');

    foreach ($query->result() as $row) {
      $ip = $row->mkipadd;
      $mkuser = $row->mkuser;
      $mkpassword = $row->mkpassword;
      $status = $row->status;
    }


    $user = $this->UserModelClient->post($email);

    if (empty($user)) {
      $this->session->set_flashdata('message', 'User tidak ada atau password salah');
      redirect('auth');
      echo 'email tidak ditemukan';
    } else {
      $pass = $user->password;

      if ($password == $pass) {
        $session = array(
          'authenticated' => true,
          'nomor' => $user->nomor,
          'user_name' => $user->nama,
          'user_id' => $user->idp,
          'user_image' => $user->user_image,
          'role' => '4',
          'mkipadd' => $ip,
          'mkuser' => $mkuser,
          'mkpassword' => $mkpassword,
          'api' => $status
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        $this->session->set_flashdata('message', 'Selamat Datang Kembali!' . $user->nama . '');
        redirect('/users'); // Redirect ke halaman welcome
      } else {
        $this->session->set_flashdata('message', 'password salah'); // Buat session flashdata

        redirect('auth'); // Redirect ke halaman login
      }
    }
  }

  function add()
  {


    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Nama', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');



    if ($this->form_validation->run() == FALSE) {
      $errors = $this->form_validation->error_array();
      $this->session->set_flashdata('errors', $errors);
      $this->session->set_flashdata('input', $this->input->post());
      redirect('dashboard/settings');
    } else {
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $roleid = $this->input->post('roleid');
      $pass = password_hash($password, PASSWORD_DEFAULT);
      $data = [
        'user_name' => $username,
        'user_email' => $email,
        'user_password' => $pass,
        'u_aktif' => 0,
        'role_id' => $roleid
      ];
      $input = $this->db->insert('users', $data);

      $token = base64_encode(random_bytes(12));
      $user_token = [
        'email' => $email,
        'tokens' => $token,
        'date_created' => time()

      ];
      $this->db->insert('token', $user_token);
      $this->_sendEmail($token, 'verif');


      if ($input) {
        $this->session->set_flashdata('message', 'Error');
      }
    }
  }



  private function _sendEmail($token, $type)
  {

    $e = $this->db->get('settings');
    foreach ($e->result() as $row) {
      $protocol = $row->protocol;
      $host = $row->host;
      $email = $row->email;
      $pass = $row->pass;
      $port = $row->port;
      $web = $row->web;
    };
    $config = [
      'protocol' => $protocol,
      'smtp_crypto' => 'ssl',
      'smtp_host' =>  $host,
      'smtp_user' =>   $email,
      'smtp_pass' => $pass,
      'smtp_port' => $port,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => '\r\n'
    ];
    $this->load->library('email', $config);

    $this->email->from($email, $web);
    $this->email->to($this->input->post('email'));
    if ($type == 'verif') {
      $this->email->subject("Verifikasi Akun " . $web . "");
      $this->email->message('Klik link ini untuk verifikasi email anda <a href="' . base_url() . 'auth/verifikasi/?token=' .  urlencode($token) . '">Aktivasi</a>');
    } elseif ($type == 'lupapassword') {
      $this->email->subject("Lupa Passwod " . $web . "");
      $this->email->message('Klik link ini untuk mengganti password anda <a href="' . base_url() . 'auth/forgot?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
    }


    if ($this->email->send()) {

      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verifikasi()
  {
   if ($this->session->userdata('authenticated')) {
    redirect('dashboard');
    } //
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('users', ['user_email' => $email])->row_array();
    if ($user) {
      $user_token = $this->db->get_where('token', ['tokens' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          $this->db->set('u_aktif', 1);
          $this->db->where('email', $email);
          $this->db->update('users');
          $this->db->delete('token', ['email' => $email]);
          $this->session->set_flashdata('message', 'Berhasil Teraktifasi!');
        } else {
          $this->db->delete('users', ['user_email' => $email]);
          $this->db->delete('token', ['email' => $email]);
        }
      }
    } else {
      $this->session->set_flashdata('message', 'email tidak ada');
      redirect('auth');
    }
  }

  public function forgot()
  {
   if ($this->session->userdata('authenticated')) {
    redirect('dashboard');
    } //
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('users', ['user_email' => $email])->row_array();
    if ($user) {
      $user_token = $this->db->get_where('token', ['tokens' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          $this->session->set_userdata('reset_email', $email);
          $this->gantiPassword();
        } else {
          $this->db->delete('users', ['user_email' => $email]);
          $this->db->delete('token', ['email' => $email]);
        }
      }
    } else {
      $this->session->set_flashdata('message', 'email tidak ada!');
      redirect('auth');
    }
  }



  public function lupa()
  {
   if ($this->session->userdata('authenticated')) {
    redirect('dashboard');
    } //
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $this->load->view('/_auth/auth_header');
      $this->load->view('/auth/lupa');
      $this->load->view('/_auth/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('users', ['user_email' => $email, 'u_aktif' => 1])->row_array();

      if ($user) {
        $tokens = $this->db->get_where('token', ['email' => $email])->row_array();
        if (empty($tokens)) {


          $token = base64_encode(random_bytes(32));
          $user_token = [
            'email' => $email,
            'tokens' => $token,
            'date_created' => time()
          ];
          $this->db->insert('token', $user_token);
          $this->_sendEmail($token, 'lupapassword');
          $this->session->set_flashdata('message', 'Silahkan cek email anda');
          redirect('auth/lupa');
        } else {
          $this->session->set_flashdata('message', 'Token sudah ada');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', 'Email tidak ada atau tidak teraktifasi');
        redirect('auth');
      }
    }
  }
  public function gantiPassword()
  {
    
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->load->view('/_auth/auth_header');
      $this->load->view('/auth/gantipassword');
      $this->load->view('/_auth/auth_footer');
    } else {

      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('user_password', $password);
      $this->db->where('email', $email);
      $this->db->update('users');
      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', 'Silahkan cek email anda');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login



  }
}
