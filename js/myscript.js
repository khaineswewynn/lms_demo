$(document).ready(function(){
    console.log('in script')
    $(document).on('click','.btn_delete',function(event){
        event.preventDefault()
        let status=confirm("Are you sure to delete?");
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method:'post',
                url:'delete_category.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        alert("Successfully deleted")
                        location.href='category.php'
                    }
                    else{
                        alert(response)
                    }
                },
                error:function(error)
                {

                }
            })
        }
    })
    $('#mytable').DataTable();

    $.ajax({
        url:'report_chart.php',
        method:'post',
        success:function(response)
        {
              let batch=JSON.parse(response)  
              let year=[];
              let data=[];
              for(let index=0;index<batch.length;index++)
              {
                    year[index]=batch[index].year;
                    data[index]=batch[index].total;
              }
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
                    //x coordinate
					labels: year,
					datasets: [{
						label: "Batches",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: data
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 2
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
        },
        error:function(message)
        {

        }
    })

	$(document).on('click','.btn_add',function(event){
		event.preventDefault();
		console.log("btn click")
		let id=$(this).parent().attr('id')
		$.ajax({
			url:'get_trainee.php',
			method:'post',
			data:{id:id},
			success:function(response){
				$('.rows').append(response)
			},
			error:function(response)
			{

			}

		}

		)		

	})
    
})