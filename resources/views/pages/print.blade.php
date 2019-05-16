@php
        $pdf = new Fpdf();
        $pdf::AddPage();
        $pdf::SetFont('Arial','B',18);
        $pdf::Cell(0,10,$judul,0,"","C");
        $pdf::Ln();
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(25,8,"NIDN",1,"","C");
        $pdf::cell(45,8,"Nama",1,"","L");
        $pdf::cell(35,8,"Alamat",1,"","L");
        $pdf::Ln();
        $pdf::SetFont("Arial","",10);
        foreach($dosen as $p){
            $pdf::Cell(25,7,$p->nidn,1,"","C");
            $pdf::Cell(45,7,$p->namadosen,1,"","L");
            $pdf::Cell(35,7,$p->alamat,1,"","L");
            $pdf::Ln();
        }

        $pdf::Output();
        exit;
@endphp
