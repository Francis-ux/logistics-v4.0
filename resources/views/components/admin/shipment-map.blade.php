<div class="mapouter">
    <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ ucfirst($shipment->shipmentLocation()->latest()->first()->google_map_location) }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
            href="https://gachanymph.com/">Gacha Nymph</a></div>
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 200px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 200px;
        }

        .gmap_iframe {
            width: 100% !important;
            height: 200px !important;
        }
    </style>
</div>
