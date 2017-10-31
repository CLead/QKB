$(document).ready(function(){
	
	ChartAjax();
	var tid = setInterval(ChartAjax, 25000);

	var MailChartItem;

		function ChartAjax()
		{

			if (MailChartItem != null)
			{
				MailChartItem.destroy();
			}

			$.ajax(
				{
					method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetDashboardMailQueues",
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

			var ArrayLength = data.length;
			var DataSets = [];
			for (var i=0; i<ArrayLength; i++)
			{
				var Name = data[i].Name;
				var Datapoints = data[i].Data;
				var Clr = data[i].Dashcolour;
				var Labels = data[i].Labels;

				DataSets.push({label: Name, data: Datapoints, fontColor: 'rgb(100,200,200)', borderColor: Clr});
			}

			var ChartData = 
			{
				labels: Labels,
				datasets: DataSets

			}

			var canvas = document.getElementById("MailChart").getContext('2d');

	MailChartItem = new Chart(canvas, {
    type: 'line',
    data: ChartData,
    options: {
    	barValueSpacing: 20,
    	legend:{
    		display:true,
    		labels:{fontColor: 'rgb(250,250,250)'}
    			},
    	scales: {
			      xAxes: [{
			       		fontColor: 'rgba(100,100,200,1)',
			        	ticks: {min: 0,fontColor: 'white', maxRotation:90, minRotation:90,autoSkip:true, autoSkipPadding: 20}
			      		}],
			    	yAxes: [{
			       		fontColor: 'rgba(100,100,200,1)',
			        	ticks: {min: 0,fontColor: 'lightgrey'}
			      		}]
    			}
    		}
	});
};

})