<?php 
require("../../../system/config.php");
require_once ('../../../jpgraph/src/jpgraph.php');
require_once ('../../../jpgraph/src/jpgraph_error.php');
require_once ('../../../jpgraph/src/jpgraph_line.php');

$count=$_POST['count'];
$estacion=$_POST['estacion'];
$frecuencia1=$_POST['frecuencia1'];
$frecuencia2=$_POST['frecuencia2'];
$a1=$_POST['a1'];
$a2=$_POST['a2'];
$a3=$_POST['a3'];
$a4=$_POST['a4'];
$a5=$_POST['a5'];
$a6=$_POST['a6'];
$a7=$_POST['a7'];
$a8=$_POST['a8'];
$a9=$_POST['a9'];
$a10=$_POST['a10'];
$a11=$_POST['a11'];
$a12=$_POST['a12'];
$a13=$_POST['a13'];
$a14=$_POST['a14'];
$a15=$_POST['a15'];
$a16=$_POST['a16'];
$a17=$_POST['a17'];
$a18=$_POST['a18'];
$a19=$_POST['a19'];
$a20=$_POST['a20'];
$a21=$_POST['a21'];
$a22=$_POST['a22'];
$a23=$_POST['a23'];
$a24=$_POST['a24'];
$a25=$_POST['a25'];
$a26=$_POST['a26'];
$a27=$_POST['a27'];
$a28=$_POST['a28'];
$a29=$_POST['a29'];
$a30=$_POST['a30'];
$a31=$_POST['a31'];
$a32=$_POST['a32'];
$a33=$_POST['a33'];
$a34=$_POST['a34'];
//primera frecuencia
$frec1=$_POST['frec1'];

$valor=$a1/2;
$f1=$frec1-$valor;
$f2=$frec1+$valor;

$frec2=$_POST['frec2'];

$valor=$a2/2;
$f3=$frec2-$valor;
$f4=$frec2+$valor;

$frec3=$_POST['frec3'];

$valor=$a3/2;
$f5=$frec3-$valor;
$f6=$frec3+$valor;

$frec4=$_POST['frec4'];

$valor=$a4/2;
$f7=$frec4-$valor;
$f8=$frec4+$valor;

$frec5=$_POST['frec5'];

$valor=$a5/2;
$f9=$frec5-$valor;
$f10=$frec5+$valor;

$frec6=$_POST['frec6'];

$valor=$a6/2;
$f11=$frec6-$valor;
$f12=$frec6+$valor;

$frec7=$_POST['frec7'];

$valor=$a7/2;
$f13=$frec7-$valor;
$f14=$frec7+$valor;

$frec8=$_POST['frec8'];

$valor=$a8/2;
$f15=$frec8-$valor;
$f16=$frec8+$valor;

$frec9=$_POST['frec9'];

$valor=$a9/2;
$f17=$frec9-$valor;
$f18=$frec9+$valor;

$frec10=$_POST['frec10'];

$valor=$a10/2;
$f19=$frec10-$valor;
$f20=$frec10+$valor;

$frec11=$_POST['frec11'];

$valor=$a11/2;
$f21=$frec11-$valor;
$f22=$frec11+$valor;

$frec12=$_POST['frec12'];

$valor=$a12/2;
$f23=$frec12-$valor;
$f24=$frec12+$valor;

$frec13=$_POST['frec13'];

$valor=$a13/2;
$f25=$frec13-$valor;
$f26=$frec13+$valor;

$frec14=$_POST['frec14'];

$valor=$a14/2;
$f27=$frec14-$valor;
$f28=$frec14+$valor;

$frec15=$_POST['frec15'];

$valor=$a15/2;
$f29=$frec15-$valor;
$f30=$frec15+$valor;

$frec16=$_POST['frec16'];

$valor=$a16/2;
$f31=$frec16-$valor;
$f32=$frec16+$valor;

$frec17=$_POST['frec17'];

$valor=$a17/2;
$f33=$frec17-$valor;
$f34=$frec17+$valor;

$frec18=$_POST['frec18'];

$valor=$a18/2;
$f35=$frec18-$valor;
$f36=$frec18+$valor;

$frec19=$_POST['frec19'];

$valor=$a19/2;
$f37=$frec19-$valor;
$f38=$frec19+$valor;

$frec20=$_POST['frec20'];

$valor=$a20/2;
$f39=$frec20-$valor;
$f40=$frec20+$valor;

$frec21=$_POST['frec21'];

$valor=$a21/2;
$f41=$frec21-$valor;
$f42=$frec21+$valor;

$frec22=$_POST['frec22'];

$valor=$a22/2;
$f43=$frec22-$valor;
$f44=$frec22+$valor;

$frec23=$_POST['frec23'];

$valor=$a23/2;
$f45=$frec23-$valor;
$f46=$frec23+$valor;

$frec24=$_POST['frec24'];

$valor=$a24/2;
$f47=$frec24-$valor;
$f48=$frec24+$valor;

$frec25=$_POST['frec25'];

$valor=$a25/2;
$f49=$frec25-$valor;
$f50=$frec25+$valor;


$frec26=$_POST['frec26'];

$valor=$a26/2;
$f51=$frec26-$valor;
$f52=$frec26+$valor;


$frec27=$_POST['frec27'];

$valor=$a27/2;
$f53=$frec27-$valor;
$f54=$frec27+$valor;

