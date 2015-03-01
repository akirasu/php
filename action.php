<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>test</title>
<link rel=stylesheet type="text/css" href="style.css" />  

</head>
<body>
 <div class="main">
 <p><IMG src="img/h.png"></p>
 <table class="tb">
  <tr>
    <td>

     <form action="action.php" method="post">
       燃料： <input type="text" name="nen" /><br>
       弾薬： <input type="text" name="dan" /><br>
       鋼材： <input type="text" name="kou" /><br>
       ボーキサイト： <input type="text" name="boki" /><br>
       開発資材： <input type="text" name="ksizai" /><br>
     <input type="submit" />
     </form>

    <td valign="top">
     入力資材数<br>
     燃料<?php echo (int)$_POST['nen']; ?><br>
     弾薬<?php echo (int)$_POST['dan']; ?><br>
     鋼材<?php echo (int)$_POST['kou']; ?><br>
     ボーキサイト<?php echo (int)$_POST['boki']; ?><br>
     開発資材<?php echo (int)$_POST['ksizai']; ?><br>
     
    </td>
 </tr>
 </table>
<?php
echo("<div class=\"log1\">");//div log
echo("<IMG src=\"img/log.png\"><br>");
function gsikeisan($gsi){ //現在必要資材計算用
  $nsi[1] = (int)$_POST['nen']-$gsi[1];
  $nsi[2] = (int)$_POST['dan']-$gsi[2];
  $nsi[3] = (int)$_POST['kou']-$gsi[3];
  $nsi[4] = (int)$_POST['boki']-$gsi[4];
  $nsi[5] = (int)$_POST['ksizai']-$gsi[5];
  echo("現在必要資材数=");
  print_r($nsi);
  echo("<br>");
  return $nsi;
}

  $bset[0]="300";//300円の燃料1000セット
  $bset[1]="1000";
  $bset[2]="0";
  $bset[3]="0";
  $bset[4]="0";
  $bset[5]="0";
  $bset[6]="0";
  print_r($bset);
  echo("<br>");

  $cset[0]="300";//300円のボーキ550セット
  $cset[1]="0";
  $cset[2]="0";
  $cset[3]="0";
  $cset[4]="550";
  $cset[5]="0";
  $cset[6]="0";
  print_r($cset);
  echo("<br>");

  $dset[0]="300";//300円のセット
  $dset[1]="500";
  $dset[2]="500";
  $dset[3]="200";
  $dset[4]="0";
  $dset[5]="0";
  $dset[6]="2";
  print_r($dset);
  echo("<br>");

  $eset[0]="700";//700円のセット
  $eset[1]="200";
  $eset[2]="200";
  $eset[3]="1500";
  $eset[4]="200";
  $eset[5]="2";
  $eset[6]="0";
  print_r($eset);
  echo("<br>");

  $jset[0]="500";//開発資材セット
  $jset[1]="0";
  $jset[2]="0";
  $jset[3]="0";
  $jset[4]="0";
  $jset[5]="7";
  $jset[6]="0";
  print_r($jset);
  echo("<br>");

$hkou[7]=abs((int)$_POST['kou']/$eset[3]);//$hkou[7]Eセット購入数
$hkou[7]=ceil($hkou[7]);

echo("Eセット購入数");
print $hkou[7];
echo("<br>");

  $hkou[0]=$eset[0]*$hkou[7];//金額 Eset購入数
  $hkou[1]=$eset[1]*$hkou[7];//燃料
  $hkou[2]=$eset[2]*$hkou[7];//弾薬
  $hkou[3]=$eset[3]*$hkou[7];//鋼材
  $hkou[4]=$eset[4]*$hkou[7];//ボーキサイト
  $hkou[5]=$eset[5]*$hkou[7];//開発資材
  $hkou[6]=$eset[6]*$hkou[7];//バケツ
  print_r($hkou);
  echo("<br>");

//残り資材
$nsi[1] = (int)$_POST['nen']-$hkou[1];
$nsi[2] = (int)$_POST['dan']-$hkou[2];
$nsi[3] = (int)$_POST['kou']-$hkou[3];
$nsi[4] = (int)$_POST['boki']-$hkou[4];
$nsi[5] = (int)$_POST['ksizai']-$hkou[5];
$goukeikin = $eset[0]*$hkou[7];
echo("残り燃料");
print $nsi[1];
echo("<br>");
echo("残り弾薬");
print $nsi[2];
echo("<br>");
echo("残り鋼材");
print $nsi[3];
echo("<br>");
echo("残りボーキ");
print $nsi[4];
echo("<br>");
echo("残り開発資材");
print $nsi[5];
echo("<br>");
echo("合計金額");
print $goukeikin;
echo("円<br>");


$hdan[7]=abs($nsi[2]/$dset[2]);//$hdan[7]Dセット購入数
$hdan[7]=ceil($hdan[7]);//切り上げ

