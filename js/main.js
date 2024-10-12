document.title = 'ProboLezat'

const judul = document.getElementById('judul')

function ubahWarna(){
    judul.style.color = 'white'
}

function warnaAsli(){
    judul.style.color = 'black '
}

// toast / snackbar
function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

const ubah = document.getElementById("snackbar")

function sentuh(){
    ubah.style.background = '#eba416'
    ubah.style.color = 'white'
}

function lepas(){
    ubah.style.background = 'white'
    ubah.style.color = '#ffb72b'
}