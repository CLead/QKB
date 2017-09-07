@extends('layout.master')


@section('content')

<div class="wrapper">
	<div class="row">
		<div class="col l12 m12 s12">
			<div class="card cyan lighten-2 Control-Item">
				<div class="card-title">
					<h2>Aldi Store Lookup</h2>
					<div class="row">
						Enter the full store ID (6 digits including region, i.e. 772019)
					</div>
				</div>
				<div class="card-body cyan lighten-4">
					<div class="row">
							<div class="col l5 offset-l2 s12 input-field ">
								<i class="material-icons prefix" style="margin-top: 20px;">language</i>
								<input name="txtStoreID" id="txtStoreID" type="text" class="validate LargeTextEntry" required>
								<label for="txtStoreID">Enter Store ID</label>
							</div>
							<div class="input-field-button col l2 m2 s6 offsel-s6">
								<button id="btnPost" class="btn waves-effect waves-light blue" style="margin-top: 20px;">Submit
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

				var strID = $('#txtStoreID').val();

				$.ajax(
				{
					method: "POST",
					url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetAldiDetails",
                    dataType: "json",
                    data: { StoreID: strID },
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
									$('#result').html("<b>Store</b>: " + data.Address + " <u>"+ data.Town+"</u><br><b>Store Phone:</b><a href='"+data.StorePhone+"' class='WhiteText'>"+data.Phone+"</a><br><b>Area Manager</b>: " + data.AreaManager + " (<a class='WhiteText' href='tel:"+data.AreaManagerPhone+"'>"+ data.AreaManagerPhone+"</a>)<br>");
									$('#title').html("Successful Lookup");

									$('#MainCard').addClass("green");
									$('#CardTitle').addClass("green");
								}
								else
								{

//Ret = new { Status = 200, Success=true, Message = "Success", Phone= StorePhone, AreaManager=AreaManager, AreaManagerPhone=AreaManagerPhone, Address=Address, Town=Town };

									$('#result').html("Unable to find store in the MSL Document.");
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