// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Thriller", "Romance", "Mystery","Novel","Action","Film series","Drama","Sci-fi","Adventure","Fantasy","Cartoon"],
    datasets: [{
      data: arrayPercent,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#a86032','#78b030','#f245f5','#1c09ed','#e02f4a','#ffb545','#f1ff29','#e1e3c8'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#278491','#63391e','#415e1a','#7e2680','#645f9c','#9c1f32','#8a6124','#727819','#5e5e55'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
