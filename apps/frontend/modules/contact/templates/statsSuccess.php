<?php echo javascript_include_tag('jquery-1.4.2.min.js') ?>
<?php echo javascript_include_tag('jquery.flot.min.js') ?>
<?php echo javascript_include_tag('jquery.flot.selection.min.js') ?>

<div id="placeholder" style="width:600px;height:300px;"></div> 

<?php echo link_to('Par année', '@contact?action=stats&by=year') ?> - 
<?php echo link_to('Par mois', '@contact?action=stats&by=month') ?> - 
<?php echo link_to('Par semaine', '@contact?action=stats&by=week') ?> - 
<?php echo link_to('Par jour', '@contact?action=stats&by=day') ?> - 


<script id="source" language="javascript" type="text/javascript">  
$(function () {
   var d = [
<?php foreach($contacts as $contact): ?>
  [<?php echo 1000*$contact->getUnixtimestamp() ?>,
    <?php echo $contact->getCount() ?>],
<?php endforeach ?>
    ];

   
    var options =  {
      xaxis: { mode: "time" },
      grid: { hoverable: true, clickable: true },
      series: {
        lines: { show: true },
        points: { show: true }
      },
      selection: { mode: "x" }
    };

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #fdd',
            padding: '2px',
            'background-color': '#fee',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }
    var previousPoint = null;
    $("#placeholder").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
 
        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;
                
                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                
                showTooltip(item.pageX, item.pageY,
                            parseInt(y) + " appels, "+ timestamp2date(parseInt(x)));
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;            
        }
    });

    var placeholder = $("#placeholder");
    var data = [d];

    placeholder.bind("plotselected", function (event, ranges) {
      plot = $.plot(placeholder, data,
        $.extend(true, {}, options, {
          xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to }
        }));
    });

    var plot = $.plot(placeholder, data, options);

    function timestamp2date(timestamp) {
      var myDate = new Date();
      myDate.setTime(timestamp);
      return myDate.toLocaleDateString();
    }
});
</script>
