@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2><i class="material-icons medium IconMiddle">personal_video</i><span>{{ $computer->PCName }} Data Transfers</span></h2>
						<h3>
							<a class="Light" href="{{ route('CompanyComputers', $computer->company->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->company->CompanyName }}
							</a>
						</h3>
						<h3>
							<a class="Light" href="{{ route('ComputersInfo', $computer->id)}}">
							<i class="material-icons IconMiddle">chevron_left</i>{{ $computer->PCName }}
							</a>
						</h3>
					</div>

					<div id="PCINFO" class="card grey lighten-5">

						<div class="row">
						@forelse ($Transfers as $Transfer)
							<div class="row card grey lighten-3">
								<div class="col s4">
									<table>
										<tr>
											<td><label>Transfer Type:</label></td>
											<td>{{$Transfer->TransferType}}</td>
										</tr>
										<tr>
											<td><label>ID:</label></td>
											<td>{{$Transfer->PCID}}</td>
										</tr>
										<tr>
											<td><label>Time:</label></td>
											<td>{{$Transfer->TransferDate}}</td>
										</tr>
										<tr>
											<td><label>IP:</label></td>
											<td>{{$Transfer->RemoteIP}}</td>
										</tr>
									</table>
								</div>
								<div class="col s8">
									<label>Data:</label><br>
									<div class="card greay lighten-5">{{$Transfer->RawData}}</div>
								</div>
							</div>
						@empty
							<div class="col s12 yellow lighten-4" style="margin:10px;">
								<h3 class="Dark">No Data Received From This Computer</h3>
							<div>
						@endforelse
						</div>
						<div class="row center">
							{{ $Transfers->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>
	<script src="/js/HW/ComputerTabs.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

	<script>
		$(document).ready()
		{
			$('.size').each(function(e)
			{
				var Value = $(this).text();

				if (Value > (Math.pow(1024,4)))
				{
					var Temp = Value / (Math.pow(1024,4));
					$(this).text(Math.round(Temp,2) + ' TB');
				}
				else
				{
					if (Value > (Math.pow(1024,3)))
					{
						var Temp = Value / (Math.pow(1024,3));
						$(this).text(Math.round(Temp,2) + ' GB');
					}
				}
			}
			);

			$('.Chart').each(function(e)
			{

				var Percent = $(this).attr('val');
				PlotOutstandingChart(this.id, Math.round(Percent,1))
			});

		function PlotOutstandingChart(Canv, data)
		{
			//alert(data);
			//var groupedData = _.groupBy(data, function(d){return d.Closed});


			var Labels = ["Used Space", "Free Space"];
            var Closed = 0, Open = 0;
			var JobCounts = [];

			JobCounts.push(data);
			JobCounts.push(100-data);
//Canv
	        var canvas = document.getElementById(Canv).getContext('2d');

        	var Colours = [
                        'rgba(200, 26, 36, 0.7)',
                        'rgba(80, 80, 80, 0.7)'
                    ];
        	var Backgrounds = [
                        'rgba(200, 26,36,1)',
                        'rgba(80, 80, 80, 1)'
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
    		labels:{fontColor: 'rgb(50,50,50)'}
    	},
    	elements: {
      center: {
      text: data + '%',
      color: '#202020', //Default black
      fontStyle: 'Helvetica', //Default Arial
      sidePadding: 30 //Default 20 (as a percentage)
    }
  }
    }
});
};


 Chart.pluginService.register({
  beforeDraw: function (chart) {
    if (chart.config.options.elements.center) {
      //Get ctx from string
      var ctx = chart.chart.ctx;

      //Get options from the center object in options
      var centerConfig = chart.config.options.elements.center;
      var fontStyle = centerConfig.fontStyle || 'Arial';
      var txt = centerConfig.text;
      var color = centerConfig.color || '#000';
      var sidePadding = centerConfig.sidePadding || 20;
      var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2)
      //Start with a base font of 30px
      ctx.font = "30px " + fontStyle;

      //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
      var stringWidth = ctx.measureText(txt).width;
      var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

      // Find out how much the font can grow in width.
      var widthRatio = elementWidth / stringWidth;
      var newFontSize = Math.floor(30 * widthRatio);
      var elementHeight = (chart.innerRadius * 2);

      // Pick a new font size so it will not be larger than the height of label.
      var fontSizeToUse = Math.min(newFontSize, elementHeight);

      //Set font settings to draw it correctly.
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
      var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
      ctx.font = fontSizeToUse+"px " + fontStyle;
      ctx.fillStyle = color;

      //Draw text in center
      ctx.fillText(txt, centerX, centerY);
    }
  }
});



		};
	</script>

@endsection