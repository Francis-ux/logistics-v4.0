 <x-admin.links href="{{ route('admin.shipment.index') }}" class="btn btn-secondary m-1">Back</x-admin.links>

 <x-admin.links href="{{ route('admin.shipment.edit', $shipment->uuid) }}"
     class="btn btn-primary m-1">Edit</x-admin.links>

 <x-admin.links href="#" class="btn btn-info m-1">Track Shipment</x-admin.links>

 <x-admin.links href="{{ route('admin.shipment.download', $shipment->uuid) }}"
     class="btn btn-success m-1">Download</x-admin.links>

 <x-admin.delete-button action="{{ route('admin.shipment.destroy', $shipment->uuid) }}"
     class="btn btn-danger m-1">Delete</x-admin.delete-button>
