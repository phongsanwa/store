$(document).ready(function () {
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["01", "02", "03", "04", "05","06", "07", "08", "09", "10","11", "12", "13", "14", "15","16", "17", "18", "19", "20","21", "22", "23", "24", "25","26", "27", "28", "29", "30"],
            datasets: [{
                label: 'Days', //Days
                data: [20000000, 50000000, 100000000, 150000000, 200000000, 250000000, 300000000],
                borderColor: '#F5A623',
                backgroundColor: '#F5A623',
            },
                {
                    label: 'Voted',
                    data: [670000000, 59000000, 900000000, 190000000, 100000000, 5000000, 210000000,59000000, 900000000, 190000000,190000000, 100000000, 5000000, 210000000],
                    borderColor: '#417505',
                    backgroundColor: '#417505',
                    type: 'line',
                    order: 0,
                    position: 'right',
                    gridLines: {
                        display: false,
                        drawBorder: false
                    }
                }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        minRotation: 45,
                        maxRotation: 45,
                        align: 'center',
                    }
                },
            }
        }
    });
});