echo("Dセット購入数");
print $hdan[7];
echo("<br>");





  $hdan[0]=$dset[0]*$hdan[7];//金額 Dセット購入数
  $hdan[1]=$dset[1]*$hdan[7];//燃料
  $hdan[2]=$dset[2]*$hdan[7];//弾薬
  $hdan[3]=$dset[3]*$hdan[7];//鋼材
  $hdan[4]=$dset[4]*$hdan[7];//ボーキサイト
  $hdan[5]=$dset[5]*$hdan[7];//開発資材
  $hdan[6]=$dset[6]*$hdan[7];//バケツ
  print_r($hdan);
  echo("<br>");
$goukeikin = $dset[0]*$hdan[7]+$goukeikin;
echo("合計金額");
print $goukeikin;
echo("円<br>");

  $gsi[1]=$hkou[1]+$hdan[1];
  $gsi[2]=$hkou[2]+$hdan[2];
  $gsi[3]=$hkou[3]+$hdan[3];
  $gsi[4]=$hkou[4]+$hdan[4];
  $gsi[5]=$hkou[5]+$hdan[5];
  $gsi[6]=$hkou[6]+$hdan[6];
  echo("資材合計");
  print_r($gsi);
  echo("<br>");
//残り資材
$nsi[1] = (int)$_POST['nen']-$gsi[1];//燃料
$nsi[2] = (int)$_POST['dan']-$gsi[2];//弾薬
$nsi[3] = (int)$_POST['kou']-$gsi[3];//鋼材
$nsi[4] = (int)$_POST['boki']-$gsi[4];//ボーキサイト
$nsi[5] = (int)$_POST['ksizai']-$gsi[5];//開発資材


echo("残り燃料");
print $nsi[1];
echo("<br>");
echo("残り弾薬");
print $nsi[2];
echo("<br>");
echo("残り鋼材");
print $nsi[3];
echo("<br>");
echo("残りボーキ");
print $nsi[4];
echo("<br>");
echo("残り開発資材");
print $nsi[5];
echo("<br>");
echo("合計金額");
print $goukeikin;
echo("円<br>");

print $heneset;
echo("<br>");

$heneset= abs($nsi[3] / $eset[3]); //eset返品鋼材数計算
echo("Eセット返品数");
print $heneset;
echo("<br>");

$heneset=ceil($heneset);//小数点切り上げ

echo("Eセット返品数切り上げ");
print $heneset;
echo("<br>");

if($hkou[7] < $heneset){
echo("Eセット返品数が購入数を上回っています。<br>");
$heneset = $hkou[7];
echo("返品数修正しました。返品数＝");
print $heneset;
echo("<br>");
}

//返品フロー　金とEセット13個分マイナス
echo("Eセット合計購入数");
$hkou[7] -=$heneset;
print $hkou[7];
echo("<br>");
//返品差し引き分合計資材
  $goukeikin -=$eset[0]*$heneset;
  $gsi[1] -=$eset[1]*$heneset;//燃料
  $gsi[2] -=$eset[2]*$heneset;//弾薬
  $gsi[3] -=$eset[3]*$heneset;//鋼材
  $gsi[4] -=$eset[4]*$heneset;//ボーキサイト
  $gsi[5] -=$eset[5]*$heneset;//開発資材
  $gsi[6] -=$eset[6]*$heneset;//バケツ
  print_r($gsi);
  echo("<br>");

//現在必要資材数
  $nsi[1] = (int)$_POST['nen']-$gsi[1];
  $nsi[2] = (int)$_POST['dan']-$gsi[2];
  $nsi[3] = (int)$_POST['kou']-$gsi[3];
  $nsi[4] = (int)$_POST['boki']-$gsi[4];
  $nsi[5] = (int)$_POST['ksizai']-$gsi[5];
  echo("現在必要資材数=");
  print_r($nsi);
  echo("<br>");

  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");


//現在必要鋼材数÷D鋼材数でDセット購入数割り出し
$bdset=$nsi[3]/$dset[3];
  echo("Dセット購入数=");
  print $bdset;
  echo("<br>");

//Dセット購入
if ($bdset > 0) {//購入個数が1以上の場合
  echo("購入数が1以上です。");
  echo("<br>");
  $hdan[7] +=bdset;
  $goukeikin +=$dset[0]*$bdset;
  $gsi[1] +=$dset[1]*$bdset;//燃料
  $gsi[2] +=$dset[2]*$bdset;//弾薬
  $gsi[3] +=$dset[3]*$bdset;//鋼材
  $gsi[4] +=$dset[4]*$bdset;//ボーキサイト
  $gsi[5] +=$dset[5]*$bdset;//開発資材
  $gsi[6] +=$dset[6]*$bdset;//バケツ

}
//現在必要資材
  $nsi[1] = (int)$_POST['nen']-$gsi[1];
  $nsi[2] = (int)$_POST['dan']-$gsi[2];
  $nsi[3] = (int)$_POST['kou']-$gsi[3];
  $nsi[4] = (int)$_POST['boki']-$gsi[4];
  $nsi[5] = (int)$_POST['ksizai']-$gsi[5];
  echo("現在必要資材数=");
  print_r($nsi);
  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");

