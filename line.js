(function(){
	var list = document.getElementsByName('iall');
	var data = [];
	var time = document.getElementsByName('ttt');
	console.log(time.length);
	for(var i=0;i<list.length;i++){
		console.log(time[i].value);
		data.push({
	        value: [time[i].value, list[i].value],
	    });
	}
	    //这里可以循环出每个元素对象
		

    
    var anchor = [

        ];
	 echarts.init(document.getElementById('main')).setOption({
		 title: {
             text: '动态数据 + 时间坐标轴'
         },
         tooltip: {
             trigger: 'axis',
             formatter: function (params) {
                 params = params[0];
                 var date = new Date(params.name);
                 return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + ' : ' + params.value[1];
             },
             axisPointer: {
                 animation: false
             }
         },
         xAxis: {
             type: 'time',
             splitLine: {
                 show: false
             }
         },
         yAxis: {
             type: 'value',
             boundaryGap: [0, '100%'],
             splitLine: {
                 show: false
             }
         },
         series: [{
             name: '模拟数据',
             type: 'line',
             showSymbol: false,
             hoverAnimation: false,
             data: data,
             smooth:true
         },
         {
             name:'.anchor',
             type:'line', 
             showSymbol:false, 
             data:anchor,
             itemStyle:{normal:{opacity:0}},
             lineStyle:{normal:{opacity:0}}
         }]
     });

})();