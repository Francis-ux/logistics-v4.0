 <div class="table-responsive">
     <table id="myTable" class="table table-bordered">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Email Verified</th>
                 <th>Is Active</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($admins as $index => $admin)
                 <tr>
                     <td>{{ $index + 1 }}</td>
                     <td>{{ $admin->name }}</td>
                     <td>{{ $admin->email }}</td>
                     <td>{{ $admin->email_verified_at ? 'Yes' : 'No' }}</td>
                     <td>
                         <span class="{{ $admin->is_active->badge() }}">{{ $admin->is_active->label() }}</span>
                     </td>
                     <td>
                         <x-master.links href="{{ route('master.admin.edit', $admin->uuid) }}"
                             class="btn btn-primary m-1">Edit</x-master.links>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

 </div>
