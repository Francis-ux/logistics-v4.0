<x-layouts.master.master title="{{ $title }}">
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-master.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.admin.update', $admin->uuid) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <x-master.form-input name="name" label="Name" value="{{ $admin->name }}" />
                                <x-master.form-input name="email" label="Email" value="{{ $admin->email }}" />
                                <x-master.form-input name="password" id="new_password" label="Password" type="password" />
                                <div class="col-md-6 mb-3">
                                    <label for="is_active" class="form-label">Is Active</label>
                                    <select name="is_active" id="is_active" class="form-select">
                                        <option value="">Select</option>
                                        <option value="1" @selected($admin->is_active->value == 1)>Yes
                                        </option>
                                        <option value="0" @selected($admin->is_active->value == 0)>No
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <x-master.form-button>Update Admin</x-master.form-button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</x-layouts.master.master>
