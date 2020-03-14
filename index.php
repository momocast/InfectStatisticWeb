<?php

header("Content-Type: text/html;charset=utf-8");
//读取log文件 获取疫情信息
$list=glob("./log/*.txt");
//var_dump($list);
$arr = array('北京','天津','上海','重庆','河北','河南','云南','辽宁','黑龙江','湖南','安徽','山东','新疆','江苏','浙江','江西','湖北','广西','甘肃','山西','内蒙古','陕西','吉林','福建','贵州','广东','青海','西藏','四川','宁夏','海南','台湾','香港','澳门');
$info=array();
$yes=array();
$all=array();
$all['suspected']='0';
$all['infected']='0';
$all['severe']='0';
$all['cumulative']='0';
$all['cured']='0';
$all['dead']='0';
$aall=array();
$yall=array();
$yall['suspected']='0';
$yall['infected']='0';
$yall['severe']='0';
$yall['cumulative']='0';
$yall['cured']='0';
$yall['dead']='0';
$liner=array();
for($i=0;$i<count($arr);$i++){
    $t=array();
    $t['province']=$arr[$i];
    $t['suspected']='0';
    $t['infected']='0';
    $t['severe']='0';
    $t['cumulative']='0';
    $t['cured']='0';
    $t['dead']='0';
    $info[$i]=$t;
    $yes[$i]=$t;
}
$a=0;
$b=0;
for($j=0;$j<count($list);$j++){
    $date=substr(mb_convert_encoding($list[$j], 'utf-8', 'gbk'), 6,10);
    for($i=0;$i<count($arr);$i++){
        $t=array();
        $t['dateprovince']=$date.$arr[$i];
        $t['suspected']='0';
        $t['infected']='0';
        $t['cured']='0';
        $t['dead']='0';
        $liner[$a++]=$t;
    }
    $aa=array();
    $aa['date']=$date;
    $aa['suspected']='0';
    $aa['infected']='0';
    $aa['cured']='0';
    $aa['dead']='0';
    $aall[$b++]=$aa;
    echo "<input value=$date name=ttt style=\"display: none;\"/>";
}
//echo $line['1']['infected'];
$arr2 = array_column($info, 'province');
$arr3 = array_column($liner, 'dateprovince');
$arr4= array_column($aall, 'date');
//var_dump($arr4);
for($i=0;$i<count($list);$i++){
    $file = fopen($list[$i], "r") or exit("Unable to open file!");
    $date=substr(mb_convert_encoding($list[$i], 'utf-8', 'gbk'), 6,10);
    while(!feof($file))
    {
        $line=fgets($file);
        
        $line=str_replace(" ","_",$line);
        
        $arr = explode('_' , $line);
        if(count($arr)<2)
            continue;
            if(count($arr)==4){
                $count=substr(mb_convert_encoding($arr[3], 'utf-8', 'gbk'), 0,-5);
                $key = array_search(mb_convert_encoding($arr[0], 'utf-8', 'gbk'),$arr2);
                $key2 = array_search($date.mb_convert_encoding($arr[0], 'utf-8', 'gbk'),$arr3);
                $key3 = array_search($date,$arr4);
                if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="新增"){   
                    if(mb_convert_encoding($arr[2], 'utf-8', 'gbk')=="感染患者"){
                        $info[$key]['infected']+=$count;
                        $all['infected']+=$count;
                        $liner[$key2]['infected']+=$count;
                        $aall[$key3]['infected']+=$count;
                        $info[$key]['cumulative']+=$count;
                        $all['cumulative']+=$count;
                    }
                    else{
                        $info[$key]['suspected']+=$count;
                        $liner[$key2]['suspected']+=$count;
                        $aall[$key3]['suspected']+=$count;
                        $all['suspected']+=$count;
                    }
                        
                }
                if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="排除"){
                    $info[$key]['suspected']-=$count;
                    $liner[$key2]['suspected']-=$count;
                    $aall[$key3]['suspected']-=$count;
                    $all['suspected']-=$count;
                }
                if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="疑似患者"){
                    $info[$key]['suspected']-=$count;
                    $info[$key]['infected']+=$count;
                    $liner[$key2]['suspected']-=$count;
                    $liner[$key2]['infected']+=$count;
                    $aall[$key3]['suspected']-=$count;
                    $aall[$key3]['infected']+=$count;
                    $all['suspected']-=$count;
                    $all['infected']+=$count;
                    
                }
            }
            else{
                $count=substr(mb_convert_encoding($arr[2], 'utf-8', 'gbk'), 0,-5);
                $key = array_search(mb_convert_encoding($arr[0], 'utf-8', 'gbk'),$arr2);
                if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="死亡"){
                    $info[$key]['infected']-=$count;
                    $info[$key]['dead']+=$count;
                    $liner[$key2]['infected']-=$count;
                    $liner[$key2]['dead']+=$count;
                    $aall[$key3]['infected']-=$count;
                    $aall[$key3]['dead']+=$count;
                    $all['infected']-=$count;
                    $all['dead']+=$count;
                }
                else{
                    $info[$key]['infected']-=$count;                    
                    $info[$key]['cured']+=$count;
                    $liner[$key2]['infected']-=$count;
                    $liner[$key2]['cured']+=$count;
                    $aall[$key3]['infected']-=$count;
                    $aall[$key3]['cured']+=$count;
                    $all['infected']-=$count;
                    $all['cured']+=$count;
                }
            }
            if($i==count($list)-1){
                if(count($arr)==4){
                    $count=substr(mb_convert_encoding($arr[3], 'utf-8', 'gbk'), 0,-5);
                    $key = array_search(mb_convert_encoding($arr[0], 'utf-8', 'gbk'),$arr2);
                    if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="新增"){
                        if(mb_convert_encoding($arr[2], 'utf-8', 'gbk')=="感染患者"){
                            $yes[$key]['infected']+=$count;
                            $yes[$key]['cumulative']+=$count;
                            $yall['infected']+=$count;
                            $yall['cumulative']+=$count;
                        }
                        else{
                            $yes[$key]['suspected']+=$count;
                            $yall['suspected']+=$count;
                        }
                        
                    }
                    if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="排除"){
                        $yes[$key]['suspected']-=$count;
                        $yall['suspected']-=$count;
                    }
                    if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="疑似患者"){
                        $yes[$key]['suspected']-=$count;
                        $yes[$key]['infected']+=$count;
                        $yall['suspected']-=$count;
                        $yall['infected']+=$count;
                    }
                }
                else{
                    //var_dump($arr);
                    $count=substr(mb_convert_encoding($arr[2], 'utf-8', 'gbk'), 0,-5);
                    $key = array_search(mb_convert_encoding($arr[0], 'utf-8', 'gbk'),$arr2);
                    if(mb_convert_encoding($arr[1], 'utf-8', 'gbk')=="死亡"){
                        $yes[$key]['infected']-=$count;
                        $yes[$key]['dead']+=$count;
                        $yall['infected']-=$count;
                        $yall['dead']+=$count;
                    }
                    else{
                        $yes[$key]['infected']-=$count;
                        $yes[$key]['cured']+=$count;
                        $yall['infected']-=$count;
                        $yall['cured']+=$count;
                    }
                }
            }
            //var_dump($arr);
            //echo "<br>";
            
    }
    fclose($file);
}
//var_dump($info);
$a='suspected';
$b='infected';
$c='severe';
$d='cumulative';
$e='cured';
$f='dead';
for($i=0;$i<count($info);$i++){
    $province=$info[$i]['province'];
    $suspected=$info[$i]['suspected'];
    $infected=$info[$i]['infected'];
    $severe=$info[$i]['severe'];
    $cumulative=$info[$i]['cumulative'];
    $cured=$info[$i]['cured'];
    $dead=$info[$i]['dead'];
    $yprovince=$yes[$i]['province'];
    $ysuspected=$yes[$i]['suspected'];
    $yinfected=$yes[$i]['infected'];
    $ysevere=$yes[$i]['severe'];
    $ycumulative=$yes[$i]['cumulative'];
    $ycured=$yes[$i]['cured'];
    $ydead=$yes[$i]['dead'];
    $y='y';
    echo "<input value=$suspected id=$province$a style=\"display: none;\"/>";
    echo "<input value=$infected id=$province$b style=\"display: none;\"/>";
    echo "<input value=$severe id=$province$c style=\"display: none;\"/>";
    echo "<input value=$cumulative id=$province$d style=\"display: none;\"/>";
    echo "<input value=$cured id=$province$e style=\"display: none;\"/>";
    echo "<input value=$dead id=$province$f style=\"display: none;\"/>";
    echo "<input value=$ysuspected id=$province$y$a style=\"display: none;\"/>";
    echo "<input value=$yinfected id=$province$y$b style=\"display: none;\"/>";
    echo "<input value=$ysevere id=$province$y$c style=\"display: none;\"/>";
    echo "<input value=$ycumulative id=$province$y$d style=\"display: none;\"/>";
    echo "<input value=$ycured id=$province$y$e style=\"display: none;\"/>";
    echo "<input value=$ydead id=$province$y$f style=\"display: none;\"/>";
}
for($i=0;$i<count($liner);$i++){
    $name=substr($liner[$i]['dateprovince'],10);
    $suspected=$liner[$i]['suspected'];
    $infected=$liner[$i]['infected'];
    $cured=$liner[$i]['cured'];
    $dead=$liner[$i]['dead'];
    echo "<input value=$suspected name=s$name style=\"display: none;\"/>";
    echo "<input value=$infected name=i$name style=\"display: none;\"/>";
    echo "<input value=$cured name=c$name style=\"display: none;\"/>";
    echo "<input value=$dead name=d$name style=\"display: none;\"/>";
}
for($i=0;$i<count($aall);$i++){
    $suspected=$aall[$i]['suspected'];
    $infected=$aall[$i]['infected'];
    $cured=$aall[$i]['cured'];
    $dead=$aall[$i]['dead'];
    echo "<input value=$suspected name=s全国 style=\"display: none;\"/>";
    echo "<input value=$infected name=i全国 style=\"display: none;\"/>";
    echo "<input value=$cured name=c全国 style=\"display: none;\"/>";
    echo "<input value=$dead name=d全国 style=\"display: none;\"/>";
}
?>
<script src="./echart/echarts.min.js"></script>
<script type="text/javascript" src="./china.js"></script>
<link rel="stylesheet" href="./index.css">
<!DOCTYPE html>

