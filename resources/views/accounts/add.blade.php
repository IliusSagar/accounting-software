@extends('master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Add New Account</span></h1>
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


              <form action="{{route('store.account')}}" method="post">
              @csrf

                <div class="card-body">

                 


                <div class="form-group">
                <label class="custom-label">Account Name <code>*</code></label>
                <input type="text" name="account_name" class="form-control"  >
               
                <span style="color: red;">
                        @error('account_name')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                  <label class="custom-label">Account No <code>*</code></label>
                  <input type="text" name="account_no" class="form-control"  >
                 
                  <span style="color: red;">
                          @error('account_no')
                              {{$message}}
                          @enderror
                      </span>
                  </div>


                  <div class="form-group">
                    <label class="custom-label">Intial Balance <code>*</code></label>
                    <input type="text" name="initial_balance" class="form-control"  >
                   
                    <span style="color: red;">
                            @error('initial_balance')
                                {{$message}}
                            @enderror
                        </span>
                    </div>


                    <div class="form-group">
                      <label class="custom-label">Note <code>(Optional)</code></label>
                      <input type="text" name="note" class="form-control"  >
                     
                      <span style="color: red;">
                              @error('note')
                                  {{$message}}
                              @enderror
                          </span>
                      </div>
                 
                  
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Add Account</button>
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