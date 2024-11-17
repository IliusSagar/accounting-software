@extends('master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Account Statement</span></h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Logo</h3> -->
              </div>
              <!-- /.card-header -->
              <!-- form start -->


              <form action="{{ route('transactions.filter') }}" method="POST">
                @csrf
                <div class="card-body">
                    @php
                        $accountList = DB::table('accounts')->get();
                    @endphp
            
                    <!-- Account Name Select -->
                    <div class="form-group">
                        <label class="custom-label">Account Name <code>*</code></label>
                        <select name="account_name_id" id="account_name_id" class="form-control">
                            <option value="" selected disabled>Select Account</option>
                            @foreach($accountList as $account)
                                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                            @endforeach
                        </select>
                        <span style="color: red;">
                            @error('account_name_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
            
                    <!-- Transaction Type Select -->
                    <div class="form-group">
                        <label class="custom-label">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" disabled selected>All Transactions</option>
                            <option value="Income">Income</option>
                            <option value="Expense">Expense</option>
                        </select>
                        <span style="color: red;">
                            @error('transaction_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
            
                    <!-- From Date Input -->
                    <div class="form-group">
                        <label class="custom-label">From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ date('Y-m-d', strtotime('-1 day')) }}">
                        <span style="color: red;">
                            @error('from_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
            
                    <!-- To Date Input -->
                    <div class="form-group">
                        <label class="custom-label">To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ date('Y-m-d') }}">
                        <span style="color: red;">
                            @error('to_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            
                <!-- Submit Button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">View</button>
                </div>
            </form>
            


            </div>
            <!-- /.card -->

         
       
          

          </div>

         
          <!--/.col (left) -->
          <!-- right column -->
      
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function getImagePreview(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="120";
  imagediv.appendChild(newimg);
}
</script>

<script>
  document.getElementById("textString").addEventListener("input", function () {
  let theSlug = string_to_slug(this.value);
  document.getElementById("textSlug").value = theSlug;
});

function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ""); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to = "aaaaeeeeiiiioooouuuunc------";
  for (var i = 0, l = from.length; i < l; i++) {
    str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
  }

  str = str
    .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
    .replace(/\s+/g, "-") // collapse whitespace and replace by -
    .replace(/-+/g, "-"); // collapse dashes

  return str;
}

</script>

@endsection