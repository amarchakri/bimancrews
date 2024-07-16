<?php

namespace App\Http\Controllers;

use App\Models\leaveDetails;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
  
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Mpdf\Mpdf;
// use Mpdf\Output\Destination;

class PdfController extends Controller
{
   
    public function generatePDF()
    {       
        // dd("Report");

        $users = User::get();
  
        $data = [
            'title' => 'Welcome to Biman Flight Operations',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('Kalam.pdf');
    }
    
   
    public function generateLeave($id)
    {       
        // dd("Report");

        $leave = leaveDetails::find($id);
  
        $data = [
            'title' => 'Biman leave Form',
            'date' => date('m/d/Y'),
            'leave' => $leave
        ]; 
            
        $pdf = PDF::loadView('leaveApplication', $data);
     
        return $pdf->download('leaveForm.pdf');
    }
    
    // public function createPdf (Request $request) {
    //     //validate request
    //     Validator::validate($request->all(), [
    //         'name' => 'required|string|min:1',
    //         'content' => 'required|string|min:1'
    //     ]);

    //     //create PDF
    //     $mpdf = new Mpdf();

    //     $header = trim($request->get('header', ''));
    //     $footer = trim($request->get('footer', ''));

    //     if (strlen($header)) {
    //         $mpdf->SetHTMLHeader($header);
    //     }

    //     if (strlen($footer)) {
    //         $mpdf->SetHTMLFooter($footer);
    //     }

    //     if ($request->get('show_toc')) {
    //         $mpdf->h2toc = array(
    //             'H1' => 0,
    //             'H2' => 1,
    //             'H3' => 2,
    //             'H4' => 3,
    //             'H5' => 4,
    //             'H6' => 5
    //         );
    //         $mpdf->TOCpagebreak();
    //     }

    //     //write content
    //     $mpdf->WriteHTML($request->get('content'));

    //     //return the PDF for download
    //     return $mpdf->Output($request->get('name') . '.pdf', Destination::DOWNLOAD);
    // }
}
