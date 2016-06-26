<?php 
/**
* 
*/
class Usuarios_model extends CI_Model
{
	public function get_usuarios()
	{
		$query = $this->db->get('usuarios');

		if($query->num_rows())
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_usuario($id_usuario)
	{
		$this->db->where('id', $id_usuario);

		$usuario = $this->db->get('usuarios');

		if($usuario->num_rows())
		{
			
			return $usuario->row_array();
		}else{
			return false;
		}

		if($usuario->num_rows)
		{
			return $usuario->row_array();

			
		}else{
			return false;
		}
	}

	public function check_login($email, $senha)
	{
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		$usuarios = $this->db->get();

		if($usuarios->num_rows())
		{
			$usuarios = $usuarios->result_array();
			return $usuarios[0];
		}else{
			return false;
		}
	}

	public function update_usuario($id_usuario, $usuario_atualizado)
	{
		$this->db->where('id', $id_usuario);
		$this->db->update('usuarios', $usuario_atualizado);

		if($this->db->affected_rows())
		{
			return true;
		}else{
			return false;
		}
	}

	public function delete_usuario($id_usuario)
	{
		$this->db->where('id', $id_usuario);
		$this->db->delete('usuarios');

		if($this->db->affected_rows())
		{
			return true;
		}else{
			return false;
		}
	}
}