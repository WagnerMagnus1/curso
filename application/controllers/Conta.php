<?php /**
* 
*/
class Conta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		//var_dump($this->session->all_userdata());

		if($this->session->userdata('logado') == TRUE)
		{
			if(!$this->uri->segment(2) == "sair")
			{
				redirect('Welcome');
			}
		}											
	}

	public function entrar()
	{
   		$alerta	= null;

		if($this->input->post('entrar') == "entrar")
		{
			if($this->input->post('captcha')) redirect('conta/entrar');

			$this->form_validation->set_rules('email','EMAIL', 'required|valid_email');
			$this->form_validation->set_rules('senha','SENHA', 'required|min_length[6]|max_length[20]');

			if($this->form_validation->run() == TRUE)
			{	
				$this->load->model('Usuarios_model');

				$email = $this->input->post('email');
				$senha = $this->input->post('senha');

				$login_existe = $this->Usuarios_model->check_login($email, $senha);

				if($login_existe){
					//Login Autorizado--- iniciar sessão
					$usuario = $login_existe;

					//Configura os dados da sessão
					$session = array(
					        'email'     => $usuario['email'],
					        'created'   => $usuario['created'],
					        'logado' => TRUE
					);

					//Inicializa a sessão
					$this->session->set_userdata($session);

					redirect('dashboard');

				}else{
					$alerta = array(
						"class" => "danger", 
						"mensagem" => "Atenção! Login inválido, senha ou email incorretos."
						);
				}


			}else{
				$alerta = array("class" => "danger", "mensagem" => "Atenção! Falha na validação do formulário!<br>". validation_errors());
			}
		}

		$dados = array("alerta" => $alerta);

		$this->load->view('conta/v_entrar', $dados);
	}

	public function sair()
	{
		$this->session->sess_destroy();

		redirect('Welcome');
	}

}