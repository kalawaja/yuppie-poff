let durumlar = [];

let chartData = {
    labels: [],
    datasets: [{
        label: 'Yuppie-Ehh-Poff Chart',
        data: [],
        backgroundColor: 'rgba(233, 255, 92, 0.3)',
        borderColor: 'rgba(233, 255, 92,1)',
        color: "#fff",
        borderWidth: 1
    }]
};

let chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        xAxes: [{
            display: true
        }],
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};

let myChart = new Chart(document.getElementById('chart'), {
    type: 'line',
    data: chartData,
    options: chartOptions
});

function gonder() {
    let text = document.getElementById("text").value;
    if (text.length > 0) {
        let emoji = document.querySelector('input[name="emoji"]:checked').value;

        let puan = 0;
        let divClass = "";
        if (emoji === "mutlu") {
            divClass = "sonuc-mutlu";
            if (durumlar.length > 0 && durumlar[0].puan > 0) {
                puan = durumlar[0].puan + 1.0;
            } else {
                puan = 1;
            }
        } else if (emoji === "uzgun") {
            divClass = "sonuc-uzgun";
            if (durumlar.length > 0 && durumlar[0].puan < 0) {
                puan = durumlar[0].puan - 1;
            } else {
                puan = -1.0;
            }
        } else {
            divClass = "sonuc-notr";
            if (durumlar.length > 0) {
                puan = durumlar[0].puan;
            } else {
                puan = 0.0;
            }
        }

        let isim = getIsim();
        document.cookie = `isim=${encodeURIComponent(isim)}; expires=${getExpiryDate(365)}`;

        durumlar.unshift({
            isim: isim,
            puan: puan,
            saat: new Date()
        });

        let saat = new Date().toLocaleTimeString();
        let index = chartData.labels.indexOf(saat);
        if (index === -1) {
            chartData.labels.push(saat);
            chartData.datasets[0].data.push(puan);
        } else {
            chartData.datasets[0].data[index] = puan;
        }

        myChart.update();

        let sonucDiv = document.getElementById("sonuc");
        sonucDiv.innerHTML = `<div class="${divClass}"><strong style='font-weight:900'>${isim} (${saat}):</strong> ${text}</div>` + sonucDiv.innerHTML;
        document.getElementById("text").value = "";

        listele();
    }
}


function listele() {
    let listeDiv = document.getElementById("liste");
    listeDiv.innerHTML = "<h2>İsimler ve Durumları</h2>";
    listeDiv.innerHTML += "<ul>";

    for (let i = 0; i < durumlar.length; i++) {
        listeDiv.innerHTML += `<li>${durumlar[i].isim}: ${durumlar[i].durum}</li>`;
    }

    listeDiv.innerHTML += "</ul>";
}

function getIsim() {
    let isim = getCookie("isim");
    if (!isim) {
        isim = prompt("Please enter a username:");
        if (!isim) {
            isim = "T€st";
        }
        document.cookie = `isim=${encodeURIComponent(isim)}; expires=${getExpiryDate(365)}`;
    }
    return isim;
}

function getCookie(name) {
    let cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
        let parts = cookies[i].split("=");
        if (parts[0] === name) {
            return decodeURIComponent(parts[1]);
        }
    }
    return null;
}

function getExpiryDate(days) {
    let date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    return date.toUTCString();
}

let isim = getIsim();
document.cookie = `isim=${encodeURIComponent(isim)}; expires=${getExpiryDate(365)}`;
document.getElementById("username").textContent = isim;