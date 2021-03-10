<?php
class Goon{
function match($b,$g){
if(($b>=0 && $b<360) && ($g>=0 && $g<360) )
{    
    $this->b=$b;
    $this->g=$g;
}
else
return false;
    
    $this->UD =["Revati","Ashvini","Bharani","Kritika","Rohini","Mrigashira","Ardra","Punarvasu","Pushya","Ashlesha","Magha","Purva Phalguni","Uttara Phalguni","Hasta","Chitra","Swati","Vishakha","Anuradha","Jyeshtha","Mula","Purva Ashadha","Uttara Ashadha","Shravan","Dhanistha","Shatabhishaj","Purva Bhadrapad","Uttara Bhadrapad","Revati"];
    $this->asRashi = ["Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpius","Sagittarius","Capricornus","Aquarius","Pisces"];
    $this->swami=["Mars","Venus","Mercury","Moon","Sun","Mercury","Venus","Mars","Jupiter","Saturn","Saturn","Jupiter"];
$out=[];
$r = $this->nak();
$out[]=['Nakshtra',$r[0],$r[1],''];
$r = $this->rashi();
$out[]=['Zodiac',$r[0],$r[1],''];
$out[]=['Moon',number_format((float)$b, 2, '.', ''),number_format((float)$g, 2, '.', ''),''];
$r = $this->vran();
$out[]=['Varna',$r[1],$r[2],$r[0]];
$total = $r[0];
$r =$this->vashya();
$out[]=['Vasya',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r =$this->tara();
$out[]=['Tara',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r =$this->yoni();
$out[]=['Yoni',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r =$this->matri();
$out[]=['Matri',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r=$this->gun();
$out[]=['Gana',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r = $this->bhakoot();
$out[]=['Bhakoot',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$r =$this->naadi();
$out[]=['Nadi',$r[1],$r[2],$r[0]];
$total = $total + $r[0];
$out[]=['<b>Total</b>','','','<b>'.$total.'</b>/36'];
return $out;
}
function nak(){
    $g=ceil($this->g/(800/60));
$b=ceil($this->b/(800/60));
return [$this->UD[$b].' ['.$b.']',$this->UD[$g].' ['.$g.']']; 
}

function rashi(){
$g=intval($this->g/30);
$b=intval($this->b/30);

return [$this->asRashi[$b],$this->asRashi[$g]]; 
}

function bhakoot(){
            $g=intval($this->g/30);
$b=intval($this->b/30);
    
$bb=fmod((12+($g))-($b),12);
$gg=fmod((12+($b))-($g),12);
$b1=fmod($bb+1,12);
$g1=fmod($gg+1,12);

    if(($g1 == 2 && $b1 == 12 || $g1 == 12 && $b1 == 2) || ($g1 == 5 && $b1 == 9 || $g1 == 9 && $b1 == 5) || ($g1 == 6 && $b1 == 8 || $g1 == 8 && $b1 == 6))
$gk=0;
else
    $gk=7;
return [$gk,$this->asRashi[$b],$this->asRashi[$g]];
        }

function matri(){
        $g=intval($this->g/30);
$b=intval($this->b/30);
    $ex=[2,5,3,1,0,3,5,2,4,6,6,4];    
$nadi=array(
[5,5,5,4,5,0,0],
[5,5,4,1,4,0.5,0.5],
[5,4,5,0.5,5,3,0.5],
[4,1,0.5,5,0.5,5,4],
[5,4,5,0.5,5,0.5,0.5,3],
[0,0.5,3,5,0.5,5,5],
[0,0.5,0.5,4,3,5,5]);
return [$nadi[$ex[$g]][$ex[$b]],$this->swami[$b],$this->swami[$g]];
}    

function yoni(){
        $g=ceil($this->g/(800/60));
$b=ceil($this->b/(800/60));
$yoni=["Horse", "Yard", "Mesh", "Snake", "Dog", "Marjar", "Mouse", "Cow", "mahish", "Tiger", "Deer", "Monkey", "nakul ","Lion"];
$yoni1=array([1,24],[2,27],[3,8],[4,5],[6,19],[7,9],[10,11],[12,26],[13,15],[14,16],[17,18],[20,22],[21,21],[23,25]);
foreach($yoni1 as $k=>$v)
{
if (in_array($g, $v))
$gg=$k;
if (in_array($b, $v))
$bb=$k;    
}
    $nadi=array(
    [4,0,1,2,3,2,2,1,3,2,3,3,1,3],
    [0,4,1,3,3,2,2,2,2,2,2,2,1,3],
    [1,1,4,0,1,2,2,2,1,1,2,1,2,1],
    [2,2,0,4,2,2,2,2,2,2,3,2,1,2],
    [3,3,1,2,4,0,3,1,3,2,3,2,1,3],
    [2,2,2,2,0,4,2,1,2,2,2,2,1,2],
    [2,2,2,2,3,2,4,0,2,1,2,2,2,2],
    [1,2,2,2,1,1,0,4,1,1,1,1,2,1],
    [3,3,1,2,3,2,2,1,4,0,2,2,1,2],
    [2,2,1,2,2,2,1,1,0,4,1,1,1,1],
    [3,2,2,3,3,2,2,1,2,1,4,0,2,2],
    [3,2,1,2,2,2,2,1,2,1,0,4,2,2],
    [1,1,2,1,1,1,2,2,1,1,2,2,4,0],
    [3,3,1,2,3,2,2,1,2,1,2,2,0,4]
    );    
return [$nadi[$gg][$bb],$yoni[$bb],$yoni[$gg]];
}

function tara(){


    $g=ceil($this->g/(800/60));
$b=ceil($this->b/(800/60));
        $na=["janm taara","sampat taara"," vipat taara","kshem taara ","pratyari taara ","saadhak taara","vadh taara","mitr taara","ati mitr taara"];

    $tara=[2,4,6];

$bb=fmod((27+($g))-($b),27);
$gg=fmod((27+($b))-($g),27);
$bb=fmod($bb+1,9);
$gg=fmod($gg+1,9);

if(in_array($gg,$tara))
    $g=0;
else
    $g=1.5;

if(in_array($bb,$tara))
    $b=0;
else
    $b=1.5;
return [($b+$g),$na[$bb],$na[$gg]];
}

function vashya(){
    
$g=$this->g;
$b=$this->b;
$ax=["Man", "quadruped", "watering", "lion", "scorpio"];
$n[0]=array([60,90],[150,180],[180,210],[240,255],[300,330]);
$n[1]=array([0,30],[30,60],[255,270],[270,285]);
$n[2]=array([90,120],[285,300],[330,360]);
$n[3]=array();
$n[4]=array();
$bb=0;
$gg=0;
foreach($n as $k=>$v){
    if(is_array($v)){    
        foreach($v as $kk=>$vv){
            if ($g < $vv[1] && $g >= $vv[0])
            $gg=$k;
            if ($b < $vv[1] && $b >= $vv[0])
            $bb=$k;
        }
    }
}
$nadi=array([2,0,0,0.5,0],[1,2,1,0.5,1],[0.5,1,2,1,1],[0,0,0,2,0],[1,1,1,0,2]);    
return [$nadi[$gg][$bb],$ax[$bb],$ax[$gg]];
}
    
function vran(){
$g=ceil($this->g/30);
$b=ceil($this->b/30);
$ax= ["Brahmin", "Kshatriya", "Vaishya", "Shudra"];
$varn=array(array(4,8,12),array(1,5,9),array(2,6,10),array(3,7,11));
    foreach($varn as $k=>$v){
if (in_array($g, $v))
$gg=$k;
if (in_array($b, $v))
$bb=$k;
}

$nadi=array([1,0,0,0],[1,1,0,0],[1,1,1,0],[1,1,1,1]);    
return [$nadi[$gg][$bb],$ax[$bb],$ax[$gg]];
}

function gun(){
            $g=ceil($this->g/(800/60));
$b=ceil($this->b/(800/60));
$dev=array([17,7,5,22,27,15,13,1,8],[11,20,25,12,21,26,4,2,6],[10,9,23,18,19,24,16,3,14]);
$boys=array("God" => 0, "man" => 1, "monster" => 2);

$bo=array (0 => "dev", 1 => "man", 2 => "monster");
foreach($dev as $k=>$v){
if (in_array($g, $v))
$gg=$k;
if (in_array($b, $v))
$bb=$k;
}
$gun=array(array(6,5,1),array(6,6,0),array(0,0,6));
return [$gun[$gg][$bb], $bo[$bb], $bo[$gg]];
}

function naadi(){
            $g=ceil($this->g/(800/60));
$b=ceil($this->b/(800/60));
$nadi=array([1,6,7,12,13,18,19,24,25],[2,5,8,11,14,17,20,23,26],[3,4,9,10,15,16,21,22,27]);    
$anadi=["Adi nadi", "middle nadi", "end nadi"];
foreach($nadi as $k=>$v){
if (in_array($g, $v))
$gg=$k;
if (in_array($b, $v))
$bb=$k;
}
if($bb == $gg)
    $b=0;
else
    $b= 8;

return [$b, $anadi[$bb], $anadi[$gg]];
}
}
