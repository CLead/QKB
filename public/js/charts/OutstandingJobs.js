$(document).ready(function(){
	
	DisplayOutstandingJobs();
	var tid = setInterval(DisplayOutstandingJobs, 60000);


    function DisplayOutstandingJobs()
    {
    	$.ajax(
    		{
    			method: "POST",
                url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetOutstandingCalls",
                dataType: "json",
    			success: function (data) 
    				{
    					PlotOutstandingChart(data);
                        DisplayJobList(data);
                    },
                error: function (jqXHR, textStatus, errorThrown) 
                	{

                    }
    		});
    };

    function FormatDate(dt)
    {
        var DT = dt.getDate() + "/" + dt.getMonth() + "/" + dt.getFullYear() + "  " + dt.getHours() + ":" + dt.getMinutes();
        return DT;
    }

    function ShowCall(CallID)
    {
        $("model-content").html("<h4>Call Details</h4><p>Showing details for callid" + CallID + "</p>");
        $('#modelDiv').modal('open');
    }

    function DisplayJobList(data) 
    {
        var JobDiv = $("#JobList");

        var Table = "<table class='striped centered responsive-table'><thead><tr><th>Ref</th><th>Company</th><th>Contact</th><th>No.</th><th>Last Update</th><th>Assigned</th><th>Last Action</th></tr></thead>";

        Table += "<tbody>"

        $.each(data, function(i, row)
        {

            var dt =  new Date(row.LastUpdate);

            Table += "<tr><td><a href='#' class='CI' data-id="+ row.CallID+"><i class='material-icons'>add_circle_outline</i></a></td>";
            Table += "<td>" + row.Company + "</td>";
            Table += "<td>"+ row.Person+"</td>";
            Table += "<td>"+ row.ContactNumber+"</td>";
            Table += "<td>"+ FormatDate(dt)+"</td>";
            Table += "<td>"+row.Assigned+"</td>";
            Table += "<td>"+row.Details+"</td>";
            Table += "</tr>";
        })

        Table += "</tbody></table>";

        $("#JobList").html(Table);
    }  

    $(document).on( 'click', '.CI', function()
    {
        var CallID =  $(this).data("id");

        //$("#Pmodel-content").html("<h4>Call Details</h4><p>Showing details for callid" + CallID + "</p>");
        $('#modelDiv').modal('open');
        $("#CallDetailsID").text(CallID);
        $.ajax(
            {
                method: "POST",
                url: "http://toolkit.quad.co.uk/QKB/QKBService.asmx/GetCallDetails",
                data: { CallID: CallID },
                dataType: "json",
                success: function (data) 
                    {
                        DisplayCallDetails(data);
                    },
                error: function (jqXHR, textStatus, errorThrown) 
                    {
                        alert("Failed to get data");
                    }
            });

    });


    function DisplayCallDetails(data)
    {
        $("#CallDetailsLoader").addClass("Hidden");

        var CallHTML = "<div class='row'>";

        CallHTML += "<div class='col l4 m6 s12'>Caller: <b>"+data.Person+"</b></div>";
        CallHTML += "<div class='col l4 m6 s12'>Company: <b>"+data.Company+"</b></div>";
        CallHTML += "<div class='col l4 m6 s12'>Contact: <b>"+data.ContactNo+"</b></div>";

        CallHTML += "</div>";

        CallHTML += "<table class='striped centered responsive-table'><thead><tr><th>Actioned</th><th>Action</th><th>User</th><th>Details</th></tr></thead><tbody>";

        $.each(data.ActionLines, function(index, d)
        {

            var dt = new Date(d.Actioned);

            CallHTML += "<tr>";
            CallHTML += "<td>" + FormatDate(dt) + "</td>";
            CallHTML += "<td>" + d.ActionType + "</td>";
            CallHTML += "<td>" + d.Person + "</td>";
            CallHTML += "<td>" + d.Details + "</td>";

            CallHTML += "</tr>"
        }
        );

//Lines.Add(new { Actioned = DR["ActionTime"], ActionType = DR["ActionType"], Details = DR["Detail"], Person = DR["UserID"] });

        CallHTML += "</tbody></table>";

        $("#CallDetails").html(CallHTML);
    }

		function PlotOutstandingChart(data)
		{
			//alert(data);
			var groupedData = _.groupBy(data, function(d){return d.Assigned});

            var JobText = "";

			var Labels = [];
			var JobCounts = [];
			$.each(groupedData, function(e, p)
                            {
                            	Labels.push(e);

                                JobText += "<div class='card grey lighten-1 ActionCard'><h3>" + e + "</h3><ul>";

                            	JobCounts.push( p.length);
                                $.each(p, function(pp, d) 
                                { 
                                    var dt =  new Date(d.LastUpdate);
                                    var DT = FormatDate(dt);
                                    JobText += "<li class='CallAction'><span class='Comp'>" + d.Company + "</span> Last Update: <span class='LU'>"+ DT +"</span>";

                                    JobText += "<p class='det'>"+ d.Details ;
                                    JobText += "<a href='QuadLog:"+ d.CallID +"'><i class='material-icons vam'>pageview</i></a></p>";
                                    JobText += "</li>";
                                })

                                JobText += "</ul></div>";
                            }
					);
            
            $("#OutstandingJobsText").html(JobText);
            var canvasOutstandingJobs = document.getElementById("OutstandingJobs").getContext('2d');

        	var Colours = [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(54, 235, 127, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(242, 35, 12, 0.7)',
                        'rgba(24, 206, 8, 0.7)'


                    ];
        	var Backgrounds = [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 235, 127, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(242, 35, 12, 1)',
                        'rgba(24, 206, 8, 1)'
                    ];

	var myDoughnutChart = new Chart(canvasOutstandingJobs, {
    type: 'doughnut',
    data: {
        labels: Labels,
        datasets: [{
            label: '# of Votes',
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

})