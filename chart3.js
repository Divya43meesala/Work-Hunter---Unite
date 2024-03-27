const chart3=document.getElementById('chart3').getContext('2d');
const myChart3=new Chart(chart3, {
    type:'pie',
    data:{
        labels:['monday','tuesday','wednesday','thrusday','friday','saturday','sunday'],
        datasets:[{
            label:"last week",
            backgroundColor:['#8c68cd','#868cd','#457','#h7890'],
            borderColor:"#8c68cd",
            data:[3000,4000,7000,2500,5500,9000,2000],
        }]    
    },
    
})  