$frec28=$_POST['frec28'];

$valor=$a28/2;
$f55=$frec28-$valor;
$f56=$frec28+$valor;

$frec29=$_POST['frec29'];

$valor=$a29/2;
$f57=$frec29-$valor;
$f58=$frec29+$valor;

$frec30=$_POST['frec30'];

$valor=$a30/2;
$f59=$frec30-$valor;
$f60=$frec30+$valor;

$frec31=$_POST['frec31'];

$valor=$a31/2;
$f61=$frec31-$valor;
$f62=$frec31+$valor;

$frec32=$_POST['frec32'];

$valor=$a32/2;
$f63=$frec32-$valor;
$f64=$frec32+$valor;

$frec33=$_POST['frec33'];

$valor=$a33/2;
$f65=$frec33-$valor;
$f66=$frec33+$valor;

$frec34=$_POST['frec34'];

$valor=$a34/2;
$f67=$frec34-$valor;
$f68=$frec34+$valor;

$i1=$_POST['i1']."\n".$frec1;
$i2=$_POST['i2']."\n".$frec2;
$i3=$_POST['i3']."\n".$frec3;
$i4=$_POST['i4']."\n".$frec4;
$i5=$_POST['i5']."\n".$frec5;
$i6=$_POST['i6']."\n".$frec6;
$i7=$_POST['i7']."\n".$frec7;
$i8=$_POST['i8']."\n".$frec8;
$i9=$_POST['i9']."\n".$frec9;
$i10=$_POST['i10']."\n".$frec10;
$i11=$_POST['i11']."\n".$frec11;
$i12=$_POST['i12']."\n".$frec12;
$i13=$_POST['i13']."\n".$frec13;
$i14=$_POST['i14']."\n".$frec14;
$i15=$_POST['i15']."\n".$frec15;
$i16=$_POST['i16']."\n".$frec16;
$i17=$_POST['i17']."\n".$frec17;
$i18=$_POST['i18']."\n".$frec18;
$i19=$_POST['i19']."\n".$frec19;
$i20=$_POST['i20']."\n".$frec20;
$i21=$_POST['i21']."\n".$frec21;
$i22=$_POST['i22']."\n".$frec22;
$i23=$_POST['i23']."\n".$frec23;
$i24=$_POST['i24']."\n".$frec24;
$i25=$_POST['i25']."\n".$frec25;
$i26=$_POST['i26']."\n".$frec26;
$i27=$_POST['i27']."\n".$frec27;
$i28=$_POST['i28']."\n".$frec28;
$i29=$_POST['i29']."\n".$frec29;
$i30=$_POST['i30']."\n".$frec30;
$i31=$_POST['i31']."\n".$frec31;
$i32=$_POST['i32']."\n".$frec32;
$i33=$_POST['i33']."\n".$frec33;
$i34=$_POST['i34']."\n".$frec34;
if($count==0){
echo "Sin Registros";

	}
if($count==1){
$errdatay = array($f1,$f2);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==2){
$errdatay = array($f1,$f2,$f3,$f4);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==3){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==4){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==5){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==6){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==7){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==8){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==9){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==10){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==11){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==12){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}

if($count==13){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}

if($count==14){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==15){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30);
$graph = new Graph(1500,900);    
$graph->SetScale("textlin",$frecuencia1,$frecuencia2);
$graph->yscale->ticks->Set(10,20);
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("blue");
$errplot->SetCenter();
$errplot->SetWeight(1);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==16){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==17){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}

if($count==18){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==19){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==20){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==21){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==22){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==23){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==24){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==25){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==26){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==27){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==28){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==29){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==30){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58,$f59,$f60);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29","$i30");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
if($count==31){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58,$f59,$f60,$f61,$f62);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29","$i30","$i31");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==32){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58,$f59,$f60,$f61,$f62,$f63,$f64);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29","$i30","$i31","$i32");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==33){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58,$f59,$f60,$f61,$f62,$f63,$f64,$f65,$f66);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29","$i30","$i31","$i32","$i33");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
if($count==34){
$errdatay = array($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$f14,$f15,$f16,$f17,$f18,$f19,$f20,$f21,$f22,$f23,$f24,$f25,$f26,$f27,$f28,$f29,$f30,$f31,$f32,$f33,$f34,$f35,$f36,$f37,$f38,$f39,$f40,$f41,$f42,$f43,$f44,$f45,$f46,$f47,$f48,$f49,$f50,$f51,$f52,$f53,$f54,$f55,$f56,$f57,$f58,$f59,$f60,$f61,$f62,$f63,$f64,$f65,$f66,$f67,$f68);
$graph = new Graph(1200,900);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->SetShadow();
$errplot=new ErrorPlot($errdatay);
$errplot->SetColor("red");
$errplot->SetWeight(2);
$graph->Add($errplot);
$graph->title->Set("Frecuencias de $estacion");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$datax=array("$i1","$i2","$i3","$i4","$i5","$i6","$i7","$i8","$i9","$i10","$i11","$i12","$i13","$i14","$i15","$i16","$i17","$i18","$i19","$i20","$i21","$i22","$i23","$i24","$i25","$i26","$i27","$i28","$i29","$i30","$i31","$i32","$i33","$i34");
$graph->xaxis->SetTickLabels($datax);
$graph->Stroke();
	
	
	}
	
	else { echo "Consulte con de DBA LP";}
?>
