var Dashboard = (function (dashboard, $) {
    "use strict";
    dashboard.dashboardManagement = function () {
        var config = {
            base_url: null,
            file_url: "/",
            img_url: "/img/",
            state: {
                activityStream: function (departmentName, percentage, departmentCode) {
                    var cssClass = '';
                    switch (departmentCode) {
                        case 'Motor':
                            cssClass = 'progress-bar-primary';
                            break;
                        case 'Property':
                            cssClass = 'progress-bar-default';
                            break;
                        case 'Marine':
                            cssClass = 'progress-bar-info';
                            break;
                        case 'Agri':
                            cssClass = 'progress-bar-success';
                            break;
                        case 'Misc':
                            cssClass = 'progress-bar-warning';
                            break;
                        case 'Engg':
                            cssClass = 'progress-bar-danger';
                            break;
                        case 'Avi':
                            cssClass = 'progress-bar-primary';
                            break;
                        default:
                            cssClass = 'progress-bar-success';
                            break;
                    }
                    this.departmentName = ko.observable(departmentName);
                    this.percentage = ko.observable(parseFloat(percentage) + '%');
                    this.cssWidth = ko.observable(percentage + '%');
                    this.cssClass = ko.observable(cssClass);
                }
            }
        };
        var viewModel = {
        };
        return ({
            renderIndex: function () {               

                //ko.applyBindings(new viewModel.app());

                // CHART JS FOR LINE CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    datasets: [{
                        label: "Target",
                        backgroundColor: 'rgb(44,149,251,0.4)',
                        borderColor: 'rgb(44,149,251)',
                        data: [12, 19, 3, 5, 2, 3],
                        fill: true
                    }, {
                        label: "Achievement",
                        backgroundColor: 'rgb(254,101,101,0.4)',
                        borderColor: 'rgb(254,101,101)',
                        data: [20, 14, 7, 5, 0, 1],
                        fill: true
                    }]
                };
                var options = {
                    responsive: true,
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Premium'
                            }
                        }]
                    }
                };
                var lineChart = $("#lineChart");
                if (window.lineChartDraw) {
                    window.lineChartDraw.destroy();
                }
                window.lineChartDraw = new Chart(lineChart, {
                    type: 'line',
                    data: data,
                    options: options
                });
                $('.dasbhoard-box').matchHeight({
                    byRow: true,
                    property: 'height'
                });
                // JS FOR DROPDOWN
                $(".multipleSelect").SumoSelect({
                    placeholder: "Select a branch"
                });
                $(".niceSelect").niceSelect();

                // CHART JS FOR BAR CHART Plan Wise
                var barDatas = {
                    ChartDataList: [
                        {
                            Label : "Plan1",
                            Value : "1"
                        }, {
                            Label: "Plan2",
                            Value: "0.2"
                        }, {
                            Label: "Plan3",
                            Value: "0.5"
                        }, {
                            Label: "Plan4",
                            Value: "0.3"
                        },{
                            Label: "Plan5",
                            Value: "0.8"
                        }, {
                            Label: "Plan6",
                            Value: "0.4"
                        },
                    ]
                };
                debugger;
                var barData = barDatas["ChartDataList"];
                var barLabelList = [];
                var barValueList = [];

                for (var i = 0; i < barData.length; i++) {
                    barLabelList.push(barData[i].Label);
                    barValueList.push(barData[i].Value);
                }

                var barChart = document.getElementById("barChart");
                var varbarChart = new Chart(barChart, {
                    type: 'bar',
                    data: {
                        labels: barLabelList,
                        datasets: [{
                            label: 'Business',
                            data: barValueList,
                            backgroundColor: [
                                '#e03051',
                                '#465C81',
                                '#19CD63',
                                '#FFA949',
                                '#F3554F',
                                '#409FC8'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Plan'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Amount'
                                }
                            }]
                        }
                    }
                });
                // CHART JS FOR BAR CHART Plan Wise
                var barDatas1 = {
                    ChartDataList: [
                        {
                            Label: "Company1",
                            Value: "1"
                        }, {
                            Label: "Company2",
                            Value: "0.2"
                        }, {
                            Label: "Company3",
                            Value: "0.5"
                        }, {
                            Label: "Company4",
                            Value: "0.3"
                        }, {
                            Label: "Company5",
                            Value: "0.8"
                        }, {
                            Label: "Company6",
                            Value: "0.4"
                        },
                    ]
                };
                var barData1 = barDatas1["ChartDataList"];
                var barLabelList1 = [];
                var barValueList1 = [];

                for (var j = 0; j < barData1.length; j++) {
                    barLabelList1.push(barData1[j].Label);
                    barValueList1.push(barData1[j].Value);
                }

                var barChart1 = document.getElementById("barChart1");
                var varbarChart1 = new Chart(barChart1, {
                    type: 'bar',
                    data: {
                        labels: barLabelList1,
                        datasets: [{
                            label: 'Business',
                            data: barValueList1,
                            backgroundColor: [
                                '#e03051',
                                '#465C81',
                                '#19CD63',
                                '#FFA949',
                                '#F3554F',
                                '#409FC8'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Company'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Amount'
                                }
                            }]
                        }
                    }
                });
            }
        }
        );
    };
    return dashboard;
}(Dashboard || {}, jQuery, ko));
