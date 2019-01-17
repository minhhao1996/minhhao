<div class="search-box">
    <form action="{{route('MainSearch')}}" method="get"  class="search form-inline">
        @csrf
        <div class="form-group input-serach" style="position: relative">
            <input type="text" name="search" class="search_box" id="txtSearch" placeholder="Nhập từ khóa tìm kiếm.."/>
            <div id="searchList"><br>
            </div>
        </div>
        <button type="submit"  id="btnsearch" class="pull-right btn-search">
            <span class="hidden-400">Tìm kiếm</span>
            <span class="show-400"><i class="fa fa-search" aria-hidden="true"></i></span>
        </button>
    </form>

    <script>

            $(document).ready(function(){
                $('#txtSearch').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm

                    var query = $(this).val(); //lấy gía trị ng dùng gõ
                    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                    {
                        var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                        $.ajax({
                            url:"{{ route('MainSearch') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                            method:"GET", // phương thức gửi dữ liệu.
                            data:{query:query, _token:_token},
                            success:function(data){ //dữ liệu nhận về

                                $('#countryList').fadeIn();
                                $('#searchList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                            }
                        });
                    }
                });

                $('#searchList').on('click', 'li', function(){
                    $('#txtSearch').val($(this).text());
                    $('#searchList').fadeOut();
                });
            });

    </script>

</div>