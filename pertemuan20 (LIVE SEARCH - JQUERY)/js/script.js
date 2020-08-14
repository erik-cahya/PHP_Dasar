// $(document) adalah pemanggil jquery
// atau sama saja dengan kita menuliskan JQuery(document)

// cara baca : jquery, tolong ambilkan saya document (atau apapun yang dituliskan di dalam kurungnya) & ketika document tersebut siap, jalankan function berikut


$(document).ready(function(){

    // menghilangkan tombol cari
    // hide() : untuk menghilangkan suatu objek yang dipilih
    // #tombol cari : menggunakna kress (#) karena objek menggunakan div id="" 
    $('#tombol-cari').hide();

// ---------------------------------------
    // var keyword = document.getElementById('keyword');
    // keyword.addEventListener('keyup', function(){
    //     console.log('ok!!');
    // });
// ---------------------------------------

    

    // menambahkan ketika event ketika keyword ditulis
    // on : adalah addEventListener pada javascript
    $('#keyword').on('keyup', function(){


        // munculkan icon loading
        $('.loader').show();



        // ajax menggunakan .GET
        // cara baca : jquery, lakukan get, get ke ajax/mahasiswa.php dan ambil datanya, ketika data sudah didapat, lakukan sesuatu sambil mengirimkan data
        // data menggantikan xhr response text di javascript sebelumnya

        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){

            // kita akan ganti data pada #container dengan function(data)
            $('#container').html(data);


            // hilangkan loader ketika data sudah ketemu
            $('.loader').hide();

          
          

        });




        // ajax menggunakan load
        // val : value
        // load : xhr.open 
        // fungsi load : memiliki keterbatasan, ia hanya bisa menjalankan fungsi get saja, untuk post, harus menggunakan jquery yang lain

        // ---------------------------------------
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
        // ---------------------------------------


        






    });     

});