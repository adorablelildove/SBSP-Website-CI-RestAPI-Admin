<?php
class Contact_model extends CI_model {
	public function getAllContact()
	{
		return $this->db->get('contact_us')->result_array();
	}

    public function getProdukById($id)
	{
		return $this->db->get_where('contact_us',['id_contact' => $id])->row_array();
	}

    public function editContact(){
		$data = [
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"telp1" => $this->input->post('telp1', true),
			"telp2" => $this->input->post('telp2', true),
			"alamat" => $this->input->post('alamat', true),
            "medsos_instagram" => $this->input->post('medsos_instagram', true),
            "medsos_facebook" => $this->input->post('medsos_facebook', true)
		];
		$this->db->where('id_contact', $this->input->post('id_contact'));
		$this->db->update('contact_us', $data);
	}

}
