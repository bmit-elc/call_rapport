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

/*Current date*/
function updateDateTime() {
  const todayDateElement = document.querySelector('.todayDate');
  const timeNowElement = document.querySelector('.timeNow');

  const now = new Date();
  const optionsDate = { year: 'numeric', month: '2-digit', day: '2-digit' };
  const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

  const formattedDate = now.toLocaleDateString('de-DE', optionsDate);
  const formattedTime = now.toLocaleTimeString('de-DE', optionsTime);

  if (todayDateElement !== null){
    Element.textContent = 'your text content';
  } else {
    console.error('Element not found')
  }

  console.log(formattedDate);

  todayDateElement.textContent = formattedDate;
  timeNowElement.textContent = formattedTime;
}

// Aktualisiere das Datum und die Uhrzeit alle Sekunde
setInterval(updateDateTime, 1000);

// Initial das Datum und die Uhrzeit anzeigen
updateDateTime();