@extends('admin.include.app')
@section('main-content')

<p class="mt-4 mb-4 small text-muted">
    A role provides access to predefined menus and features. Depending on the assigned role, an administrator can access only what the user needs.
</p>

<div class="row g-3">
    <!-- Add New Role Card -->
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card h-100 shadow-sm">
            <div class="row g-0 h-100 align-items-center">
                <div class="col-sm-5 text-center">
                    <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" class="img-fluid p-3" width="100" alt="Illustration">
                </div>
                <div class="col-sm-7 text-sm-end text-center p-3">
                    @php $roleCreateUrl = route('roles-permissions.create'); @endphp
                    <button onclick="location.href='{{ $roleCreateUrl }}'" class="btn btn-sm btn-primary mb-2">Add New Role</button>
                    <p class="small mb-0 text-muted">Create a new role if it doesn't exist.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Roles Loop -->
    @if(!empty($roles))
        @foreach($roles as $role)

      
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100 shadow-sm border-light">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h5 class="mb-0">{{ $role->users->count() }}</h5>
                            </div>
                            <div class="avatar-group">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" class="rounded-circle avatar-sm" alt="Avatar" data-bs-toggle="tooltip" title="User Sample">
                            </div>
                        </div>

                        <div class="mt-auto">
                            <h5 class="fw-semibold text-capitalize">{{ $role->name }}</h5>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="{{ route('roles-permissions.edit', $role->id) }}" class="text-decoration-none small">
                                    {{ strtolower($role->name) == 'administrator' ? 'View Role' : 'Edit Role' }}
                                </a>
                                @if(strtolower($role->name) != 'administrator')
                                    <a href="{{ route('roles-permissions.delete', $role->id) }}" class="text-danger small"><i class="la la-trash"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection

@section('offcanvas')
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
    <div class="sidebar-headerset d-flex justify-content-between align-items-center p-3 border-bottom">
        <div>
            <h5 class="mb-1">Customizer</h5>
            <small class="text-muted">Customize your overview page layout</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="settings-mains">
            <h6 class="mb-3">Choose your layout</h6>
            <div class="row g-3">
                <div class="col-6">
                    <div class="form-check card-radio p-0">
                        <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                        <label class="form-check-label w-100" for="customizer-layout01">
                            <img src="{{ asset('assets/img/vertical.png') }}" alt="Vertical Layout" class="img-fluid rounded">
                        </label>
                        <p class="text-center mt-2 small">Vertical</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check card-radio p-0">
                        <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                        <label class="form-check-label w-100" for="customizer-layout02">
                            <img src="{{ asset('assets/img/horizontal.png') }}" alt="Horizontal Layout" class="img-fluid rounded">
                        </label>
                        <p class="text-center mt-2 small">Horizontal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
