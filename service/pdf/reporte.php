<?php
include('fpdf.php');
include('phpqrcode/qrlib.php');
class reporte extends FPDF{
    public function header(){
        $this->Image('../../public/img/logotipo.png',10,8,20,20);
        $this->SetFont('Arial','B',20);
        $this->Cell(60);
        global $titulo;
        $w = $this->GetStringWidth($titulo);
        $this->SetX((210-$w)/2);
        $this->SetFillColor(170, 217, 228);
        $this->SetTextColor(0,0,0);
        $this->SetLineWidth(1);
        $this->Cell($w,9,$titulo,0,1,'C',true);
        $this->Ln(20);
    }
    public function Footer()
    {
        $qrData = "https://www.google.com";
        $qrFile = "../../../PDF/qr.png";
        QRcode::png($qrData, $qrFile, QR_ECLEVEL_L, 3);
        $w2 = $this->GetStringWidth($qrFile);
        $this->Image($qrFile, $this->SetX((200-$w2)/2), 250, 40, 40);
        $this->SetY(-15);
        $this->SetFont('Arial','I',16);
        $this->Cell(20,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
    }
    public function ParteInicial($texto){
        $this->SetFont('Arial','B',20);
        $this->SetFillColor(255,255,255);
        $this->Cell(0,6,"Compromiso de pago: $texto",0,1,'L',true);
        $this->Ln(4);
    }
    public function parteCuerpo($titulos,$datos){
        $this->Ln(4);
        $this->SetFont('Times','',12);
        $texto = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur maxime, vero illum suscipit vitae quibusdam adipisci quidem amet dolore ullam dignissimos soluta, quam impedit iste laborum obcaecati quos cum.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur maxime, vero illum suscipit vitae quibusdam adipisci quidem amet dolore ullam dignissimos soluta, quam impedit iste laborum obcaecati quos cum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur maxime, vero illum suscipit vitae quibusdam adipisci quidem amet dolore ullam dignissimos soluta, quam impedit iste laborum obcaecati quos cum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur maxime, vero illum suscipit vitae quibusdam adipisci quidem amet dolore ullam dignissimos soluta, quam impedit iste laborum obcaecati quos cum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequatur maxime, vero illum suscipit vitae quibusdam adipisci quidem amet dolore ullam dignissimos soluta, quam impedit iste laborum obcaecati quos cum.";
        $this->MultiCell(0,5,$texto);
        $this->Ln(80);
        $this->Cell(75,10,'---------------------------',0,0,'C');
        $this->Cell(150,10,'---------------------------',0,0,'C');
        $this->Ln();
        $this->Cell(75,11,'Junior Martinez',0,0,'C');
        $this->Cell(150,11,'Junior Martinez',0,0,'C');
        // for ($i=0; $i < count($titulos); $i++){
        //     $this->Cell($w[$i],7,$titulos[$i],1,0,'C',true);
        // }
    }
    public function documentoFinal($titulo,$encabezados,$file){
        $this->AddPage();
        $this->ParteInicial($titulo);
        $this->parteCuerpo($encabezados,$file);
    }
}
