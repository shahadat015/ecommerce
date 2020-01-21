
$(function () {
	$.ajax({
		url: window.origin + '/admin/sales/analytics',
		type: "GET",
		success(response) {
			let data = [];

            for (let item of response) {
                data.push(item.total);
            }

            initSalesAnalyticsChart(data);
		},
		error(error) {
			console.log(error.statusText);
		}
	});
});

// sales chart
function initSalesAnalyticsChart(data) {

	var options= {
	    chart: {
	        height:350,
	        type:"area",
	        toolbar: {
	            show: !1, 
	            autoSelected: "zoom"
	        }
	    },
	    dataLabels: {
	        enabled: !1
	    },
	    stroke: {
	        curve: "smooth", 
	        width: [1, 1]
	    },
	    colors:["#4d79f6"],
	    series:[
		    {
		        name: "Sales", 
		        data: data,
		    }
	    ],
	    xaxis: {
	        categories:[
		        "Monday",
		        "Tuesday",
		        "Wednesday",
		        "Thursday",
		        "Friday",
		        "Saturday",
		        "Sunday"
	        ],
	        axisBorder: {
	            show: !0, color: "#bec7e0"
	        }
	        ,
	        axisTicks: {
	            show: !0, color: "#bec7e0"
	        }
	    }
	    ,
	    tooltip: {
	        x: {
	            format: "dd/MM/yy HH:mm"
	        }
	    }
	    ,
	    legend: {
	        position: "top", 
	        horizontalAlign: "right"
	    }
	};
(chart=new ApexCharts(document.querySelector("#eco-dash1"), options)).render();
}

// world map
$("#bd-map-markers").vectorMap({
    map:"bd_merc", 
    scaleColors:["#eff0f1", "#eff0f1"], 
    normalizeFunction:"polynomial", 
    hoverOpacity:.7, 
    hoverColor:!1, 
    regionStyle: {
        initial: {
            fill: "#e0e7fd"
        }
    }, 
    markerStyle: {
        initial: {
            stroke: "transparent"
        }
        , hover: {
            stroke: "rgba(112, 112, 112, 0.30)"
        }
    }, 
    backgroundColor:"transparent", 
    markers:[ 
	    {
	        latLng:[19.2313205, 92.77757443], 
	        name:"Noakhali", 
	        style: {
	            fill: "#0aafff"
	        }
	    }, 
	    {
	        latLng:[23.7593572, 90.3788136], 
	        name:"Dhaka", 
	        style: {
	            fill: "#0aafff"
	        }
	    }, 
	    {
	        latLng:[16.28909642, 95.10113525], 
	        name:"Chittagong", 
	        style: {
	            fill: "#0aafff"
	        }
	    }
    ]
});

// revenue chart
options= {
    chart: {
        height:135,
        animations: {
            enabled: !1
        },
        sparkline: {
            enabled: !0
        },
        type:"bar"
    },
    plotOptions: {
        bar: {
            horizontal: !1, 
            endingShape: "rounded", 
            columnWidth: "40%"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0, 
        width: 2, 
        colors: ["transparent"]
    },
    colors:["#4ac7ec"],
    series:[ 
	    {
	        name: "Revenue", 
	        data: [50, 60, 70, 80, 90, 100, 95, 85, 75, 65, 55, 65, 75, 85, 95, 105, 80, 70, 60, 50, 40, 30, 45, 55, 65, 75, 85, 95, 100, 80, 60]
	    }
    ],
    xaxis: {
        categories:
       	[
	       	"1-Jan",
	        "2-Jan",
	        "3-Jan",
	        "4-Jan",
	        "5-Jan",
	        "6-Jan",
	        "7-Jan",
	        "8-Jan",
	        "9-Jan",
	        "10-Jan",
	        "11-Jan",
	        "12-Jan",
	        "13-Jan",
	        "14-Jan",
	        "15-Jan",
	        "16-Jan",
	        "17-Jan",
	        "18-Jan",
	        "19-Jan",
	        "20-Jan",
	        "21-Jan",
	        "22-Jan",
	        "23-Jan",
	        "24-Jan",
	        "25-Jan",
	        "26-Jan",
	        "27-Jan",
	        "28-Jan",
	        "29-Jan",
	        "30-Jan",
	        "31-Jan"
        ],
        crosshairs: {
            show: !1
        }
    },
    fill: {
        opacity: .5
    },
    tooltip: {
        y: {
            formatter:function(e) {
                return"$ "+e+"k"
            }
        }
    }
};
(chart=new ApexCharts(document.querySelector("#eco_dash_2"), options)).render();

// new customer chart
var chart;
options= {
    chart: {
        height: 217, type: "donut"
    }
    ,
    dataLabels: {
        enabled: !1
    }
    ,
    series:[65,
    35],
    legend: {
        show: !1
    }
    ,
    labels:["New Customers", "Repeated"],
    colors:["#4d79f6", "#d1e6fa"],
    responsive:[ 
	    {
	        breakpoint:600,
	        options: {
	            chart: {
	                height: 200
	            },
	            legend: {
	                show: !1
	            }
	        }
	    }
    ],
    tooltip: {
        y: {
            formatter:function(e) {
                return e+" %"
            }
        }
    }
};
(chart=new ApexCharts(document.querySelector("#re_customers"), options)).render();