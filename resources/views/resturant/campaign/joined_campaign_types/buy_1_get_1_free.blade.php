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
<table class="table table-bordered mt-2">
  <thead>

    <tr>
      <th>Buy This Product</th>
      <th>Select Free Product</th>
    </tr>
  </thead>
  <tbody id="products_body">
    @forelse ($campaign_vendor->where('product_type','buy') as $cam_vendor)
    <tr>
      <td colspan="2" class="text-center bg-secondary font-weight-bold"> Product </td>
      <td>
        <a href="javascript:;" class="remove_row" data-i="{{ $loop->index }}"><i class="fa fa-window-close text-danger"
            style="font-size: 24px"></i></a>
      </td>
    </tr>
    {{-- Product Category --}}
    <tr id="category_tr{{ $loop->index }}">
      <td>
        {{-- Buy --}}
        <select name="buy_category_id[]" id="buy_category_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 buy_category_id" required style="width: 100%">
          <option disabled>Select Category</option>
          @php
          $category= App\Campaign::resturant_category($cam_vendor->category_id)
          @endphp
          <option value="{{ $category->resturant_cat_id }}" selected>{{ $category->cat_name }}</option>
        </select>
      </td>
      <td>
        {{-- Free --}}
        <select name="free_category_id[]" id="free_category_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 free_category_id" required style="width: 100%">
          <option selected disabled>Select Category</option>
          @php
          $category= App\Campaign::freeCategory($cam_vendor->id)
          @endphp
          <option value="{{ $category->resturant_cat_id }}" selected>{{ $category->cat_name }}</option>
        </select>
      </td>
    </tr>
    {{-- Product --}}
    <tr id="product_tr{{ $loop->index }}">
      <td>
        {{-- Buy Products --}}
        <select name="buy_product_id[]" id="buy_product_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 buy_product_id" required style="width: 100%">
          <option selected disabled>Select Product</option>
          @php
          $product= App\Campaign::joinedProductDetails($cam_vendor->product_id)
          @endphp
          <option value="{{ $product->product_id }}" selected>{{ $product->product_name }}</option>
        </select>
      </td>
      <td>
        {{-- Free Products --}}
        <select name="free_product_id[]" id="free_product_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 free_product_id" required style="width: 100%">
          <option selected disabled>Select Product</option>
          @php
          $product= App\Campaign::freeProduct($cam_vendor->id);
          @endphp
          <option value="{{ $product->product_id }}" selected>{{ $product->product_name }}</option>
        </select>
      </td>
    </tr>
    {{-- Product varients --}}
    <tr id="varient_tr{{ $loop->index }}">
      <td>
        {{-- Buy Products Varients --}}
        <select name="buy_varient_id[]" id="buy_varient_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 buy_varient_id" required style="width: 100%">
          <option selected disabled>Select Varients</option>
          @php
          $buy_varient=App\Campaign::buyVarient($cam_vendor->variant_id);
          @endphp
          <option value="{{ $buy_varient->variant_id }}" selected>{{ $buy_varient->quantity.' '.$buy_varient->unit }}
          </option>
        </select>
      </td>
      <td>
        {{-- Free Products Varients  --}}
        @php
        $freevarient=App\Campaign::freeVarient($cam_vendor->id);
        @endphp
        <select name="free_varient_id[]" id="free_varient_id{{ $loop->index }}" data-i="{{ $loop->index }}"
          class="form-control select2 free_varient_id" required style="width: 100%">
          <option selected disabled>Select Varients</option>
          <option value="{{ $freevarient->variant_id }}" selected>{{ $freevarient->quantity.' '.$freevarient->unit }}
          </option>
        </select>
      </td>
      
    </tr>
    
    @empty
    @endforelse

  </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><button class="btn btn-primary btn-block" type="button" id="add_more_btn"> Add More</button></th>
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
    var j = "{{count($campaign_vendor)??1}}";
    $('#add_more_btn').on('click', function () { 
      $('#products_body').append('<tr>' +
        '<td colspan="2" class="text-center bg-secondary font-weight-bold"> Product </td>' +
        '<td>'+
        '<a href="javascript:;" class="remove_row" data-i="' + j + '"><i class="fa fa-window-close text-danger" style="font-size: 24px">'+'</i></a>'+
        '</td>'+
        '</tr>{{-- Product Category --}}' +
        '<tr id="category_tr'+j+'">' +
        '<td>' +
        '{{-- Buy --}}' +
        '<select name="buy_category_id[]" id="buy_category_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 buy_category_id" required style="width: 100%">' +
        '<option selected disabled>Select Category</option>' +
        '@forelse ($resturant_category as $row)' +
        '<option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>' +
        '@empty' +
        '@endforelse' +
        '</select>' +
        '</td>' +
        '<td>' +
        '{{-- Free --}}' +
        '<select name="free_category_id[]" id="free_category_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 free_category_id" required style="width: 100%">' +
        '<option selected disabled>Select Category</option>' +
        '@forelse ($resturant_category as $row)' +
        '<option value="{{ $row->resturant_cat_id }}">{{ $row->cat_name }}</option>' +
        '@empty' +
        '@endforelse' +
        '</select>' +
        '</td>' +
        '</tr>' +
        '{{-- Product --}}' +
        '<tr id="product_tr'+j+'">' +
        '<td>' +
        '{{-- Buy Products --}}' +
        '<select name="buy_product_id[]" id="buy_product_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 buy_product_id" required style="width: 100%">' +
        '<option selected disabled>Select Product</option>' +
        '</select>' +
        '</td>' +
        '<td>' +
        '{{-- Free Products --}}' +
        '<select name="free_product_id[]" id="free_product_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 free_product_id" required style="width: 100%">' +
        '<option selected disabled>Select Product</option>' +
        '</select>' +
        '</td>' +
        '</tr>' +
        '{{-- Product varients --}}' +
        '<tr id="varient_tr'+j+'">' +
        '<td>' +
        '{{-- Buy Products Varients --}}' +
        '<select name="buy_varient_id[]" id="buy_varient_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 buy_varient_id" required style="width: 100%">' +
        '<option selected disabled>Select Varients</option>' +
        '</select>' +
        '</td>' +
        '<td>' +
        '{{-- Buy Products Varients  --}}' +
        '<select name="free_varient_id[]" id="free_varient_id' + j + '" data-i="' + j + '"' +
        'class="form-control select2 free_varient_id" required style="width: 100%">' +
        '<option selected disabled>Select Varients</option>' +
        '</select>' +
        '</td>' +
        '</tr>');
      $('.select2').select2({
        theme: 'bootstrap4'
      });
      j++;
    });
  });
  $(document).on('change', '.buy_category_id', function () {
    var category_id = $(this).val();
    var i = $(this).data('i');
    console.log(i);
    buy_product_dropdown(category_id, i);
  });
  $(document).on('change', '.buy_product_id', function () {
    var product_id = $(this).val();
    var i = $(this).data('i');
    console.log(i);
    buy_varient_dropdown(product_id, i);
  });
  $(document).on('change', '.free_category_id', function () {
    var category_id = $(this).val();
    var i = $(this).data('i');
    console.log(i);
    free_product_dropdown(category_id, i);
  });
  $(document).on('change', '.free_product_id', function () {
    var category_id = $(this).val();
    var i = $(this).data('i');
    console.log(i);
    free_varient_dropdown(category_id, i);
  });
  $(document).on('click', '.remove_row', function () {
      $(this).parent().parent().remove();
      var i= $(this).data('i');
      $('#category_tr'+i).remove();
      $('#product_tr'+i).remove();
      $('#varient_tr'+i).remove();
    });
  function buy_product_dropdown(category_id, i) {
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
        $('#buy_product_id' + i).empty();
        $('#buy_product_id' + i).append($('<option>', {
          selected: true,
          disable: true,
          text: "Select Product"
        }));
        $.each(data, function (index, item) {
          $('#buy_product_id' + i).append($('<option>', {
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

  function buy_varient_dropdown(product_id, i) {
    $.ajax({
      type: "POST",
      url: "{{route('restaurant.get_product_varients')}}",
      data: {
        _token: '{{csrf_token()}}',
        product_id: product_id,
      },
      beforeSend: function () {
        loader();
      },
      success: function (data) {
        swal.close();
        $('#buy_varient_id' + i).empty();
        $('#buy_varient_id' + i).append($('<option>', {
          selected: true,
          disable: true,
          text: "Select Varient"
        }));
        $.each(data, function (index, item) {
          $('#buy_varient_id' + i).append($('<option>', {
            value: item.variant_id,
            text: item.quantity + " " + item.unit
          }));
        });
      },
      complete: function () {
        swal.close();
      }
    });
  }

  function free_product_dropdown(category_id, i) {
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
        $('#free_product_id' + i).empty();
        $('#free_product_id' + i).append($('<option>', {
          selected: true,
          disable: true,
          text: "Select Product"
        }));
        $.each(data, function (index, item) {
          $('#free_product_id' + i).append($('<option>', {
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

  function free_varient_dropdown(product_id, i) {
    $.ajax({
      type: "POST",
      url: "{{route('restaurant.get_product_varients')}}",
      data: {
        _token: '{{csrf_token()}}',
        product_id: product_id,
      },
      beforeSend: function () {
        loader();
      },
      success: function (data) {
        swal.close();
        $('#free_varient_id' + i).empty();
        $('#free_varient_id' + i).append($('<option>', {
          selected: true,
          disable: true,
          text: "Select Varient"
        }));
        $.each(data, function (index, item) {
          $('#free_varient_id' + i).append($('<option>', {
            value: item.variant_id,
            text: item.quantity + " " + item.unit
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