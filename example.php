include "Goon.php";
$n=new goon;
$r=$n->match(122.67,180.90); // boy - moon Degree , girl - moon Degree
echo "<table>";
foreach($r as $k=>$v){
echo "<tr>";
foreach($v as $kk=>$vv){
echo "<td>".$vv."</td>";
}
echo "</tr>";
}
echo "</table>";
