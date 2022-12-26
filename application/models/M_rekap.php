<?php

class M_rekap extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function view_by_date($date)
  {
    $this->db->where('tanggal', $date); // Tambahkan where tanggal nya
    $this->db->order_by('id', 'DESC');
    return $this->db->get('data_sensor')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }

  public function view_by_month($month, $year)
  {
    $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
    $this->db->order_by('id', 'DESC');
    return $this->db->get('data_sensor')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }

  public function view_by_year($year)
  {
    $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
    $this->db->order_by('id', 'DESC');
    return $this->db->get('data_sensor')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }

  public function view_all()
  {
    $this->db->order_by('id', 'DESC');
    return $this->db->get('data_sensor')->result(); // Tampilkan semua data transaksi
  }

  public function option_tahun()
  {
    $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
    $this->db->from('data_sensor'); // select ke tabel transaksi
    $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
    $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl

    return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
  }
}