//必要弾薬数÷Dセット弾薬数で購入数を割り出す。
$bdset=$nsi[2]/$dset[2];
$bdset=ceil($bdset);
//Dセット購入
if ($bdset > 0) {//購入個数が1以上の場合
  echo("購入数が1以上です。");
  echo("<br>");
  echo("購入数=");
  print $bdset;
  $hdan[7] +=bdset;
  echo("<br>");
  $goukeikin +=$dset[0]*$bdset;
  $gsi[1] +=$dset[1]*$bdset;//燃料
  $gsi[2] +=$dset[2]*$bdset;//弾薬
  $gsi[3] +=$dset[3]*$bdset;//鋼材
  $gsi[4] +=$dset[4]*$bdset;//ボーキサイト
  $gsi[5] +=$dset[5]*$bdset;//開発資材
  $gsi[6] +=$dset[6]*$bdset;//バケツ
}
//現在必要資材
  $nsi[1] = (int)$_POST['nen']-$gsi[1];
  $nsi[2] = (int)$_POST['dan']-$gsi[2];
  $nsi[3] = (int)$_POST['kou']-$gsi[3];
  $nsi[4] = (int)$_POST['boki']-$gsi[4];
  $nsi[5] = (int)$_POST['ksizai']-$gsi[5];
  echo("現在必要資材数=");
  print_r($nsi);
  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");


//あと燃料ボーキと開発資材をプラスの計算だけ！！
//燃料が足りていなければ
$hnen = 0;//燃料購入個数初期化
if ($nsi[1] > 0) {
  $hnen = ($nsi[1] / $bset[1]);
  $hnen = ceil($hnen);
  echo("Bセット購入数=");
  print ($hnen);
  echo("<br>");
 $gsi[1] +=$bset[1]*$hnen;
 $goukeikin +=$bset[0]*$hnen;
  echo("現在合計数=");
  print_r($gsi);
  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");

}
if ($nsi[1] < 0) {
  echo("Bセット購入の必要はありません。<br>");
}

//ボーキが足りていなければ
$hboki = 0;//ボーキ購入数初期化
if ($nsi[4] > 0) {
  echo("ボーキが足りてません。<br>");
  $hboki = ($nsi[4] / $cset[4]);
  $hboki = ceil($hboki);
  echo("Cセット購入数=");
  print ($hboki);
 $gsi[4] +=$cset[4]*$hboki;
 $goukeikin +=$cset[0]*$hboki;
  echo("現在合計数=");
  print_r($gsi);
  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");

}

if ($nsi[4] < 1) {
  echo("ボーキが足りているためCセットの購入の必要はありません。<br>");
}

//開発資材が足りていなければ
if ($nsi[5] > 0) {
  echo("開発資材が足りてません。<br>");
  $hksi = ($nsi[5] / $jset[5]);
  $hksi = ceil($hksi);
  echo("Jセット購入数=");
  print ($hksi);
 $gsi[5] +=$jset[5]*$hksi;
 $goukeikin +=$jset[0]*$hksi;
  echo("現在合計数=");
  print_r($gsi);
  echo("<br>");
  echo("合計金額");
  print $goukeikin;
  echo("円<br>");

}

if ($nsi[5] < 1) {
  echo("開発資材は足りているためjセットの購入の必要はありません。<br>");
}
echo("</div>");//ログ終了
echo("</div>");//divmain終了
echo("<div class=\"result\">");//div result
echo("<h2>result</h2>");//div result
  echo("<h3>合計金額");
  print $goukeikin;
  echo("円</h3>");
if ($hnen>0){//燃料1000個セット
  echo("<p>");
  echo("<IMG src=\"img/bset.jpg\"><br>");
  print $hnen;
  echo("個<br>");
  echo("</p>");
}

if ($hboki>0){//ボーキ550個セット
  echo("<p>");
  echo("<IMG src=\"img/cset.jpg\"><br>");
  print $hboki;
  echo("個<br>");
  echo("</p>");
}

if ($hdan[7]>0){//300円の資材セット
  echo("<p>");
  echo("<IMG src=\"img/dset.jpg\"><br>");
  print $hdan[7];
  echo("個<br>");
  echo("</p>");
}



if ($hkou[7]>0){//700円の資材セット
  echo("<p>");
  echo("<IMG src=\"img/eset.jpg\"><br>");
  print $hkou[7];
  echo("個<br>");
  echo("</p>");
}

if ($hksi>0){//開発資材セット
  echo("<p>");
  echo("<IMG src=\"img/ksi.jpg\"><br>");
  print $hksi;
  echo("個<br>");
  echo("</p>");
}
echo("</div>");//result終了

?>
</body>
</html>