<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Punjabi App</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin_dashboard')}}">
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>


					<li class="sidebar-item {{ request()->routeIs('users.*') ? 'active':'' }}">
						<a class="sidebar-link" href="{{route('users.index')}}">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">users</span>
						</a>
					</li>

					<li class="sidebar-item {{ request()->routeIs('categories.*') ? 'active':'' }}">
						<a class="sidebar-link" href="{{route('categories.index')}}">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">categories</span>
						</a>
					</li>

					<li class="sidebar-item {{ request()->routeIs('subcategories.*') ? 'active':'' }}">
						<a class="sidebar-link" href="{{route('subcategories.index')}}">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">subcategories</span>
						</a>
					</li>

					<li class="sidebar-item {{ request()->routeIs('topics.*') ? 'active':'' }}">
						<a class="sidebar-link" href="{{route('topics.index')}}">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">topics</span>
						</a>
					</li>
					

				</ul>

				
			</div>
		</nav>