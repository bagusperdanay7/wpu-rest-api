let mahasiswa = {
    nama: "Sandhika Galih",
    nrp: "030403023",
    email: "sandhika@gmail.com"
}

// Object -> JSON
let data = JSON.stringify(mahasiswa);

console.log(data);

// tampil html
const paragraf = document.createElement("p");
const hasil = document.createTextNode(data);
paragraf.appendChild(hasil);
document.body.appendChild(paragraf);

// JSON -> Object
// Vanilla Javascript
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mhs = JSON.parse(this.responseText);
//         console.log(mhs);
//     }
// }

// xhr.open('GET', 'coba.json', true);
// xhr.send();

// Jquery
$.getJSON("coba.json", function (result) {
    console.log(result);
});