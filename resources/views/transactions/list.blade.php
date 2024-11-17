@extends('master')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">List Transactions</span></h1>
          </div>

          <div class="col-sm-6 d-flex justify-content-end">
        
          <a href="{{route('add.transactions')}}" class="btn btn-success"> + Add Transactions</a>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Sl</th>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Payer</th>
                    <th>Method</th>
                    <th >Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($transaction as $key=>$row)
    
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $row->date}}</td>

                  @php 
                     $accountId = $row->account_name_id;
                     $accountName = DB::table('accounts')->where('id',$accountId)->first();
                  @endphp

                    <td>{{ $accountName->account_name}}</td>
            
                    @php 
                  $incomeAmount = DB::table('transactions')
                        ->where('id', $row->id)
                        ->where('type', 'income')
                        ->first();

                    $expenseAmount = DB::table('transactions')
                        ->where('id', $row->id)
                        ->where('type', 'expense')
                        ->first();
                @endphp

                    <td>৳ {{ $incomeAmount ? $incomeAmount->amount : '0' }}</td>
                    <td>৳ {{ $expenseAmount ? $expenseAmount->amount : '0' }}</td>
                    <td>{{ $row->payer}}</td>
                    <td>{{ $row->method}}</td>

                    <td>
                        <a  class="btn btn-success"><i class="fa fa-eye"></i></a>
                        <a  class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('delete.transactions',$row->id)}}" id="delete"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

                @endforeach

             

                 
                  </tbody>
                 
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