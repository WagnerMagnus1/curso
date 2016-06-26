<?php /**
* 
*/
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
				redirect('conta/entrar');		
		}											
	}

	public function index()
	{
		$alerta = null;

		$dados = array('alerta' => $alerta );

		$this->load->view('dashboard/index_view', $dados);		
	}
}