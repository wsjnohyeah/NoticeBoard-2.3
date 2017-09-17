<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Danmaku extends CI_Controller {
	private $channel;

	function __construct() {
		parent::__construct();
		$this->load->model('danmaku_m');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->channel = new SaeChannel();
	}
	
	private function get_token($length){
   		$str = null;
   		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
   		$max = strlen($strPol)-1;
   		for($i = 0; $i < $length; $i++){
    		$str.=$strPol[rand(0,$max)];
   		}
		$this->session->set_userdata('token', $str);
   		return base64_encode($str);
   	}
	
	/**
	 * 用户发送弹幕页面。
	 */
	 function index(){
		secondary_site_redirect($this->uri->segment(1), $this->uri->segment(2), $this->uri->segment(3), base_url());
		$data['token'] = $this->get_token(10);
		$view = ($this->session->userdata('logged') ? 'danmaku' : 'unlogged') . '/danmaku';
		$this->load->view($view,$data);
	}

	/**
	 * 显示弹幕页。
	 */
	function display() {
		secondary_site_redirect($this->uri->segment(1), $this->uri->segment(2), $this->uri->segment(3), base_url());
		$data['url'] = $this->channel->createChannel('display', 18000); //5 hours
		$this->load->view('danmaku/display', $data);
	}

	/**
	 * 发送弹幕。
	 */
	function send() {
		$color = $this->input->post('color');
		if (!isset($color)) {
			$color = '#ffffff';
		}
		$text = $this->input->post('text');
		$token = $this->input->post('token');
		if ($text != '' && $this->session->userdata('token') == $token) {
			$this->session->unset_userdata('token');
			$data = array(
				'text' => $text,
				'color' => $color
			);
			$msg = json_encode($data);
			$this->channel->sendMessage('display', $msg);
		}
		redirect('danmaku');
	}
	
	/**
	 * 弹幕刷屏机打开
	 */
	function bot(){
		secondary_site_redirect($this->uri->segment(1), $this->uri->segment(2), $this->uri->segment(3), base_url());
		$data['token'] = $this->get_token(10);
		$level = $this->session->userdata('level');
		if ($level == "1"){
			$this->load->view("danmaku/bot",$data);
		}
		else{
			redirect("danmaku");
		}
	}
	
	/**
	 * 弹幕刷屏机发送
	 */
	function bot_post(){
		$color = $this->input->post('color');
		if (!isset($color)) {
			$color = '#ffffff';
		}
		$text = $this->input->post('text');
		$times = $this->input->post('times');
		$token = $this->input->post('token');
		$interval = (double)($this->input->post('interval')) * 1000000;
		if(!isset($interval)){
			$interval = 0;
		}
		$level = $this->session->userdata('level');
		$username = $this->session->userdata('username');
		if($username != '' && $level == '1' && $this->session->userdata('token') == $token){
			$this->session->unset_userdata('token');
			$data = array(
				'text' => $text,
				'color' => $color
			);
			$msg = json_encode($data);
			for($i = 1; $i <= $times; $i++){
				usleep($interval);
				$this->channel->sendMessage('display', $msg);
			}
			redirect('danmaku/bot');
		}
		else{
			redirect('danmaku');
		}
	}
}