function add_to_cart(e, id_produk, link){
	e.preventDefault();
	var qty = $("#item_quantity"+id_produk).val();
	console.log(id_produk, qty,'<?php echo base_url() ?>');

	// $.ajax({
 //    url: "<?php echo site_url('location/kelurahan/ajax_get_kota_by_id_provinsi') ?>" + '/' + id_provinsi,
 //    dataType: 'json',
 //    success: function(data){
 //      if(data.length > 0){
 //        $('#kota').html('<option value="">-- Pilih --</option>');
 //      }else{
 //        $('#kota').html('<option value="">-- Tidak ada --</option>');
 //      }
 //      $.each(data, function(i, object){
 //        $('#kota').append('<option value="' + object['id'] + '">' + object['nama'] + '</option>');
 //      });
 //      $("#kota").change();
 //      $('.loading-kota').html('');
 //    }
 //  });
}