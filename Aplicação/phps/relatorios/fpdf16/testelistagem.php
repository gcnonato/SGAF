<?php

define('FPDF_FONTPATH', 'font/');



require('fpdf.php');


$hostname = "localhost";
$db = "teste";
$user = "root";
$pass = '';

$link = mysql_connect($hostname, $user, $pass);
if (!$link) {
    die('<br /><strong>Não foi possivel conectar ao Banco de Dados! <br /> Descrição do erro:</strong> ' . mysql_error());
}

mysql_select_db($db, $link);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');



// busca os dados no banco de dados
$busca = mysql_query("SELECT * FROM tabslinks ");
$pdf = new FPDF('L','mm');

$pdf->Open();
$pdf->AddPage();


$pdf->SetX(25);
$pdf->SetY(25);
$pdf->image("logomarista.jpg", 15, 9, 45);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50, 6, "RELAT�RIO GERAL DE ALUNOS", 0, 0);




$pdf->SetX(50);
$pdf->SetY(50);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(40, 5, 'ID');
$pdf->SetX(15);
$pdf->Cell(60, 5, 'Data');
$pdf->SetX(40);
$pdf->Cell(40, 5, 'Nome');
$pdf->SetX(80);
$pdf->Cell(40, 5, 'nome');
$pdf->SetX(120);
$pdf->Cell(40, 5, 'nome');
$pdf->SetX(160);
$pdf->Cell(40, 5, 'nome');
$pdf->SetX(190);
$pdf->Cell(40, 5, 'nome');
$pdf->SetX(230);
$pdf->Cell(40, 5, 'nome');
$pdf->SetX(260);
$pdf->Cell(40, 5, 'nome');


while ($resultado = mysql_fetch_array($busca)) {
    $pdf->ln();
    $pdf->Cell(40, 5, $resultado['id']);
    $pdf->SetX(15);
    $pdf->Cell(60, 5, $resultado['data']);
    $pdf->SetX(40);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(80);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(120);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(160);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(190);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(230);
    $pdf->Cell(40, 5, $resultado['nome']);
    $pdf->SetX(260);
    $pdf->Cell(40, 5, $resultado['nome']);
}


/* $novo="
  Nesta segunda-feira, a situa��o come�ou a se normalizar, mas ainda h� registro de problemas. At� as 10h, dos 623 v�os previstos nos 13 principais aeroportos brasileiros, 126 tiveram atrasos de mais de uma hora, segundo balan�o divulgado pela Infraero, a estatal que administra os terminais a�reos. O n�mero equivale a 20,2% do total. Quarenta e seis decolagens foram canceladas (7,3%).
  Os terminais que tiveram maiores percentuais de atrasos foram os do Recife (PE) e de Fortaleza (CE). Na Capital de Pernambuco, oito dos 24 v�os marcados at� as 10h atrasaram mais de uma hora (33,3% do total). No terminal cearense, oito das 25 partidas ocorreram fora
  O terminal que registrou maior �ndice de cancelamentos foi o de Curitiba (PR). Das 22 decolagens programadas, quatro foram canceladas (18,1%).
  A assessoria de Infraero informa que os atrasos s�o conseq��ncia dos transtornos do fim de semana. Muitos v�os tiveram que ser remarcados para o in�cio desta semana.
  Previs�o - O presidente da Infraero, brigadeiro Jos� Carlos Pereira, tamb�m foi prejudicado pela crise a�rea. Ele tinha uma viagem marcada de Bras�lia para o Rio �s 7h desta segunda, mas o avi�o s� decolou �s 9h59.
  Apesar do transtorno, ele disse que as opera��es est�o ocorrendo normalmente nos principais aeroportos do pa�s e a situa��o deve se normalizar at� as 14h.
  ";


  $pdf->MultiCell(0,5,$novo,10,'J');
 */
  
$pdf->Output();
?>