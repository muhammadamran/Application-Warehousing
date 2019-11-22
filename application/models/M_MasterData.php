<?php

class M_MasterData extends CI_Model{

// Cek Login
    function cek_login($table,$data){      
        $query = $this->db->get_where($table,$data);

        if ($query->num_rows() == 1) {
            return $query->row();
        }else{
            return false;
        }
    }

// Get Pemesanan
    function get_barang()
    {
        $query=$this->db->from('tb_pemesanan')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

// Get Stok
    function get_stok()
    {
        $this->db->group_by('nama_barang');
        $query=$this->db->select('kd_barang, nama_barang, SUM(jumlah_barang) AS total_brg')
        ->where('status_barang IS NULL')
        ->get('tb_penerimaan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Get pengeluaran
    function get_pengeluaran($nama_barang)
    {
        $query=$this->db->select('nama_brg, SUM(jmlbrg) AS total_brg')
        ->where('nama_brg', $nama_barang)
        ->get('tb_pengeluaran');
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{
            return false;
        }
    }

// Get Vendor
    function get_vendor()
    {
        $query=$this->db->from('tb_user')
        ->where(("user_role='Vendor'"))
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

// Get Pemesanan Dua
    function get_barangdua()
    {
        $query=$this->db->from('tb_pemesanan')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Get Pemesanan Tiga
    function get_barangtiga()
    {
        $query=$this->db->from('tb_pemesanan')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
// Get Penerimaan
    function get_Penerimaan()
    {
        $query=$this->db->from('tb_penerimaan')
        ->where('status_barang IS NULL')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

// Search Pemesanan
    function search_pemesanan($keyword)
    {
        $query=$this->db->like('id_pemesanan', $keyword)
        ->or_like('kode_brg', $keyword)
        ->or_like('nama_brg', $keyword)
        ->or_like('nm_vendor', $keyword)
        ->or_like('jml_brg', $keyword)
        ->or_like('satuan', $keyword)
        ->or_like('tgl_pesan', $keyword)
        ->or_like('tgl_expired', $keyword)
        ->get('tb_pemesanan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }


// Search Penerimaan
    function search_penerimaan($keyword)
    {
        $query=$this->db->like('id_penerimaan', $keyword)
        ->or_like('no_po', $keyword)
        ->or_like('kd_barang', $keyword)
        ->or_like('nama_barang', $keyword)
        ->or_like('nama_vendor', $keyword)
        ->or_like('jumlah_barang', $keyword)
        ->or_like('tgl_brg_dterima', $keyword)
        ->or_like('satuan', $keyword)
        ->or_like('status_barang', $keyword)
        ->get('tb_penerimaan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Search Pengeluaran
    function search_pengeluaran($keyword)
    {
        $query=$this->db->like('id_pengeluaran', $keyword)
        ->or_like('noreservation', $keyword)
        ->or_like('kd_barang', $keyword)
        ->or_like('no_sliptf', $keyword)
        ->or_like('kdbrg', $keyword)
        ->or_like('nama_brg', $keyword)
        ->or_like('nmvdr', $keyword)
        ->or_like('jmlbrg', $keyword)
        ->or_like('satuan', $keyword)
        ->or_like('tglbrgkeluar', $keyword)
        ->get('tb_pengeluaran');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Search Penolakan
    function search_penolakan($keyword)
    {
        $query=$this->db->like('id_penerimaan', $keyword)
        ->or_like('no_po', $keyword)
        ->or_like('kd_barang', $keyword)
        ->or_like('nama_barang', $keyword)
        ->or_like('nama_vendor', $keyword)
        ->or_like('jumlah_barang', $keyword)
        ->or_like('tgl_brg_dterima', $keyword)
        ->or_like('satuan', $keyword)
        ->or_like('status_barang', $keyword)
        ->or_like('keterangan', $keyword)
        ->get('tb_penerimaan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Search Laporan Penerimaan Barang
    function search_laporanpenrimaan($tgl_awal,$tgl_akhir)
    {
        $query=$this->db->query("SELECT * FROM `tb_penerimaan` WHERE `tgl_brg_dterima` BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Search Laporan Pengeluaran Barang
    function search_laporanpenolakan($tgl_awal,$tgl_akhir)
    {
        $query=$this->db->query("SELECT * FROM `tb_pengeluaran` WHERE `tglbrgkeluar` BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// Input Data Pemesanan Barang
    function input_data_pemesanan($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Pengeluaran Barang
    function input_data_pengeluaran($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Penerimaan Barang
    function input_data($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Users
    function input_user($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Users
    function input_vendor($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Users
    function input_stok($table, $data)
    {
        $this->db->insert($table,$data);
    }

// Input Data Penolakan
    function input_penolakan($table, $data)
    {
        $this->db->insert($table,$data);
    }


// Update pemesanan barang
    function update_data_pemesanan($table,$data,$id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update($table,$data);  
    }

// Update pengeluaran barang
    function update_data_pengeluaran($table,$data,$id_pengeluaran)
    {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        $this->db->update($table,$data);  
    }

// Update penerimaan barang
    function update_data($table,$data,$id_penerimaan)
    {
        $this->db->where('id_penerimaan', $id_penerimaan);
        $this->db->update($table,$data);  
    }

// Update users
    function update_data_users($table,$data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table,$data);  
    }

// Update vendor
    function update_data_vendor($table,$data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table,$data);  
    }

// Update stok
    function update_data_Stok($table,$data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($table,$data);  
    }

// Update penolakan barang
    function update_data_tolak($table,$data,$id_penerimaan)
    {
        $this->db->where('id_penerimaan', $id_penerimaan);
        $this->db->update($table,$data);  
    }

// Update selesai pemesanan
    function update_data_selesai($table,$data,$id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update($table,$data);  
    }

// Delete data pemesanan
    function deleteDataPemesanan($table,$id_pemesanan)
    {
        $this->db->delete($table,$id_pemesanan);
    }

// Delete data penerimaan
    function deleteData($table,$id_penerimaan)
    {
        $this->db->delete($table,$id_penerimaan);
    }

// Delete data pengeluaran
    function deleteDataPengeluaran($table,$id_pengeluaran)
    {
        $this->db->delete($table,$id_pengeluaran);
    }

// Delete data users
    function DeleteDataUsers($table,$user_id)
    {
        $this->db->delete($table,$user_id);
    }

// Delete data vendor
    function DeleteDataVendor($table,$user_id)
    {
        $this->db->delete($table,$user_id);
    }

// Delete data stok
    function DeleteDataStok($table,$id)
    {
        $this->db->delete($table,$id);
    }

}