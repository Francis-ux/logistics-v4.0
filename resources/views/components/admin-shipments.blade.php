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
                     <td>{{ $shipment->tracking_code }}</td>
                     <td>
                         {{ ucfirst($shipment->type) }}
                     </td>
                     <td>{{ $shipment->description }}</td>
                     <td>{{ currency($shipment->currency) }}{{ formatAmount($shipment->amount) }}</td>
                     <td>{{ formatDate($shipment->departure_date) }}</td>
                     <td>{{ formatDate($shipment->arrival_date) }}</td>
                     <td>
                         <span>
                             <span class="{{ $shipment->status->badge() }}">{{ $shipment->status->label() }}</span>
                         </span>
                     </td>
                     <td>
                         <a href="#" class="btn btn-soft-primary btn-icon btn-sm rounded-circle m-2">
                             <i class="ti ti-eye"></i>
                         </a>

                         <a onclick="return confirm('Download PDF?')" href="#" target="_blank"
                             class="btn btn-soft-primary btn-icon btn-sm rounded-circle m-2">
                             <i class="ti ti-pdf"></i>
                         </a>

                         <a onclick="return confirm('Are you sure?')" href="#"
                             class="btn btn-soft-danger btn-icon btn-sm rounded-circle m-2">
                             <i class="ti ti-trash"></i>
                         </a>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

 </div>
