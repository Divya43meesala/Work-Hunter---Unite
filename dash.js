const chart2=document.getElementById('chart2').getContext('2d');
const myChart2=new Chart(chart2,{
    type:'doughnut',
    data:{
        labels:['Jan','Feb','Mar'],
        datasets:[{
            label:"last week",
            data:[60,0,88],
            backgroundColor:['#8c68cd','#457','#h7890'],
        }]
    },
})  