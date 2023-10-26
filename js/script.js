/* let client = new XMLHttpRequest();
client.open('GET', './TicketCollector.xml');
client.onreadystatechange = function(){
    let response = client.responseText,
        parser = new DOMParser(),
        xmlDoc = parser.parseFromString(response, "text/xml");
}
client.send();

function myFunction(xml) {
    let xmlDoc = xml.responseXML;
    document.getElementById("result").innerHTML=
    xmlDoc.getElementsByTagName("TicketType")[0];
} */

function searchXML(){
    xmlDoc = loadXMLDoc("TicketCollector.xml");
    x = xmlDoc.getElementsByTagName("DialledNumber");
    input = document.get
}

const ctx = document.getElementById('myChart');

let y = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['lange Anrufe', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# von Anrufen',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

function removeData(chart) {
  chart.data.labels.pop();
  chart.data.datasets.forEach((dataset) => {
      dataset.data.pop();
  });
  chart.update();
}



const but1 = document.getElementById('getData');

but1.addEventListener('click', removeData(y));




