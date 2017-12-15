@extends('layout.master')


@section('content')

	<div class="wrapper">
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card  grey darken-1 Control-Item">
					<div class="card-title">
						<h2>Company Maintenance</h2>
					</div>

					<div class="card-body grey lighten-3">
						<div id="dataarea" class="row wrapper">
							<h3 class="OrangeFont">Edit Company Details</h3>

						<form method="POST" action="{{route('HWCompaniesUpdate', $company->id)}}">
							<div class="row">
								{{ method_field('PATCH')}}
								{{ csrf_field() }}

								<div class="col l6 s12 m6 input-field ">
									<input name="CompanyName" id="CompanyName" type="text" class="validate" value="{{$company->CompanyName or old('CompanyName')}}" required>
									<label for="CompanyName">Company Name</label>
								</div>

								<div class="col l6 s12 m6 input-field ">
									<label for="CompanyCode">Account Code</label>
									<input name="CompanyCode" id="CompanyCode" type="text" class="validate" value="{{$company->CompanyCode or old('CompanyCode')}}" required>
								</div>
								
							</div>
							<div class="row">
								<div class="col l6 s12 m6 input-field ">
									<div class="input-field col s6">
										<label id="lblCode" for="RegistrationCode">Registration Code</label>
										<input name="RegistrationCode" id="RegistrationCode" type="text" class="validate" value="{{$company->RegistrationCode or  old('RegistrationCode')}}" required>
									</div>
									<div class="input-field col s6">
										<button id="Generate" type="button" class="btn waves-effect waves-light deep-orange">Generate</button>
									</div>
								</div>
								<div class="col l6 s12 m6 input-field ">
									<label for="AdminEmail">Admin Email</label>
									<input name="AdminEmail" id="AdminEmail" type="text" class="validate" value="{{$company->AdminEmail or old('AdminEmail')}}" required>
								</div>

							</div>
							<div class="row">
								
								<div class="col l12 s12 m12">
									<a class="btn orange" href="{{ route('HWCompanies') }}">Cancel</a>
									<button class="btn waves-effect waves-light" type="submit" name="action">Update
								    	<i class="material-icons right">send</i>
								  	</button>
								</div>
								<input name="Tags" id="Tags" type="hidden">
							</div>
							@include('layout.errors')
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<script>

	$(document).ready(function()
	{

			$('#Generate').on("click", function()
			{

				$.ajax(
				{
					method: "POST",
                    url: "{{env('ToolKitServicePath')}}/GenerateRegistrationCode",
                    dataType: "json",
					success: function (data) 
						{
							$('#lblCode').addClass("active");

                            if (data.Status == "200")
                            {
								$('#RegistrationCode').val(data.Code);
                            }
                            else
							{
								$('#RegistrationCode').val("Failed");
							}
                        },
                    error: function (jqXHR, textStatus, errorThrown) 
                    	{

                            $('#RegistrationCode').val("Failed");
                        }
				});
			});		

	});

</script>


@endsection


