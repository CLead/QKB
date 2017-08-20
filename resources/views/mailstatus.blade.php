@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card teal lighten-1 Control-Item">
				<div class="card-title">
					<h2>Mail Status</h2>
					<div class="row">
						Current Quad Mail Server Health						
					</div>
				</div>
				
					

				<div class="card-body teal lighten-4">
					<div id="dataarea" class="row wrapper">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

$(document).ready(function()
	{

		DisplayHosts();
		var tid = setInterval(DisplayHosts, 5000);


		function DisplayHosts()
		{
			$.ajax(
				{
					method: "POST",
                    url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetAllMailHosts",
                    dataType: "json",
					success: function (data) 
						{
                            var RetVal = data.FailedHosts;
                            var DataArea = $('#dataarea');
                            DataArea.html('');
                            $.each(RetVal, function()
                            {
                            	var StatusClass;
                            	var Icon;
                            	if (this.Status ===0)
                            	{
                            		Icon = "done";
                            		StatusClass = "green";
                            	}
                            	else
                            	{
                            		Icon = "error";
                            		StatusClass = "red";
                            	}

                            	var E = "<div class='col l3 m4 s12  '><div class='card MailCard "+ StatusClass+"'>";
                            	E+= "<p class='HostName'>" + this.HostName+ ":" + this.Port + "</p>";
								E+= "<p class='Server'>" + this.Server + " - <i class='material-icons T'>access_time</i>" +this.LastKnownGood.toLocaleString() + "</p>";
								E+= "<i class='material-icons Status'>" + Icon +  "</i>";
                            	E += "</div></div>"
                            	DataArea.append(E);

                            })

                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                    	{

                            alert(textStatus);
                        }
				});
		}
	}
	);

</script>

@endsection