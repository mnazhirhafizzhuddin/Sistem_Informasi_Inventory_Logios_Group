<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">nama barang</label>
                    <input type="text" class="form-control" id="namabarang">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Jenis barang</label>
                    <input type="text" class="form-control" id="jenisbarang">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Varian</label>
                    <input type="text" class="form-control" id="varian">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Satuan</label>
                    <input type="text" class="form-control" id="satuan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">harga</label>
                    <input type="text" class="form-control" id="harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Stok</label>
                    <input type="text" class="form-control" id="stok">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let namabarang   = $('#namabarang').val();
        let jenisbarang = $('#jenisbarang').val();
        let varian = $('#varian').val();
        let satuan = $('#satuan').val();
        let harga = $('#harga').val();
        let stok = $('#stok').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/posts`,
            type: "POST",
            cache: false,
            data: {
                "namabarang": namabarang, //
                "jenisbarang": jenisbarang,
                "varian": varian,
                "satuan": satuan,
                "jenisbarang": harga,
                "jenisbarang": stok, // TOD
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.idbarang}">
                        <td>${response.data.namabarang}</td>
                        <td>${response.data.jenisbarang}</td>
                        <td>${response.data.varian}</td>
                        <td>${response.data.satuan}</td>
                        <td>${response.data.harga}</td>
                        <td>${response.data.stok}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.idbarang}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.idbarang}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to table
                $('#table-posts').prepend(post);

                //clear form
                $('#namabarang').val('');
                $('#jenisbarang').val('');
                $('#varian').val('');
                $('#satuan').val('');
                $('#harga').val('');
                $('#stok').val('');
                //close modal
                $('#modal-create').modal('hide');


            },
            error:function(error){

                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                }

                if(error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content').removeClass('d-none');
                    $('#alert-content').addClass('d-block');

                    //add message to alert
                    $('#alert-content').html(error.responseJSON.content[0]);
                }

            }

        });

    });

</script>
