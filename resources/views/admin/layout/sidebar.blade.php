<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-boxes"></i>
            <span>Category</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('categories.index') }}"><i class="fas fa-list-alt"></i>  List Category</a>
            <a class="dropdown-item" href="{{ route('categories.create') }}"><i class="fas fa-folder-plus"></i>  Add Category</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-book"></i>
            <span>Books</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('book.index') }}"><i class="fas fa-list-alt"></i>  List Book</a>
            <a class="dropdown-item" href="{{ route('book.create') }}"><i class="fas fa-folder-plus"></i>  Add Book</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-images"></i>
            <span>Images Of Book</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('image.index') }}"><i class="fas fa-list-alt"></i>  List Image</a>
            <a class="dropdown-item" href="{{ route('image.create') }}"><i class="fas fa-folder-plus"></i>  Add Image</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-astronaut"></i>
            <span>Author</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('author.index') }}"><i class="fas fa-list-alt"></i>  List Author</a>
            <a class="dropdown-item" href="{{ route('author.create') }}"><i class="fas fa-folder-plus"></i>  Add Author</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-tie"></i>
            <span>User</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fas fa-users"></i>  List User</a>
            <a class="dropdown-item" href="{{ route('user.create') }}"><i class="fas fa-user-plus"></i>  Add User</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-user-astronaut"></i>
            <span>Author</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>