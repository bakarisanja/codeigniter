<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * class admincontroller
 */
class Admincontroller extends MY_Controller {

    /**
     * load users from database and shows them
     */
	public function index()
	{
        $this->load->model('User_model');
        $result = $this->User_model->getAll();
		$this->data['result'] = $result;
        $this->middle = 'home';
        $this->layout();
	}

    /**
     * handeling get create
     */
	public function create()
	{
        $this->middle = 'create';
        $this->layout();
	}

    /**
     * saving new user in db, over slim... with curl
     * @return [type] [description]
     */
    public function actionCreate()
    { 
        if(!empty($_POST)){
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
        header('Content-Type: application/json; charset=utf-8');
        echo $result;
        exit();
        } 
    }

    /**
     * accept data and sendig it to delete view
     * @return [type] [description]
     */
    public function delete()
    {
        $this->data['id'] = $this->input->get('id');
        $this->data['username'] = $this->input->get('username');
        $this->data['token'] = $this->input->get('token');
        $this->middle = 'delete';
        $this->layout();
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
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if ($result->error) {
            $this->data['result'] = $result->error_message;

            $this->data['id'] = $_POST['del_id'];
            $this->data['token'] = $_POST['del_token'];
            $this->data['password'] = $_POST['del_password'];
            $this->data['username'] = $_POST['del_username'];

            $this->middle = 'delete';
            $this->layout();
        } else {
            redirect('admincontroller/index');
        }
        
    }
}