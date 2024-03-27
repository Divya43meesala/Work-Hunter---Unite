const chart1=document.getElementById('chart1').getContext('2d');
const myChart1=new Chart(chart1, {
    type:'line',
    data:{
        labels:['tuesday','wednesday','thrusday','friday','saturday','sunday'],
        datasets:[{
            label:"last week",
            backgroundColor:'#8c68cd',
            borderColor:"#8c68cd",
            data:[3000,4000,7000,2500,5500,9000,2000],
        }]    
    },
    
})  