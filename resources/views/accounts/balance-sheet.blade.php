@extends('master')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Balance Sheet</span></h1>
          </div>

          <div class="col-sm-6 d-flex justify-content-end">
        
        
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Sl</th>
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Balance</th>
              
                  
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($accountList as $key => $row)
                    @php
                        // Sum the amounts of transactions related to the current account
                        $accountTransactions = $transactionList->where('account_name_id', $row->id);
                        $transactionTotal = $accountTransactions->sum('amount');
                    @endphp
                
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->account_name }}</td>
                        <td>{{ $row->account_no }}</td>
                        <td>৳ {{ $row->initial_balance + $transactionTotal }}</td>
                    </tr>
                @endforeach
                
                </tbody>
                
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-size: 22px; font-weight: bold;">৳ {{ $totalBalance }}</td>
                    </tr>
                </tfoot>
                
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    $(document).on("click","#delete", function(e){
     e.preventDefault();
     var link = $(this).attr("href");
     swal({
       title: "Are you want to delete?",
       text: "Once Delete, This will be Permanently Delete!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if(willDelete){
         window.location.href = link;
       }else{
         swal("Safe Data!");
       }
     });
    });
   </script>



  
@endsection