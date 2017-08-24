@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card blue Control-Item">
				<div class="card-title">
					<h2>Domain Lookup</h2>
					<div class="row">
						Enter the full domain name of a website, and will try and determine the details of where it is located.:
					</div>
				</div>
				<div class="card-body blue lighten-4">
					<div class="row">
							<div class="col l5 offset-l2 s12 input-field ">
								<i class="material-icons prefix">language</i>
								<input name="domain_name" id="domain_name" type="text" class="validate">
								<label for="domain_name">Enter Domain Name</label>
							</div>
							<div class="input-field-button col l2 m2 s6 offsel-s6">
								<button id="btnPost" class="btn waves-effect waves-light blue">Submit
			    					<i class="material-icons right">send</i>
			  					</button>
			  				</div>
			  				<div id="dvOut">
			  				</div>
					</div>
					<div id="resultsdiv" class="row Hidden">
						<div class="col l6 offset-l3 s12">
							<div id="MainCard" class='card green'>
                            	<div id="CardTitle" style='font-size:16px' class='card-title green lighten-2'>
                            		<h3 id="title"></h3>
                            	</div>
                        		<div class='card-content'>
                        			<p id="result" class='HostName'>DETAILS</p>
                        		</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function()
		{
			$('#btnPost').on("click", function()
			{

				var strDom = $('#domain_name').val();

				$.ajax(
				{
					method: "POST",
                    url: "http://localhost:62085/QKBService.asmx/GetDomainInfo",
                    dataType: "json",
                    data: { DomainInfo: strDom },
					success: function (data) 
						{
							$("#resultsdiv").removeClass("Hidden");
							$('#CardTitle').removeClass("red orange green");
							$('#MainCard').removeClass("red orange green");
                            //var RetVal = data.Password;
                            if (data.Status == "200")
                            {
                            	if (data.Success)
                            	{
									$('#result').html("Appears to be on <b>" + data.Server + "</b>, IP:<b>" + data.IP + "</b>");
									$('#title').html("Successful Lookup");

									$('#MainCard').addClass("green");
									$('#CardTitle').addClass("green");
								}
								else
								{
									$('#result').html(data.Message  + "IP:<b>" + data.IP + "</b>");
									$('#title').html("Not Detected");

									$('#MainCard').addClass("orange");
									$('#CardTitle').addClass("orange");
								}
                            }
                            else
							{
								$('#result').html(data.Message);
								$('#title').html("Failed:");

								$('#MainCard').addClass("red");
								$('#CardTitle').addClass("red");
							}
                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                    	{

                            $('#output').text(errorThrown);
                        }
				});

			});

		})


</script>

@endsection