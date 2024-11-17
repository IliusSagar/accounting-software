<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  


<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
   

    <!-- SidebarSearch Form -->
    
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="{{ URL('/dashboard')}}" class="nav-link">
            <i class="fa fa-dashboard"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

     

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-bank"></i>
            <p>
            Accounts
              <i class="fas fa-angle-left right"></i>
           
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('add.account')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Account</p>
              </a>
              <a href="{{ route('list.account')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Account</p>
              </a>
              <a href="{{ route('balance.sheet')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Balance Sheet</p>
              </a>
              <a href="{{ route('account.statement')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Accounts Statement</p>
              </a>
            </li>  
          </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-exchange"></i>
              <p>
              Transactions
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('add.transactions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Transactions</p>
                </a>
                <a href="{{ route('list.transactions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Transactions</p>
                </a>
                <a href="{{ route('income.transactions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income</p>
                </a>
                <a href="{{ route('expense.transactions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense</p>
                </a>
              </li>  
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
              Role Permission
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Role</p>
                </a>
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Role</p>
                </a>
               
              </li>  
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
              Settings
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Details</p>
                </a>
                
               
              </li>  
            </ul>
          </li>

      

   

        <li class="nav-item">
          <a href="{{ route('user.logout')}}" class="nav-link">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <p>
              Logout
          
            </p>
          </a>
        </li>
       
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>