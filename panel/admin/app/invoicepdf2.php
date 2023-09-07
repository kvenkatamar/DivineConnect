<?php
//session_start();
error_reporting(0);


 include '../../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: ".$e->getMessage();
        }






require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Invoice ');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage(); 
      $contents = '<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
          
              <h4 class="card-title">Darshan Pass/Receipt</h4>
               <a >
               
                <img class="brand-title" class="center" src="../assets/images/logo.png" alt="" width="100">
            </a>
             
          </div>
          
              <div class="card-body">
                <div class="basic-form">';

       foreach ($result as $key) {                                     
     $contents .= '<tbody>
                                               
                                                <tr>
                                                   
                                                   
                                                     <td>'.$key['eid'].'</td>
                                                    <td>'.$key['date'].' </td>
                                                   <td>'.$key['dname'].' </td>
                                                     <td>'.$key['donation'].'</td>
                                                    <td>'.$key['chargeofseva'].'</td>
                                                   
                                                  
                                                
                                                </tr>
                                             </tbody>
                                              ';
                                            }
   
  
     $contents .= '</table>';

  $pdf->writeHTML($contents); 
    ob_end_clean();     
    $pdf->Output('income.pdf', 'I');
?>