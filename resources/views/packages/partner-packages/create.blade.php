@extends('cityadmin.layout.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
  integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush
@section ('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Package Activation</h4>
          @if ( session()->has('msg'))

            <div class="alert alert-success" role="alert">
              {{session()->get('msg')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          @endif
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
          <form class="forms-sample" action="{{url('/franchise-admin/partner/packages')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type">Partners</label>
                      <select required vendors="{{json_encode($vendor)}}" class="form-control select2" id="partner" name="partner">
                        <option selected disabled>-Select One-</option>
                        @foreach($vendor as $vend)
                          <option value="{{$vend[0]->vendor_id}}">{{$vend[0]->vendor_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-md-12 table-responsive">
                        <table class="table" id="dataTable" >
                          <tbody id="vendor_detail">

                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>

                </div>
            </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type">Packages</label>
                      <select required packages="{{json_encode($packages)}}" class="form-control select2" id="package" name="package">
                        <option selected disabled>-Select One-</option>
                        @foreach($packages as $package)
                          <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-md-12 table-responsive">
                        <table class="table" id="dataTable" >
                          <tbody id="packge_detail">

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>

            </div>

            </div>
            <div class="row ">
              <div class="col-md-11">
              </div>
              <div class="col-md-1 text-right submit-div" style="display: none;" >
                <button type="button" class="btn btn-primary pull-right verify">Activate</button>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white" style="">
                    <h4> Do Yo Want to Activate this Package..?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit"><i class="fa fa-"></i> Activate</button>

                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>




  </div>
</div>
</div>


@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
  integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.1/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('.select2').select2();

    $('form').on('submit',function (){

      $('.submit').prop('disabled',true)

    });

    $('.verify').on('click',function (){

      $('#exampleModal').modal('show')

    });

    $('#partner').on('change',function (){

    let vendors =  JSON.parse($(this).attr('vendors'))
      let id = parseInt($(this).val());
    let selected_vendor = vendors[id][0];

    if(id > 0 &&  parseInt($('#package').val()) >0){
      $('.submit-div').show()
    }else {
      $('.submit-div').hide()
    }

      console.log(selected_vendor)

      $('#vendor_detail').empty()
      $('#vendor_detail').append('<tr> <th>Name</th> <td>'+selected_vendor.vendor_name+'</td> </tr>' +
              '<tr> <th>Email</th> <td>'+selected_vendor.vendor_email+'</td> </tr>' +
              '<tr> <th>Phone No.</th> <td>'+selected_vendor.vendor_phone+'</td> </tr>' +
              '<tr> <th>Address</th> <td>'+selected_vendor.physical_address+'</td> </tr>')

    });

    $('#package').on('change',function (){

    let packages =  JSON.parse($(this).attr('packages'))
      let id = parseInt($(this).val());
    let selected_pkg = packages.find( pkg => pkg.id === id )

      if(id > 0 &&  parseInt($('#partner').val()) > 0){
        $('.submit-div').show()
      }else {
        $('.submit-div').hide()
      }

      console.log(selected_pkg)

      $('#packge_detail').empty()
      $('#packge_detail').append('<tr> <th>Name</th> <td>'+selected_pkg.name+'</td> </tr>' +
              '<tr> <th>Type</th> <td>'+selected_pkg.type+'</td> </tr>' +
              '<tr> <th>Order Qty</th> <td>'+selected_pkg.orders_quantity+'</td> </tr>' +
              '<tr> <th>Price / Commission</th> <td>'+(selected_pkg.price ? 'RS. '+selected_pkg.price: 'NA')  +' / '+ (selected_pkg.commission ? selected_pkg.commission+'%' : 'NA')+'</td> </tr>')
    });
  })
</script>
@endpush