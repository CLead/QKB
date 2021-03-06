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

                            	var E = "<div class='col l3 m4 s12  '><div class='card  "+ StatusClass+"'>";
                            	E+= "<div style='font-size:16px' class='card-title "+ StatusClass+" lighten-2'>" + this.HostName+ ":" + this.Port+ "</div>";
                            	E+= "<div class='card-content'>"
                            	E+= "<p class='HostName'>Server: " + this.Server + "</p>";
								E+= "<p class='Server'><i class='material-icons T'>access_time</i>" +this.LastKnownGood.toLocaleString() + "</p>";
								E+= "<i style='float:right' class='material-icons Status'>" + Icon +  "</i>";
                            	E += "</div></div></div>"
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