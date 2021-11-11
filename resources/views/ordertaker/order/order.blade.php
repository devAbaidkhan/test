@extends('ordertaker.layout.app')
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endpush

@section ('content')

<div class="row">
  <!-- DataTales Example -->
  <div class="card shadow" style="width:100%">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Today orders</h6>
      @if (count($errors) > 0)
      @if($errors->any())
      <div class="alert alert-primary" role="alert">
        {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      @endif
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dt" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Cart Sr #</th>
              <th>Total Product Amount</th>
              <th>Delivery Charges</th>
              <th>Net Amount</th>
              <th>Order Status</th>
              <th>Order Type</th>
              <th>Created At</th>
              <th></th>
            </tr>
          </thead>


        </table>
      </div>
    </div>
  </div>

</div>

</div>
<!-- /.container-fluid -->
<!--/////////details model//////////-->
</div>
<!-- End of Main Content -->
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
  // 3 minutes
     setInterval(function() {
                  window.location.reload();
                }, 180000); 
    $("#dt").DataTable({
      "responsive": true,
      "autoWidth": false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "{{ route('ordertaker.today_order_restaurant_list') }}",
        "dataType": "json",
        "type": "POST",
        "data": {
          _token: "{{csrf_token()}}"
        }
      },
      "columns": [{
          "data": "id"
        },
        {
          "data": "cart_no"
        },
        {
          "data": "total_product_price"
        },
        {
          "data": "delivery_charges"
        },
        {
          "data": "net_amount"
        },
        {
          "data": "order_status"
        },
        {
          "data": "order_type"
        },
        {
          "data": "created_at"
        },
        {
          "data": "options",
          orderable: false,
          searchable: false
        }
      ],
      "order": [0, "desc"],
      "bDestroy": true,
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       
            if ( aData.order_type == "deliver" )
            {
            $(nRow).find('td:eq(6)').css('background-color', '#ff6600!important');
            $(nRow).find('td:eq(6)').css('color', 'white');
            }
            else if ( aData.order_type == "pickup" )
            {
            $(nRow).find('td:eq(6)').css('background-color', '#4b2769');
            $(nRow).find('td:eq(6)').css('color', 'white');
            }
        }
    });

  });
  document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
  }

  function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
      var $printSection = document.createElement("div");
      $printSection.id = "printSection";
      document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
  }
</script>
@endpush