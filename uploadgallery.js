$(document).ready(function(){
        var form_data = new FormData(); 

        /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
        $(document).on('change','#upload_file',function(){
            $('.preview').html("");
            len_files = $("#upload_file").prop("files").length;
            for (var i = 0; i < len_files; i++) {
                var file_data = $("#upload_file").prop("files")[i];
                form_data.append("upload_file[]", file_data);
                var construc = '<img width="200px" height="200px" src="' +  window.URL.createObjectURL(file_data) + '" alt="'  +  file_data.name  + '" />';
                $('.preview').append(construc); 
            }
        }); 

        /* WHEN YOU CLICK ON THE IMG IN ORDER TO DELETE IT */
        $(document).on('click','img',function(){
            var filename = $(this).attr('alt');
            var newfilename = filename.replace(/\./gi, "_");
            form_data.delete($(this).attr('alt'));
            $(this).remove();
        });

        /* UPLOAD CLICK */
        $(document).on("click", "#upload", function() {
            $.ajax({
                url: "upload.php",
                dataType: 'image/png',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data, // Setting the data attribute of ajax with form_data
                type: 'post',
                success: function(data) {
                    //console.log("data")'  
                }
            });
        });
    });