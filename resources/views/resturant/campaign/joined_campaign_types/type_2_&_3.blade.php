@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
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
        @forelse ($campaign_vendor as $cam_vendor)
        <tr>
            <td style="width: 30%">
                <select name="category_id[]" id="category_id{{ $loop->index }}" data-i="{{ $loop->index }}" class="form-control select2 category_id"
                    required style="width: 100%">
                    <option selected disabled>Select Category</option>
                    @forelse ($resturant_category as $row)
                    <option value="{{ $row->resturant_cat_id }}" @if ($campaign_vendor->
                        pluck('category_id')->contains($row->resturant_cat_id))
                        selected
                        @endif
                        >{{ $row->cat_name }}</option>
                    @empty
                    @endforelse
                </select>
            </td>
            <td style="width: 30%">
                {{-- Products --}}
                <select name="product_id[]" id="product_id{{ $loop->index }}" data-i="{{ $loop->index }}" class="form-control select2 product_id" required
                    style="width: 100%">
                    <option selected disabled>Select Product</option>
                    @php
                      $product=  App\Campaign::joinedProductDetails($cam_vendor->product_id)
                    @endphp
                    <option value="{{ $product->product_id }}" selected>{{ $product->product_name }}</option>
                </select>
            </td>
            <td style="width: 30%">
                <input type="number" class="form-control" placeholder="Discount %" id="discount{{ $loop->index }}" name="discount[]"
                    data-i="{{ $loop->index }}" value="{{ $cam_vendor->discount }}" step=".01">
            </td>
            <td style="width: 10%">
                <a href="javascript:;" class="remove_row" data-i="{{ $loop->index }}"><i class="fa fa-window-close text-danger" style="font-size: 24px"></i></a>
            </td>
        </tr>
        @if (!$loop->last)
        <tr id="info_index{{ $loop->index }}">
            <td colspan="4" class="text-center bg-secondary font-weight-bold" >Product</td>
        </tr>
        @endif
        @empty
        <tr>
            <td style="width: 30%">
                <select name="category_id[]" id="category_id" data-i="" class="form-control select2 category_id"
                    required style="width: 100%">
                    <option selected disabled>Select Category</option>
                    @forelse ($resturant_category as $row)
                    <option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>
                    @empty
                    @endforelse
                </select>
            </td>
            <td style="width: 30%">
                {{-- Products --}}
                <select name="product_id[]" id="product_id" data-i="" class="form-control select2 product_id" required
                    style="width: 100%">
                    <option selected disabled>Select Product</option>
                </select>
            </td>
            <td style="width: 30%">
                <input type="number" class="form-control" placeholder="Discount %" id="discount" name="discount[]"
                    data-i="">
            </td>
            <td style="width: 10%">
                <a href="javascript:;" class="remove_row" data-i=""><i class="fa fa-window-close text-danger" style="font-size: 24px"></i></a>
            </td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"><button class="btn btn-primary btn-block" type="button" id="add_more_btn"> Add More</button>
            </th>
        </tr>
    </tfoot>
</table>
@php
    
@endphp
@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        var j = "{{count($campaign_vendor)??1}}";
        $('#add_more_btn').on('click', function () {
            $('#products_body').append('<tr id="info_index' + j + '">' +
                '<td colspan="4" class="text-center bg-secondary font-weight-bold" >Product</td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 33%">' +
                '<select name="category_id[]" id="category_id' + j + '" data-i="' + j +
                '" class="form-control select2 category_id"' +
                'required style="width: 100%">' +
                '<option selected disabled>Select Category</option>' +
                '@forelse ($resturant_category as $row)' +
                '<option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>' +
                '@empty' +
                '@endforelse' +
                '</select>' +
                '</td>' +
                '<td style="width: 33%">' +
                '{{-- Products --}}' +
                '<select name="product_id[]" id="product_id' + j + '" data-i="' + j +
                '" class="form-control select2 product_id" required' +
                'style="width: 100%">' +
                '<option selected disabled>Select Product</option>' +
                '</select>' +
                '</td>' +
                '<td style="width: 33%">' +
                '<input type="number" class="form-control" placeholder="Discount %" id="discount' +
                j + '" name="discount[]" data-i="' + j + '" step=".01">' +
                '</td>' +
                '<td style="width: 10%">' +
                '<a href="javascript:;" class="remove_row" data-i="' + j + '">' +
                '<i class="fa fa-window-close text-danger" style="font-size: 24px"></i>' +
                '</a>' +
                '</td>' +
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
    $(document).on('click', '.remove_row', function () {
      $(this).parent().parent().remove();
      var i= $(this).data('i');
      $('#info_index'+(--i)).remove();
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