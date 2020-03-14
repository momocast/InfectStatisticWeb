(function(){
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
	                {name: '北京',value: document.getElementById('北京'+'infected').value},
	                {name: '天津',value: document.getElementById('天津'+'infected').value},
	                {name: '上海',value: document.getElementById('上海'+'infected').value},
	                {name: '重庆',value: document.getElementById('重庆'+'infected').value},
	                {name: '河北',value: document.getElementById('河北'+'infected').value},
	                {name: '河南',value: document.getElementById('河南'+'infected').value},
	                {name: '云南',value: document.getElementById('云南'+'infected').value},
	                {name: '辽宁',value: document.getElementById('辽宁'+'infected').value},
	                {name: '黑龙江',value: document.getElementById('黑龙江'+'infected').value},
	                {name: '湖南',value: document.getElementById('湖南'+'infected').value},
	                {name: '安徽',value: document.getElementById('安徽'+'infected').value},
	                {name: '山东',value: document.getElementById('山东'+'infected').value},
	                {name: '新疆',value: document.getElementById('新疆'+'infected').value},
	                {name: '江苏',value: document.getElementById('江苏'+'infected').value},
	                {name: '浙江',value: document.getElementById('浙江'+'infected').value},
	                {name: '江西',value: document.getElementById('江西'+'infected').value},
	                {name: '湖北',value: document.getElementById('湖北'+'infected').value},
	                {name: '广西',value: document.getElementById('广西'+'infected').value},
	                {name: '甘肃',value: document.getElementById('甘肃'+'infected').value},
	                {name: '山西',value: document.getElementById('山西'+'infected').value},
	                {name: '内蒙古',value: document.getElementById('内蒙古'+'infected').value},
	                {name: '陕西',value: document.getElementById('陕西'+'infected').value},
	                {name: '吉林',value: document.getElementById('吉林'+'infected').value},
	                {name: '福建',value: document.getElementById('福建'+'infected').value},
	                {name: '贵州',value: document.getElementById('贵州'+'infected').value},
	                {name: '广东',value: document.getElementById('广东'+'infected').value},
	                {name: '青海',value: document.getElementById('青海'+'infected').value},
	                {name: '西藏',value: document.getElementById('西藏'+'infected').value},
	                {name: '四川',value: document.getElementById('四川'+'infected').value},
	                {name: '宁夏',value: document.getElementById('宁夏'+'infected').value},
	                {name: '海南',value: document.getElementById('海南'+'infected').value},
	                {name: '台湾',value: document.getElementById('台湾'+'infected').value},
	                {name: '香港',value: document.getElementById('香港'+'infected').value},
	                {name: '澳门',value: document.getElementById('澳门'+'infected').value}
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
	    var test = document.getElementById('suspected');
	    test.innerHTML=document.getElementById(params.name+'suspected').value;
	    var test = document.getElementById('infected');
	    test.innerHTML=document.getElementById(params.name+'infected').value;
	    var test = document.getElementById('severe');
	    test.innerHTML=document.getElementById(params.name+'severe').value;
	    var test = document.getElementById('cumulative');
	    test.innerHTML=document.getElementById(params.name+'cumulative').value;
	    var test = document.getElementById('cured');
	    test.innerHTML=document.getElementById(params.name+'cured').value;
	    var test = document.getElementById('dead');
	    test.innerHTML=document.getElementById(params.name+'dead').value;

	    var test = document.getElementById('ysuspected');
	    test.innerHTML="昨日："+document.getElementById(params.name+'ysuspected').value;
	    var test = document.getElementById('yinfected');
	    test.innerHTML="昨日："+document.getElementById(params.name+'yinfected').value;
	    var test = document.getElementById('ysevere');
	    test.innerHTML="昨日："+document.getElementById(params.name+'ysevere').value;
	    var test = document.getElementById('ycumulative');
	    test.innerHTML="昨日："+document.getElementById(params.name+'ycumulative').value;
	    var test = document.getElementById('ycured');
	    test.innerHTML="昨日："+document.getElementById(params.name+'ycured').value;
	    var test = document.getElementById('ydead');
	    test.innerHTML="昨日："+document.getElementById(params.name+'ydead').value;
	});
})();