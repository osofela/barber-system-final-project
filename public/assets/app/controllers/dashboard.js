app.controller('dashboardController', function($http,$scope,API_URL)
{

    //get logged in user
    $http.get(API_URL + "user")
        .success(function(response) {
            $scope.loggedInUser = response;
        });

    var visitors = [
        ['10/2015', 632],
        ['11/2015', 543],
        ['12/2015', 2341],
        ['01/2016', 912],
        ['02/2016', 1500],
        ['03/2016', 4350],
        ['04/2016', 2900],
        ['05/2016', 3500]
    ];

    function showChartTooltip(x, y, xValue, yValue) {
        $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 40,
            border: '0px solid #ccc',
            padding: '2px 6px',
            'background-color': '#fff'
        }).appendTo("body").fadeIn(200);
    }

    if ($('#site_statistics').size() != 0) {

        $('#site_statistics_loading').hide();
        $('#site_statistics_content').show();

        var plot_statistics = $.plot($("#site_statistics"), [{
                data: visitors,
                lines: {
                    fill: 0.6,
                    lineWidth: 0
                },
                color: ['#f89f9f']
            }, {
                data: visitors,
                points: {
                    show: true,
                    fill: true,
                    radius: 5,
                    fillColor: "#f89f9f",
                    lineWidth: 3
                },
                color: '#fff',
                shadowSize: 0
            }],

            {
                xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,
                    mode: "categories",
                    min: 0,
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 5,
                    tickDecimals: 0,
                    tickColor: "#eee",
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
            });

        var previousPoint = null;
        $("#site_statistics").bind("plothover", function(event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' appointments');
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    }

    if ($('#site_activities').size() != 0) {
        //site activities
        var previousPoint2 = null;
        $('#site_activities_loading').hide();
        $('#site_activities_content').show();

        var data1 = [
            ['OCT', 7584],
            ['NOV', 6516],
            ['DEC', 28092],
            ['JAN', 10944],
            ['FEB', 18000],
            ['MAR', 52200],
            ['APR', 34800],
            ['MAY', 42000]
        ];



        var plot_statistics = $.plot($("#site_activities"),

            [{
                data: data1,
                lines: {
                    fill: 0.2,
                    lineWidth: 0,
                },
                color: ['#BAD9F5']
            }, {
                data: data1,
                points: {
                    show: true,
                    fill: true,
                    radius: 4,
                    fillColor: "#9ACAE6",
                    lineWidth: 2
                },
                color: '#9ACAE6',
                shadowSize: 1
            }, {
                data: data1,
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 3
                },
                color: '#9ACAE6',
                shadowSize: 0
            }],

            {

                xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,
                    mode: "categories",
                    min: 0,
                    font: {
                        lineHeight: 18,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 5,
                    tickDecimals: 0,
                    tickColor: "#eee",
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#eee",
                    borderColor: "#eee",
                    borderWidth: 1
                }
            });

        $("#site_activities").bind("plothover", function(event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint2 != item.dataIndex) {
                    previousPoint2 = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + '€');
                }
            }
        });

        $('#site_activities').bind("mouseleave", function() {
            $("#tooltip").remove();
        });
    }



});