<html style="height: 100%">
   <head>
       <meta charset="utf-8">
   </head>
   
   <div class='con'>
   <span class='type'>数据更新至：2020-02-02</span>
   <span id='test' class='type'>全国</span>
   		<li class='info'>
   			<span class='type'>现有确诊</span>
   			<span id='infected' class='num' style='color:#ff6857'><?=$all['infected'] ?></span>
   			<span id='yinfected' class='change'>昨日：<?=$yall['infected'] ?></span>
   		</li>
   		<li class='info'>
   			<span class='type'>现有疑似</span>
   			<span id='suspected' class='num' style='color:#ec9217'><?=$all['suspected'] ?></span>
   			<span id='ysuspected' class='change'>昨日：<?=$yall['suspected'] ?></span>
   		</li>
   		<li class='info'>
   			<span class='type'>现有重症</span>
   			<span id='severe' class='num' style='color:#466da0'><?=$all['severe'] ?></span>
   			<span id='ysevere' class='change'>昨日：<?=$yall['severe'] ?></span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计确诊</span>
   			<span id='cumulative' class='num' style='color:#e83132'><?=$all['cumulative'] ?></span>
   			<span id='ycumulative' class='change'>昨日：<?=$yall['cumulative'] ?></span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计治愈</span>
   			<span id='cured' class='num' style='color:#40b0b5'><?=$all['cured'] ?></span>
   			<span id='ycured' class='change'>昨日：<?=$yall['cured'] ?></span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计死亡</span>
   			<span id='dead' class='num' style='color:#4d5054'><?=$all['dead'] ?></span>
   			<span id='ydead' class='change'>昨日：<?=$yall['dead'] ?></span>
   		</li>
   </div>
   <body style="height: 1000px;  margin:100px auto;">
       <div id="container" style="height: 1000px"></div>
<script type="text/javascript" src="./cal.js"></script>
       <div id="main" style="width: 1000px;height:600px;margin:0 auto;"></div>
       <div class='option' id='oa'>

       		<span class='type'>新增</span>
       		<span class='type'>确诊趋势</span>
       </div>
       <div class='option' id='ob'>

       		<span class='type'>新增</span>
       		<span class='type'>疑似趋势</span>
       </div>
       <div class='option' id='oc'>

       		<span class='type'>新增</span>
       		<span class='type'>治愈趋势</span>
       </div>
       <div class='option' id='od'>

       		<span class='type'>新增</span>
       		<span class='type'>死亡趋势</span>
       </div>
       <script type="text/javascript" src="./line.js"></script>
   </body>
</html> 