
<?php
Class Report_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        //$this->load->library('fpdf');
    }
    
    function pdf_Barang(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Data Barang',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(30);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(17,6,'Kode',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(40,6,'Nama Barang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Merk',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(10,6,'Unit',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(17,6,'Tersedia',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Tgl Masuk',1,0,'C',1);
        
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $brg = $this->db->get('barang')->result();
        $i=1;
        foreach ($brg as $row){
            $pdf->SetX(30);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(17,6,$row->kode_barang,1,0);
            $pdf->Cell(40,6,$row->nama_barang,1,0);
            $pdf->Cell(30,6,$row->merk,1,0);
            $pdf->Cell(10,6,$row->jml_barang,1,0,'C');
            if($row->jml_tersedia>0){
                $pdf->Cell(17,6,$row->jml_tersedia,1,0,'C');
            }else{
                $pdf->SetTextColor(255, 0, 0);
                $pdf->Cell(17,6,$row->jml_tersedia,1,0,'C');
            }
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(25,6,$row->tgl_masuk,1,0,'C');
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
    function pdf_anggota(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Daftar Anggota',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(17,6,'NIP',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Nama',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Jabatan',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(35,6,'Pangkat/Golongan',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(20,6,'Bidang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Tgl Lahir',1,0,'C',1);
        
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $agt = $this->db->get('anggota')->result();
        $i=1;
        foreach ($agt as $row){
            $pdf->SetX(20);
            $pdf->Cell(9,6,$i,1,0);
            $pdf->Cell(17,6,$row->nip,1,0);
            $pdf->Cell(30,6,$row->nama,1,0);
            $pdf->Cell(30,6,$row->jabatan,1,0);
            $pdf->Cell(35,6,$row->pangkat_golongan,1,0);
            $pdf->Cell(20,6,$row->seksi,1,0);
            $pdf->Cell(30,6,$row->tgl_lahir,1,0);
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
}
