 <div class="table-responsive">
     <table id="myTable" class="table table-bordered">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Tracking Code</th>
                 <th>Type</th>
                 <th>Description</th>
                 <th>Amount</th>
                 <th>Departure Date</th>
                 <th>Arrival Date</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($shipments as $index => $shipment)
                 <tr>
                     <td>{{ $index + 1 }}</td>
                     <td>
                         <a href="{{ route('admin.shipment.show', $shipment->uuid) }}">{{ $shipment->tracking_code }}</a>
                         <br />
                         <small>Click to view details</small>
                     </td>
                     <td>
                         {{ ucfirst($shipment->type) }}
                     </td>
                     <td>{{ $shipment->description }}</td>
                     <td>{{ currency($shipment->currency) }}{{ formatAmount($shipment->amount) }}</td>
                     <td>{{ formatDate($shipment->departure_date) }}</td>
                     <td>{{ formatDate($shipment->arrival_date) }}</td>
                     <td>
                         <span class="{{ $shipment->status->badge() }}">{{ $shipment->status->label() }}</span>
                     </td>
                     <td>
                         <x-admin.links href="{{ route('admin.shipment.edit', $shipment->uuid) }}"
                             class="btn btn-primary m-1">Edit</x-admin.links>

                         <x-admin.method-buttons action="{{ route('admin.shipment.destroy', $shipment->uuid) }}"
                             class="btn btn-danger m-1">Delete</x-admin.method-buttons>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

 </div>
