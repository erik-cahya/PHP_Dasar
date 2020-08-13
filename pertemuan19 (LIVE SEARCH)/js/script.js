// ambil element element yang dibutukan (keyword,tombol-cari & container) / sesuaikan dengan id="" pada html
//  menggunakan teknik penelusuran DOM


// cara baca syntax : 
// javascript tolong carikan saya element yang punya id keyword, yang ada di dalam document. kalau ketemu nanti element tersebut masuk ke dalam variabel keyword (var keyword)
// ---------------------------------
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');
// ---------------------------------

// cara baca syntax :
// javascript tolong carikan saya element pada tombolCari, kalau ketemu, jalankan event dan function berikut ketika tombolnya di click
// jadi ketika tombol search data pada website ditekan, maka akan muncul alert bertuliskan berhasil
// ---------------------------------
// tombolCari.addEventListener('click', function(){
//     alert('berhasil');
// });
// ---------------------------------


// tambahkan event ketika keyword ditulis

// ada 2 event : keypress(ketika kita mengetik sesuatu di dalam inputannya), keyup(ketika kita ngelepasin tangan dari keyboard)
keyword.addEventListener('keyup', function(){

    // keyword.value adalah ambil inputnya/keyword lalu value adalah apapun yang diketikkan oleh user 
    // ---------------------------------
    // console.log(keyword.value);
    // ---------------------------------



    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200){
            // responseText : adalah berfungsi untuk melihat isi apapun dari sebuah sumber
            // ---------------------------------
            // console.log(xhr.responseText);
            // ---------------------------------

            
            container.innerHTML = xhr.responseText;

        }
    }

    // eksekusi ajax   
    // request ke mahasiswa.php sekaligus mengirimkan data keyword, agar dapat digunakan disana
    // tanda + berfungsi untuk menggabungkan string (value yang akan diketikkan oleh user) 
    xhr.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();
}); 


