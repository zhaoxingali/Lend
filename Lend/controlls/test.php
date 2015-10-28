<?php 
// $people = array(
//     array('zhangsan',20,'jike'),
//     array('lisi',21,'zheneng'),
// 	array('wanger',19,'ruanjian'),
// 	array('zhaowei',20,'zidonghua')
// );
// foreach ($people as $per) {
// 	for ($i=0; $i <count($per) ; $i++) { 
// 		echo $per[$i].'<br/>';
// 	}
// 	echo "<br/>";
// }
 
 //= == 的区别
// $a = 3;
// $b = 5;
// if($a =5 || $b = 7) {
//     $a++;
//     $b++;
// }
// echo  $a . " " . $b;


// date_default_timezone_set("PRC");//设置时间区为PRC
// $time=strtotime("-2 day",time());//当前时间减去一天
// echo date("Y-m-d H:i:s",$time)."<br>";

// $date=time()-3600*24*2;//用当前时间减去3600秒*24小时
// echo date("Y-m-d H:i:s",$date);

// echo "<table>";
// for ($i=1; $i <= 9; $i++) { 
// 	echo "<tr>";
// 	for ($j=1; $j <=$i; $j++) { 
// 		echo "<td>".$i.'x'.$j.'='.($i*$j).'</td>';
// 	}
// 	echo "</tr>";
// }
// echo "</table>";


// $array = [12,43,5,54,2,44,6,34,67,4]; 
//冒泡排序
// function bubbleSort($arr)
// {  
//   $len=count($arr);
//   //该层循环控制 需要冒泡的轮数
//   for($i=1;$i<$len;$i++)
//   { //该层循环用来控制每轮 冒出一个数 需要比较的次数
//     for($k=0;$k<$len-$i;$k++)
//     {
//        if($arr[$k]>$arr[$k+1])
//         {
//             $tmp=$arr[$k+1];
//             $arr[$k+1]=$arr[$k];
//             $arr[$k]=$tmp;
//         }
//     }
//   }
//   return $arr;
// }
// $newarray = bubbleSort($array);

//选择排序
// function selectSort($arr) {
// //双重循环完成，外层控制轮数，内层控制比较次数
//  $len=count($arr);
//     for($i=0; $i<$len-1; $i++) {
//         //先假设最小的值的位置
//         $p = $i;
//         for($j=$i+1; $j<$len; $j++) {
//             //$arr[$p] 是当前已知的最小值
//             if($arr[$p] > $arr[$j]) {
//             //比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较。
//                 $p = $j;
//             }
//         }
//         //已经确定了当前的最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
//         if($p != $i) {
//             $tmp = $arr[$p];
//             $arr[$p] = $arr[$i];
//             $arr[$i] = $tmp;
//         }
//     }
//     //返回最终结果
//     return $arr;
// }
// $newarray = selectSort($array);
// for ($j=0; $j<count($newarray) ; $j++) { 
// 	echo $newarray[$j]."  ";

// }
// $i='11';
// printf('%d',printf('%d',printf('%d',$i)));
// 
$str ="~~hello world~~";
$str = str_replace(search, replace, subject)


 ?>