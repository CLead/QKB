$(document).ready(function(){
	
	ChartAjax();
	var tid = setInterval(ChartAjax, 190000);


		function ChartAjax()
		{
			$.ajax(
				{
					method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/BestCallClosers",
                    dataType: "json",
					success: function (data) 
						{
							PlotChart(data);
                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                    	{

                        },
                     complete: function (xhr, status) 
                     	{

							var data = xhr.responseText; 

						}
				});
		};

		function PlotChart(data)
		{
			//alert(data);
			var MonthData = data[0].MonthData;
			var WeekData = data[0].WeekData;

			var MonthLabels = [];
			var MonthPoint = [];

			var WeekLabels = [];
			var WeekPoint = [];
			$.each(MonthData, function (index, data)
			{
				MonthLabels.push(data.Name);
				MonthPoint.push(data.Count);
			});
			$.each(WeekData, function (index, data)
			{
				WeekLabels.push(data.Name);
				WeekPoint.push(data.Count);
			});

			var Colours = [
						'rgba(54, 235, 127, 0.5)',
						'rgba(99, 237, 107, 0.5)',
						'rgba(144, 239, 86, 0.5)',
						'rgba(189, 240, 64, 0.5)',
						'rgba(232, 242, 43, 0.5)'
		            ];
			var Backgrounds = [

						'rgba(54, 235, 127, 1)',
						'rgba(99, 237, 107, 1)',
						'rgba(144, 239, 86, 1)',
						'rgba(189, 240, 64, 1)',
						'rgba(232, 242, 43, 1)'

		            ];


			var ChartDataM = 
			{
				labels: MonthLabels,
				datasets: [
					{label: "This Month", data: MonthPoint, fontColor: 'rgb(100,200,200)', borderWidth: 2, backgroundColor: Colours, borderColor: Backgrounds}
					]
			}

			var ChartDataW = 
			{
				labels: WeekLabels,
				datasets: [
					{label: "This Week", data: WeekPoint, fontColor: 'rgb(100,200,200)', borderWidth: 2, backgroundColor: Colours, borderColor: Backgrounds}
					]
			}

			var canvas = document.getElementById("CallCloserMonth").getContext('2d');
			var canvasW = document.getElementById("CallCloserWeek").getContext('2d');

			var ScaleInfo = {
			      xAxes: [{
			       		fontColor: 'rgba(100,100,200,1)',
			        	ticks: {autoSkip: false,min: 0,fontColor: 'white'}
			      		}],
			    	yAxes: [{
			       		fontColor: 'rgba(100,100,200,1)',
			        	ticks: {min: 0,fontColor: 'lightgrey'}
			      		}]
    			};

	var MonthlyCloser = new Chart(canvas, {
    type: 'bar',
    data: ChartDataM,
    options: {
    	title: {
            display: true,
            fontColor: 'white',
            text: 'Top Closer - Month'
        },
    	barValueSpacing: 20,
    	legend:{
    		display:false,
    		labels:{fontColor: 'rgb(250,250,250)'}
    			},
    	scales: ScaleInfo
    		}
	});

	var WeekCloser = new Chart(canvasW, {
    type: 'bar',
    data: ChartDataW,
    options: {
    	title: {
            display: true,
            fontColor: 'white',
            text: 'Top Closer - Week'
        },
    	barValueSpacing: 20,
    	legend:{
    		display:false,
    		labels:{fontColor: 'rgb(250,250,250)'}
    			},
    	scales: ScaleInfo
    		}
	});


};

})