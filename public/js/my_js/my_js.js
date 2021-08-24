$(document).ready(function(){

    $(document).on('click', 'ul li a', function(){
        $(this).addClass('active');
    });

    $('#form_edit').hide();

    $('#edit_profil').on('click', function(){
        $('#profil1').removeClass();
        $('#profil2').removeClass();
        $('#form_edit').show();
        $('#profil1').addClass('col-lg-6');

    });

    $('#form_izin').hide();

    $('#tombol_izin').on('click', function(){
        $('#form_izin').show();

    });
    
    $('#card').css('width', '100%');
    $('#content-wrapper').css('background-color', '#FFFFFF');
    $('#no_plat').css('background-color', '#FFFFFF');

    $('#id_kendaraan').on('change', function(){
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                 data =  JSON.parse(xhr.responseText);
                $('#no_plat').val(data.no_plat);
            }
        }

        var id_kendaraan = document.getElementById('id_kendaraan').value;

        xhr.open('GET', '/pembelian/target?id_kendaraan='+id_kendaraan, true);
        xhr.send();

    });



    
});