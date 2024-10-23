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

// Fungsi Modal
function bukaModal(kategori) {
    document.getElementById("myModal").style.display = "flex";

    document.getElementById("kategori-detail").innerText = "Detail " + kategori;

    document.getElementById("nama").value = "";
    document.getElementById("nomorhp").value = "";
    document.getElementById("alamat").value = "";
}

function tutupModal() {
    document.getElementById("myModal").style.display = "none";
}

function tutupModal2() {
    document.getElementById("myModal2").style.display = "none";
}
function bukaModal2() {
    tutupModal(); // Tutup modal pertama
    document.getElementById("myModal2").style.display = "flex";

    var nama = document.getElementById("recipient-name").value;
    var nomorhp = document.getElementById("handphone").value;
    var alamat = document.getElementById("alamat-text").value;

    document.getElementById("detail-nama").value = nama;
    document.getElementById("detail-nomorhp").value = nomorhp;
    document.getElementById("detail-alamat").value = alamat;
}
function kembaliKeModalPertama() {
    tutupModal2();
    bukaModal();
}
function lakukanPembayaran() {
    alert("Pembayaran berhasil!");
    tutupModal2();
}

// tambahan web storage, asychronous, promise, fetch
// Event untuk membuka modal dan mengisi detail dari item yang dipilih
function bukaModal(item) {
    document.getElementById("myModal").style.display = "flex";
    document.getElementById("detail-kategori").value = item;
    let harga;
    switch(item) {
        case 'Anggur': 
            harga = '20.000'; 
            break;
        case 'Bawang Goreng': 
            harga = '50.000'; 
            break;
        case 'Keripik Kentang Bromo': 
            harga = '25.000'; 
            break;
        default: 
            harga = '0';
    }
    document.getElementById("detail-harga").value = harga;
}

// Fungsi untuk menyimpan data ke localStorage
function simpanDataPembayaran() {
    const nama = document.getElementById("recipient-name").value;
    const noHp = document.getElementById("handphone").value;
    const alamat = document.getElementById("alamat-text").value;

    // Simpan ke localStorage
    localStorage.setItem("nama", nama);
    localStorage.setItem("noHp", noHp);
    localStorage.setItem("alamat", alamat);
}

// Event handler untuk melakukan pembelian dengan Fetch API
async function lakukanPembayaran() {
    // Ambil data dari localStorage
    const nama = localStorage.getItem("nama");
    const noHp = localStorage.getItem("noHp");
    const alamat = localStorage.getItem("alamat");
    const kategori = document.getElementById("detail-kategori").value;
    const harga = document.getElementById("detail-harga").value;

    // Simulasi POST request menggunakan Fetch API
    const data = {
        nama: nama,
        noHp: noHp,
        alamat: alamat,
        kategori: kategori,
        harga: harga
    };

    try {
        let response = await fetch('https://jsonplaceholder.typicode.com/posts', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        });

        let result = await response.json();
        console.log('Pembayaran berhasil:', result);

        // Tampilkan pesan sukses
        alert('Pembayaran berhasil! Data telah terkirim.');
    } catch (error) {
        console.error('Error saat melakukan pembayaran:', error);
        alert('Pembayaran gagal, coba lagi.');
    }

    // Tutup modal
    tutupModal2();
}

// Event untuk membuka modal pembayaran kedua
function bukaModal2() {
    simpanDataPembayaran(); // Simpan data terlebih dahulu
    document.getElementById("myModal").style.display = "none";
    document.getElementById("myModal2").style.display = "flex";
    
    // Isi modal kedua dengan data dari localStorage
    document.getElementById("detail-nama").value = localStorage.getItem("nama");
    document.getElementById("detail-nomorhp").value = localStorage.getItem("noHp");
    document.getElementById("detail-alamat").value = localStorage.getItem("alamat");
}

// Event untuk menutup modal
function tutupModal() {
    document.getElementById("myModal").style.display = "none";
}

function tutupModal2() {
    document.getElementById("myModal2").style.display = "none";
}

// Event untuk kembali ke modal pertama
function kembaliKeModalPertama() {
    document.getElementById("myModal2").style.display = "none";
    document.getElementById("myModal").style.display = "flex";
}

