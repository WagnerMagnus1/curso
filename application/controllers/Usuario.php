<?php /**
* 
*/
class Usuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logado'))
		{
				redirect('conta/entrar');		
		}											
	}

	public function visualizar_todos()
	{
		$alerta = null;
		$this->load->model('Usuarios_model');
		$usuarios = $this->Usuarios_model->get_usuarios();

		$dados = array(
			'alerta' => $alerta,
			'usuarios' => $usuarios 
			);

		$this->load->view('usuario/visualizar_todos_view', $dados);		
	}

	public function cadastrar()
	{
		$alerta = null;

		$dados = array('alerta' => $alerta );

		$this->load->view('usuario/visualizar_todos_view', $dados);		
	}

	public function editar($id_usuario)
	{
		$usuario = null;
		$alerta = null;
		$id_usuario = (int) $id_usuario;

		if($id_usuario)
		{
			$this->load->model('Usuarios_model');
			$existe = $this->Usuarios_model->get_usuario($id_usuario);

			if($existe)
			{
				$usuario = $existe;
				$id_usuario_form = (int) $this->input->post('id_usuario');

				if($this->input->post('editar') == "editar")
				{
					if($this->input->post('captcha')) redirect('conta/entrar');
					if($id_usuario != $id_usuario_form) redirect('conta/entrar');

					$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
					
					$this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[6]|max_length[20]');
					
					$this->form_validation->set_rules('confirmar_senha', 'CONFIRMAR SENHA', 'required|min_length[6]|max_length[20]|matches[senha]');



					if($this->form_validation->run() == true)
					{
						$usuario_atualizado = array(
							"email" => $this->input->post('email'),
							"senha" => $this->input->post('senha')
							);

						$atualizou = $this->Usuarios_model->update_usuario($id_usuario, $usuario_atualizado);
						if($atualizou)
						{
							$alerta = array(
							'class' => 'sucess',
							'mensagem' => 'O Usuário foi atualizado com sucesso!' 
							);
						}else{
							$alerta = array(
							'class' => 'danger',
							'mensagem' => 'Atenção! Erro ao realizar o update, verifique!' 
							);
						}
					}else{
						$alerta = array(
						'class' => 'danger',
						'mensagem' => 'Atenção! O formulario esta incorreto!<br>'.validation_errors() 
						);
					}



				}

			}else{
				//$usuario = false;
				$alerta = array(
				'class' => 'danger',
				'mensagem' => 'Atenção! O usuário não foi encontrado!' 
				);
			}

		}else{
			$alerta = array(
				'class' => 'danger',
				'mensagem' => 'Atenção! O usuário informado está incorreto.' 
				);
		}
		
		$dados = array(
			'alerta' => $alerta,
			'usuario'=> $usuario
		 );

		$this->load->view('usuario/editar_view', $dados);	
	}

	public function deletar($id_usuario)
	{
		$alerta = null;

		$id_usuario = (int) $id_usuario;

		if($id_usuario)
		{
			$this->load->model('Usuarios_model');

			$existe = $this->Usuarios_model->get_usuario($id_usuario);

			if($existe)
			{
				$deletou = $this->Usuarios_model->delete_usuario($id_usuario);

				if($deletou)
				{
					$alerta = array(
					"class" => "sucess",
					"mensagem" => "Atenção! Usuário deletado com sucesso!."
					);
				}else{
					$alerta = array(
					"class" => "danger",
					"mensagem" => "Atenção! O usuário não foi excluido!"
					);
				}

			}else{
				$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! O usuário não foi encotrado."
				);
			}

		}else{

			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! O usuário informado está incorreto."
				);
		}
		var_dump($alerta);
		exit();
		$this->load->view('usuario/deletar', $alerta);
	}
}