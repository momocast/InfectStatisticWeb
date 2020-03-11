<?php

?>
<script src="./echart/echarts.min.js"></script>
<script type="text/javascript" src="./china.js"></script>
<!DOCTYPE html>
<style>
    .info{
        height:100px;
        width:300px;
        margin:16.6px;
        background-color:white;
        float:left;
        list-style:none;
    }
    .con{
        height:270px;
        width:1000px;
        margin:100px auto;
    }
    .type{
        display:block;
        margin:5px auto;
        font-size:1.2em;
        text-align:center;
    }
    .num{
        display:block;
        margin:0px auto;
        font-size:2em;
        text-align:center;
        font-weight:700;
    }
    .change{
        display:block;
        margin:3px auto;
        font-size:0.8em;
        text-align:center;
    }
</style>
<html style="height: 100%">
   <head>
       <meta charset="utf-8">
   </head>
   
   <div class='con'>
   <span id='test' class='type'>全国</span>
   		<li class='info'>
   			<span class='type'>现有确诊</span>
   			<span class='num' style='color:#ff6857'>22264</span>
   			<span class='change'>昨日</span>
   		</li>
   		<li class='info'>
   			<span class='type'>现有疑似</span>
   			<span class='num' style='color:#ec9217'>502</span>
   			<span class='change'>昨日</span>
   		</li>
   		<li class='info'>
   			<span class='type'>现有重症</span>
   			<span class='num' style='color:#466da0'>5489</span>
   			<span class='change'>昨日</span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计确诊</span>
   			<span class='num' style='color:#e83132'>80814</span>
   			<span class='change'>昨日</span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计治愈</span>
   			<span class='num' style='color:#40b0b5'>55477</span>
   			<span class='change'>昨日</span>
   		</li>
   		<li class='info'>
   			<span class='type'>累计死亡</span>
   			<span class='num' style='color:#4d5054'>3073</span>
   			<span class='change'>昨日</span>
   		</li>
   </div>
   <body style="height: 1000px;  margin:100px auto;">
       <div id="container" style="height: 1000px"></div>

       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title : {
        text: '疫情人数',
        left: 'center'
    },
    tooltip : {
        trigger: 'item'
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data:['iphone']
    },
    visualMap: {
        min: 0,
        max: 2500,
        left: 'left',
        top: 'bottom',
        text:['高','低'],           // 文本，默认为数值文本
        calculable : true
    },
    toolbox: {
        show: true,
        orient : 'vertical',
        left: 'right',
        top: 'center',
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    series : [
        {
            name: '人数',
            type: 'map',
            mapType: 'china',
            roam: false,
            label: {
                normal: {
                    show: true
                },
                emphasis: {
                    show: true
                }
            },
            data:[
                {name: '北京',value: Math.round(Math.random()*1000)},
                {name: '天津',value: Math.round(Math.random()*1000)},
                {name: '上海',value: Math.round(Math.random()*1000)},
                {name: '重庆',value: Math.round(Math.random()*1000)},
                {name: '河北',value: Math.round(Math.random()*1000)},
                {name: '河南',value: Math.round(Math.random()*1000)},
                {name: '云南',value: Math.round(Math.random()*1000)},
                {name: '辽宁',value: Math.round(Math.random()*1000)},
                {name: '黑龙江',value: Math.round(Math.random()*1000)},
                {name: '湖南',value: Math.round(Math.random()*1000)},
                {name: '安徽',value: Math.round(Math.random()*1000)},
                {name: '山东',value: Math.round(Math.random()*1000)},
                {name: '新疆',value: Math.round(Math.random()*1000)},
                {name: '江苏',value: Math.round(Math.random()*1000)},
                {name: '浙江',value: Math.round(Math.random()*1000)},
                {name: '江西',value: Math.round(Math.random()*1000)},
                {name: '湖北',value: Math.round(Math.random()*1000)},
                {name: '广西',value: Math.round(Math.random()*1000)},
                {name: '甘肃',value: Math.round(Math.random()*1000)},
                {name: '山西',value: Math.round(Math.random()*1000)},
                {name: '内蒙古',value: Math.round(Math.random()*1000)},
                {name: '陕西',value: Math.round(Math.random()*1000)},
                {name: '吉林',value: Math.round(Math.random()*1000)},
                {name: '福建',value: Math.round(Math.random()*1000)},
                {name: '贵州',value: Math.round(Math.random()*1000)},
                {name: '广东',value: Math.round(Math.random()*1000)},
                {name: '青海',value: Math.round(Math.random()*1000)},
                {name: '西藏',value: Math.round(Math.random()*1000)},
                {name: '四川',value: Math.round(Math.random()*1000)},
                {name: '宁夏',value: Math.round(Math.random()*1000)},
                {name: '海南',value: Math.round(Math.random()*1000)},
                {name: '台湾',value: Math.round(Math.random()*1000)},
                {name: '香港',value: Math.round(Math.random()*1000)},
                {name: '澳门',value: Math.round(Math.random()*1000)}
            ]
        }
    ]
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
myChart.on('click', function (params) {
    var city = params.name;
    var test = document.getElementById('test');
    test.innerHTML=city;
});
       </script>
   </body>
</html> 