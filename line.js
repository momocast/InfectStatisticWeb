(function(){
	var list = document.getElementsByName('i全国');
	var data = [];
	var time = document.getElementsByName('ttt');
	for(var i=0;i<list.length;i++){
		data.push({
	        value: [time[i].value, list[i].value],
	    });
	}
	    //这里可以循环出每个元素对象
		

    
    var anchor = [

        ];
	 echarts.init(document.getElementById('main')).setOption({
		 title: {
             text: '全国'
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
	 var option=document.getElementById('oa');
	 addEvent(option, 'click', function(e){
		 document.getElementById('oa').className='aoption';
		 var a = document.getElementById('ob');
		 var b = document.getElementById('oc');
		 var c = document.getElementById('od');
		 a.className='option';
		 b.className='option';
		 c.className='option';
		 var data = [];
			var time = document.getElementsByName('ttt');
			var test = document.getElementById('test');
			var list = document.getElementsByName('i'+test.innerHTML);
			for(var i=0;i<list.length;i++){
				console.log(time[i].value);
				data.push({
			        value: [time[i].value, list[i].value],
			    });
			}
		    echarts.init(document.getElementById('main')).setOption({
		    	title: {
		             text: test.innerHTML
		         },
		         series: [{
		             data: data  // 点坐标[x,y]
		         }]
		    });
     });
	 var option=document.getElementById('ob');
	 addEvent(option, 'click', function(e){
		 document.getElementById('ob').className='aoption';
		 var a = document.getElementById('oa');
		 var b = document.getElementById('oc');
		 var c = document.getElementById('od');
		 a.className='option';
		 b.className='option';
		 c.className='option';
		 var data = [];
			var time = document.getElementsByName('ttt');
			var test = document.getElementById('test');
			var list = document.getElementsByName('s'+test.innerHTML);
			for(var i=0;i<list.length;i++){
				console.log(time[i].value);
				data.push({
			        value: [time[i].value, list[i].value],
			    });
			}
		    echarts.init(document.getElementById('main')).setOption({
		    	title: {
		             text: test.innerHTML
		         },
		         series: [{
		             data: data  // 点坐标[x,y]
		         }]
		    });
     });
	 var option=document.getElementById('oc');
	 addEvent(option, 'click', function(e){
		 document.getElementById('oc').className='aoption';
		 var a = document.getElementById('ob');
		 var b = document.getElementById('oa');
		 var c = document.getElementById('od');
		 a.className='option';
		 b.className='option';
		 c.className='option';
		 var data = [];
			var time = document.getElementsByName('ttt');
			var test = document.getElementById('test');
			var list = document.getElementsByName('c'+test.innerHTML);
			for(var i=0;i<list.length;i++){
				console.log(time[i].value);
				data.push({
			        value: [time[i].value, list[i].value],
			    });
			}
		    echarts.init(document.getElementById('main')).setOption({
		    	title: {
		             text: test.innerHTML
		         },
		         series: [{
		             data: data  // 点坐标[x,y]
		         }]
		    });
     });
	 var option=document.getElementById('od');
	 addEvent(option, 'click', function(e){
		 option.className='aoption';
		 var a = document.getElementById('ob');
		 var b = document.getElementById('oc');
		 var c = document.getElementById('oa');
		 a.className='option';
		 b.className='option';
		 c.className='option';
		 var data = [];
			var time = document.getElementsByName('ttt');
			var test = document.getElementById('test');
			var list = document.getElementsByName('d'+test.innerHTML);
			for(var i=0;i<list.length;i++){
				console.log(time[i].value);
				data.push({
			        value: [time[i].value, list[i].value],
			    });
			}
		    echarts.init(document.getElementById('main')).setOption({
		    	title: {
		             text: test.innerHTML
		         },
		         series: [{
		             data: data  // 点坐标[x,y]
		         }]
		    });
     });
	 function addEvent(dom, eType, func) {
		    if(dom.addEventListener) {  // DOM 2.0
		      dom.addEventListener(eType, function(e){
		        func(e);
		      });
		    } else if(dom.attachEvent){  // IE5+
		      dom.attachEvent('on' + eType, function(e){
		        func(e);
		      });
		    } else {  // DOM 0
		      dom['on' + eType] = function(e) {
		        func(e);
		      }
		    }
	 }
})();