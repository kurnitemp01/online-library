const pie_chart_value = [35, 24, 20, 5, 16];
const pie_chart_label = ["Women", "Sports", "Horror", "Humor", "Gore"];
const bg_color = ['#4e73df', '#1cc88a', '#36b9cc', '#cf2e2e', '#a4cf2e'];
const hov_bg_color = ['#4e73df', '#1cc88a', '#36b9cc', '#cf2e2e', '#a4cf2e'];

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: pie_chart_label,
    datasets: [{
      data: pie_chart_value,
      backgroundColor: bg_color,
      hoverBackgroundColor: hov_bg_color,
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
