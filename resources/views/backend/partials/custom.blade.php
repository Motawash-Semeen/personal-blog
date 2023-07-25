<script src="{{ asset('backend') }}/vendors/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('backend') }}/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ asset('backend') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/main.js"></script>

<script src="{{ asset('backend') }}/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/dashboard.js"></script>
<script src="{{ asset('backend') }}/assets/js/widgets.js"></script>
<script src="{{ asset('backend') }}/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="{{ asset('backend') }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="{{ asset('backend') }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="https://cdn.tiny.cloud/1/mziw4xlz9cx95qsc2sjafghfgiq725du8dp4rmowat0s3ogf/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
