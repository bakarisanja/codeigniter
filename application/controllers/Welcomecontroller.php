<?php if ( ! defined('BASEPATH')) exit ('NO direct script access allowed');

/**
 * class Welcomecontroller
 */
class Welcomecontroller extends MY_Controller
{
	public function index()
	{
		$this->data='';
		$this->middle = 'home';
		$this->layout();
	}
}