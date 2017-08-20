$(document).ready(function(){
	
	ChartAjax();
	var tid = setInterval(ChartAjax, 190000);


		function ChartAjax()
		{
			$.ajax(
				{
					method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/WeeklyCalls",
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
			var Current = data[0].CurrentWeek;
			var LastWeek = data[0].LastWeek;

			var Labels = ["M", "T", "W", "T", "F"];

			var ChartData = 
			{
				labels: Labels,
				datasets: [
					{label: "This Week", data: Current, fontColor: 'rgb(100,200,200)', backgroundColor: 'rgba(255,99,132,0.7)', borderColor: 'rgba(255,99,132,1)'},
					{label: "Last Week", data: LastWeek, fontColor: 'rgb(100,200,200)',backgroundColor: 'rgba(54, 162, 235, 0.7)', borderColor: 'rgba(54, 162, 235, 1)'}
					]
			}

			var canvas = document.getElementById("WeeklyCalls").getContext('2d');

	var myDoughnutChart = new Chart(canvas, {
    type: 'bar',
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
			        	ticks: {min: 0,fontColor: 'white'}
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