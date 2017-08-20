$(document).ready(function(){
	
	DisplayOutstandingJobs();
	var tid = setInterval(DisplayOutstandingJobs, 60000);


		function DisplayOutstandingJobs()
		{
			$.ajax(
				{
					method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetTodaysCalls",
                    dataType: "json",
					success: function (data) 
						{
							PlotOutstandingChart(data);
                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                    	{
                        }
				});
		};

		function PlotOutstandingChart(data)
		{
			//alert(data);
			//var groupedData = _.groupBy(data, function(d){return d.Closed});


			var Labels = ["Open", "Closed"];
            var Closed = 0, Open = 0;
			var JobCounts = [];
			$.each(data, function(e, p)
                {
                	if (p.Closed === 1)
                        Closed ++;
                    else
                        Open++;
                }
            );

            if ((Closed + Open) == 0)
            {
                ShowEmptyChart();
                return;
            }

            JobCounts.push(Open);
            JobCounts.push(Closed);

	       var canvas = document.getElementById("OpenedTodayJobs").getContext('2d');

        	var Colours = [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 235, 127, 0.7)'
                    ];
        	var Backgrounds = [
                        'rgba(255,99,132,1)',
                        'rgba(54, 235, 127, 1)'
                    ];

	var myDoughnutChart = new Chart(canvas, {
    type: 'doughnut',
    data: {
        labels: Labels,
        datasets: [{
            label: '# of Calls',
            fontColor: 'rgb(100,200,200)',
            data: JobCounts,
            backgroundColor: Colours,
            borderColor: Backgrounds,
            borderWidth: 2
        }]
    },
    options: {
    	legend:{
    		display:true,
    		labels:{fontColor: 'rgb(250,250,250)'}
    	}
    }
});
};

        function ShowEmptyChart(data)
        {

            var Labels = ["No Calls"];

            var JobCounts = [1];
            var canvas = document.getElementById("OpenedTodayJobs").getContext('2d');

            var Colours = [
                        'rgba(50, 50, 50, 0.7)'
                    ];
            var Backgrounds = [
                        'rgba(50,50,50,1)'
                    ];

    var myDoughnutChart = new Chart(canvas, {
    type: 'doughnut',
    data: {
        labels: Labels,
        datasets: [{
            label: '# of Calls',
            fontColor: 'rgb(100,200,200)',
            data: JobCounts,
            backgroundColor: Colours,
            borderColor: Backgrounds,
            borderWidth: 2
        }]
    },
    options: {
        title: {
            display: true,
            fontColor: 'white',
            text: 'No Calls Logged Yet'
        },
        legend:{
            display:true,
            labels:{fontColor: 'rgb(250,250,250)'}
        }
    }
});
};




})