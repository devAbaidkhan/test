@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<style>
    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }
</style>
@endpush
<table class="table table-bordered">
    <thead>
        
        <tr>
            <th colspan="3">Compaign Products</th>
        </tr>
    </thead>
    <tbody id="products_body">
        <tr>
            <td style="width: 33%">
                <select name="category_id[]" id="category_id" data-i="" class="form-control select2 category_id"
                    required style="width: 100%">
                    <option selected disabled>Select Category</option>
                    @forelse ($resturant_category as $row)
                    <option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>
                    @empty
                    @endforelse
                </select>
            </td>
            <td style="width: 33%">
                {{-- Products --}}
                <select name="product_id[]" id="product_id" data-i="" class="form-control select2 product_id" required
                    style="width: 100%">
                    <option selected disabled>Select Product</option>
                </select>
            </td>
            <td style="width: 33%">
                <input type="number" class="form-control" placeholder="Discount %" id="discount" name="discount[]" data-i="" step=".01">
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"><button class="btn btn-primary btn-block" type="button" id="add_more_btn"> Add More</button></th>
          </tr>
    </tfoot>
</table>

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous"></script>
    
<script>
    $(document).ready(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        var j = 1;
        $('#add_more_btn').on('click', function () {
            $('#products_body').append('<tr>'+
            '<td colspan="3" class="text-center bg-secondary font-weight-bold" >Product</td>'+
        '</tr>'+
        '<tr>'+
            '<td style="width: 33%">'+
                '<select name="category_id[]" id="category_id'+j+'" data-i="'+j+'" class="form-control select2 category_id"'+
                    'required style="width: 100%">'+
                    '<option selected disabled>Select Category</option>'+
                    '@forelse ($resturant_category as $row)'+
                    '<option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>'+
                    '@empty'+
                    '@endforelse'+
                '</select>'+
            '</td>'+
            '<td style="width: 33%">'+
                '{{-- Products --}}'+
                '<select name="product_id[]" id="product_id'+j+'" data-i="'+j+'" class="form-control select2 product_id" required'+
                    'style="width: 100%">'+
                    '<option selected disabled>Select Product</option>'+
                '</select>'+
            '</td>'+
            '<td style="width: 33%">'+
                '<input type="number" class="form-control" placeholder="Discount %" id="discount'+j+'" name="discount[]" data-i="'+j+'" step=".01">'+
            '</td>'+
        '</tr>');
                $('.select2').select2({
                    theme: 'bootstrap4'
                });
            j++;
        });
    });
    $(document).on('change', '.category_id', function () {
        var category_id = $(this).val();
        var i = $(this).data('i');
        console.log(i);
        product_dropdown(category_id, i);
    });


    function product_dropdown(category_id, i) {
        $.ajax({
            type: "POST",
            url: "{{route('restaurant.get_category_products')}}",
            data: {
                _token: '{{csrf_token()}}',
                category_id: category_id,
            },
            beforeSend: function () {
                loader();
            },
            success: function (data) {
                swal.close();
                $('#product_id' + i).empty();
                $('#product_id' + i).append($('<option>', {
                    selected: true,
                    disable: true,
                    text: "Select Product"
                }));
                $.each(data, function (index, item) {
                    $('#product_id' + i).append($('<option>', {
                        value: item.product_id,
                        text: item.product_name
                    }));
                });
            },
            complete: function () {
                swal.close();
            }
        });
    }
</script>
@endpush