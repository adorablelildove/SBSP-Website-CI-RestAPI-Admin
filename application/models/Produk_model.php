<?php

class Produk_model extends CI_model
{
	public function getAllProduk()
	{
		return $this->db->get('produk')->result_array();
	}

	public function getSomeProduk($limit, $start)
	{
		return $this->db->get('produk', $limit, $start)->result_array();
	}

	public function countAllProduct()
	{
		return $this->db->get('produk')->num_rows();
	}

	public function tambahDataProduk()
	{

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|JPG|jpeg|png|JPEG|PNG';
		$config['max_size']             = 0;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			echo "Foto gagal diupload.";
		} else {
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$nama_produk = $this->input->post('nama_produk', true);
			$kd_produk = $this->input->post('kd_produk', true);
			$harga = $this->input->post('harga', true);
			$deskripsi = $this->input->post('deskripsi', true);
			$data = array(
				'nama_produk' => $nama_produk,
				'kd_produk' => $kd_produk,
				'foto' => $foto,
				'harga' => $harga,
				'deskripsi' => $deskripsi,
			);

			$this->db->insert('produk', $data);
		}

		// $data = [
		// 	"nama_produk" => $this->input->post('nama_produk', true),
		// 	"kd_produk" => $this->input->post('kd_produk', true),
		// 	"foto" => $this->input->post('foto', true),
		// 	"harga" => $this->input->post('harga', true),
		// 	"deskripsi" => $this->input->post('deskripsi', true)
		// ];
		// $this->db->insert('produk', $data);
	}

	public function hapusDataProduk($id)
	{
		// $this->db->where('id_produk', $id);
		$this->db->delete('produk', ['id_produk' => $id]);
	}

	public function getProdukById($id)
	{
		return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
	}

	public function editDataProduk()
	{
		$id_produk = $this->input->post('id_produk');
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|JPG|jpeg|png|JPEG|PNG';
		$config['max_size']             = 0;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('userfile')) {
			$nama_produk = $this->input->post('nama_produk', true);
			$harga = $this->input->post('harga', true);
			$deskripsi = $this->input->post('deskripsi', true);

			$data = array(
				'nama_produk' => $nama_produk,
				'harga' => $harga,
				'deskripsi' => $deskripsi,
			);

			$this->db->where('id_produk', $id_produk);
			$this->db->update('produk', $data);
		} else {
			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$nama_produk = $this->input->post('nama_produk', true);
			$kd_produk = $this->input->post('kd_produk', true);
			$harga = $this->input->post('harga', true);
			$deskripsi = $this->input->post('deskripsi', true);
			$data = array(
				'nama_produk' => $nama_produk,
				'kd_produk' => $kd_produk,
				'foto' => $foto,
				'harga' => $harga,
				'deskripsi' => $deskripsi,
			);

			$this->db->where('id_produk', $id_produk);
			$this->db->update('produk', $data);
		}
	}

	public function cariDataProduk()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_produk', $keyword);
		$this->db->or_like('kd_produk', $keyword);
		$this->db->or_like('harga', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		return $this->db->get('produk')->result_array();
	}
}
