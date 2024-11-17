@extends('master')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Filtered Account Statement : {{ ucfirst($transactions->first()->type ?? '') }}</span></h1>
           
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
                @if($transactions->isEmpty())
                <p style="color: red;">No transactions found for the selected criteria.</p>
            @else
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>#</th>
                    <th>Account Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($transactions as $key => $transaction)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        @php 
                     $accountId = $transaction->account_name_id;
                     $accountName = DB::table('accounts')->where('id',$accountId)->first();
                  @endphp

                        <td>{{ $accountName->account_name}}</td>

                        <td>{{ ucfirst($transaction->type) }}</td>
                        <td>৳ {{ $transaction->amount }}</td>
                        <td>{{ $transaction->date }}</td>
                    </tr>
                @endforeach

             

                 
                  </tbody>
                 
                </table>

                @endif
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





  
@endsection