
    $('document').ready(function ()
    {
        //Add Catalog
        $(".add_btn").on('click', function ()
            {
                $("#add_form_hidden").removeClass("hidden");
            });

        //Addd Product
        $('#add-prd').on('click',function(){
            $("#edit_prd_hidden").removeClass("hidden");
            $('#save-btn').attr('name','submit-add');
            $('#product_name').attr('name','name-add');
            $('#product_price').attr('name','price-add');
            $('#product_sale').attr('name','sale-add');
            $('#product_detail').attr('name','detail-add');
            $('#catalog').attr('name','catalog-add[]');
            $('#amount').attr('name','amount-add');
            $('#new').attr('name','new-add');
            $('#hot').attr('name','hot-add');
        });
        //Edit Catalog
        $(".edit-btn").on('click', function ()
            {
                $("#edit_form_hidden").removeClass("hidden");
                $('#edit_hidden_id').val($(this).data("id")) ;
                $('#product_type_edit').val($(this).data("name"));
                $('#active_edit').val($(this).data("active")) ;

            });
        //Edit Product
        $('.edit-prd').on('click',function(){
            $("#edit_prd_hidden").removeClass("hidden");
            $id = $(this).data("id");
            $new = $(this).data("new");
            $hot = $(this).data("hot");
            $type = $(this).data("type");

            $('#hidden_prd_id').val($id);
            $('#product_choose').val($id);
            $('#product_name').val($(".name_"+$id+" span").text());
            $('#product_price').val($(".price_"+$id+" span").text());
            $('#product_sale').val($(".sale_"+$id+" span").text());
            $('#product_detail').val($(".detail_"+$id+" span").text());
            $('#catalog').val($type);
            $('#amount').val($(".amount_"+$id+" span").text());
            if ($hot == "1") {
                $("#hot").prop('checked', true);
            }else{
                $("#hot").prop('checked', false);
            }
            if ($new == "1") {
                $("#new").prop('checked', true);
            }else{
                $("#new").prop('checked', false);
            }
            $img = "";
            $(".img_"+$id).each(function () {
                 $img += "<div class='img-mini-wrapper col-3'><img class='mini-img' name='show-img-mini' src="+$(this).text()+"><label data-id="+$(this).data('idimg')+" class='btn-del-img'><i class='icon-close-circle-outline'></i></lable></div>";
                $('.show-img').html($img);
            });
            //Delete Image
            $(".btn-del-img").on('click', function ()
                {
                    $("#del-img-hidden").removeClass("hidden");
                    $('#img_hidden_id').val($(this).data("id")) ;
                });
        });

        //Delete Catalog
        $(".del-btn").on('click', function ()
            {
                $("#del-form-hidden").removeClass("hidden");
                $('#hidden_id').val($(this).data("id")) ;
            });
        //Delete Product
        $(".del-prd").on('click', function ()
            {
                $("#del-form-hidden").removeClass("hidden");
                $('#hidden_id').val($(this).data("id")) ;
            });
        
        //Accept _ Cancel button
        
        $(".btn_cancel").on('click', function ()
            {
                $(".form-hidden").addClass("hidden");
            });
        $(".btn-close").on('click', function ()
            {
                $("#edit_prd_hidden").addClass("hidden");
            });


        //Active Panel
        $('.nav-panel').on('click',function(){
            $('.nav-panel').removeClass('active');
            $(this).addClass('active');
        });

        //Search Item
        $("#search_form").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table_search tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

        //Data Table
        $('#data_table').DataTable({
            responsive: true,
            dom       : 'rt<"dataTables_footer"ip>'
        });
        
    });

        // Xem hình ảnh trước khi upload
        function previewImg(event) {
                 // Gán giá trị các file vào biến files
                var files = document.getElementById('customFile').files; 
             
                // Show khung chứa ảnh xem trước
                $('#formUpload .box-preview-img').show();
             
                // Thêm chữ "Xem trước" vào khung
                $('#formUpload .box-preview-img').html('<p>Xem trước</p>');
             
                // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
                for (i = 0; i < files.length; i++)
                {
                    // Thêm thẻ img theo i
                    $('#formUpload .box-preview-img').append('<img src="" id="' + i +'">');
             
                    // Thêm src vào mỗi thẻ img theo id = i
                    $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
                }   
            }
    // Xử lý ảnh và upload
    $('#formUpload .add-img').on('click', function() {
                // Gán giá trị của nút chọn tệp vào var img_file
                $img_file = $('#formUpload #img_file').val();
             
                // Cắt đuôi của file để kiểm tra
                $type_img_file = $('#formUpload #img_file').val().split('.').pop().toLowerCase();
             
                // Nếu không có ảnh nào
                if ($img_file == '')
                {
                    // Show khung kết quả
                    $('#formUpload .output').show();
             
                    // Thông báo lỗi
                    $('#formUpload .output').html('Vui lòng chọn ít nhất một file ảnh.');
                }
                // Ngược lại nếu file ảnh không hợp lệ với các đuôi bên dưới
                else if ($.inArray($type_img_file, ['png', 'jpeg', 'jpg', 'gif']) == -1)
                {
                    // Show khung kết quả
                    $('#formUpload .output').show();
             
                    // Thông báo lỗi
                    $('#formUpload .output').html('File ảnh không hợp lệ với các đuôi .png, .jpeg, .jpg, .gif.');
                }
                // Ngược lại
                else
                {
                    // Tiến hành upload 
                    $('#formUpload').ajaxSubmit({ 
                        // Trước khi upload
                        beforeSubmit: function() {
                            target:   '.output',
             
                            // Ẩn khung kết quả
                            $('.output').hide();
            
                        },
             
                        // Sau khi upload xong
                        success: function() {    
                            // Show khung kết quả 
                            $('.output').show();
             
                            // Thêm class success vào khung kết quả
                            $('.output').addClass('success');
             
                            // Thông báo thành công
                            $('.output').html('Upload Succesful.');
                        },
                        // Nếu xảy ra lỗi
                        error : function() {
                            // Show khung kết quả
                            $('.output').show();
             
                            // Thông báo lỗi
                            $('.output').html('Can not upload this file, try again late.');
                        }
                    }); 
                    return false; 
                }
            });
    function validateForm()
        {
            // Lấy giá trị của username và password
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
         
            //Kiểm tra dữ liệu hợp lệ hay không
            if (username == ''){
                document.getElementById('error-form-hidden').classList.remove("hidden");
                document.getElementById('output_error').innerHTML = "Username Empty!!";
                }
                else if (password == '')
                {
                    document.getElementById('error-form-hidden').classList.remove("hidden");
                    document.getElementById('output_error').innerHTML = "Password Empty!!";
                }
            else{return true;}
         
        return false;
        }
    