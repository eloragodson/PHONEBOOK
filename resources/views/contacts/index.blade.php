@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Contacts</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('contacts.create') }}">Nouveau contact</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('contacts.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

    <script>
     $(document).ready( function () {
      $( "#dialog-confirm" ).css("display", "none");
         $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      $('#contact_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('listeContact') }}",
                type: 'GET',
            },
            language: {
                    "url": "{{ asset('vendor/DataTables/dataTables.french.lang') }}"
            },

                aoColumns: [{
          "mData": 'nom'
        }, {

          "mData": 'prenom'
        },{

          "mData": 'numero'
        }, {
          "mData": null,
          "sWidth": "5%",
          "bSortable": false,
          "mRender": function(data, type, full) {
            return '<a class="btn btn-info btn-xs" href="/contacts/'+data.id+'/edit"> <i class="glyphicon glyphicon-edit"></i> </a>';
          }
        }, {
          "mData": null,
          "sWidth": "5%",
          "bSortable": false,
          "mRender": function(data, type, full) {
            return '<a class="btn btn-danger btn-xs"   href="javascript:void(0);"  onclick="suppression(\''+data.id+'\')"><i class="glyphicon glyphicon-trash"></i></a>';
          }
        }]

          });
       });

    </script>
@endsection

