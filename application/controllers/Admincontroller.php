<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * class admincontroller
 */
class Admincontroller extends CI_Controller {

    /**
     * load users from database and shows them
     */
	public function index()
	{
		$this->load->view('navigation');

		$this->load->model('User_model');
		$result = $this->User_model->getAll();
		$data['result'] = $result;
		
		$this->load->view('index',$data);
	}

    /**
     * handeling get create
     */
	public function create()
	{
		$this->load->view('navigation');
		$this->load->view('create');
	}

    /**
     * saving new user in db, over slim... with curl
     * @return [type] [description]
     */
    public function actionCreate()
    {
       if(!empty($this->input->post())){
            $ch = curl_init();
            $curlConfig = array(
                CURLOPT_URL            => "http://localhost/slim/register",
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS     => array(
                    'first_name'    => $_POST['first_name'],
                    'last_name'     => $_POST['last_name'],
                    'date_of_birth' => $_POST['date_of_birth'],
                    'country'       => $_POST['country'],
                    'username'      => $_POST['username'],
                    'password'      => $_POST['password'],
                    'email'         => $_POST['email'],
                    'ip'            => $_SERVER['REMOTE_ADDR']
                    )
                );
            curl_setopt_array($ch, $curlConfig);
            $result = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($result);
            $data['result'] = $result;
            $this->load->view('navigation');
            $this->load->view('create',$data);
        }
    }

    /**
     * accept data and sendig it to delete view
     * @return [type] [description]
     */
    public function delete()
    {
        $this->load->view('navigation');
        $data['id'] = $this->input->get('id');
        $data['username'] = $this->input->get('username');
        $data['token'] = $this->input->get('token');
        $this->load->view('delete',$data);
    }

    /**
     * [actionDelete description]
     * dalete a user over slim... 
     */
    public function actionDelete(){
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => "http://localhost/slim/remove",
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => array(
                    'password' => $_POST['del_password'],
                    'username' => $_POST['del_username'],
                    'token'    => $_POST['del_token']
                )
        );
        var_dump($_POST);
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);

        if ($result->error) {
            echo $result->error_message;
        } else {
            redirect('admincontroller/index');
        }
        
    }
}