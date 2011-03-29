<h1>Liste des cotisations</h1>

<h2>Par membre</h2>
<table>
  <thead>
    <tr>
      <th>Membre</th>
      <th>Années</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($cotisations as $cotisation): ?>
    <tr>
      <td><?php echo $cotisation->getMembre() ?></td>
      <td>
        <?php 
          $cotisation_annee = array();
          foreach($cotisation->getMembre()->getCotisations() as $cotisation)
            $cotisation_annee[] = $cotisation->__toString();
          echo implode(',', $cotisation_annee) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>Par année</h2>
<table>
  <thead>
    <tr>
      <th>Année</th>
      <th>Cotisations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($annees as $annee): ?>
    <tr>
      <td><?php echo $annee->getAnnee() ?></td>
      <td>
        <?php echo $annee->getNombreCotisations() ?> cotisation<?php echo ($annee->getNombreCotisations() >= 2) ? 's' : '' ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="placeholder" style="width:600px;height:300px;"></div> 

<script id="source" language="javascript" type="text/javascript">  
$(function () {
   var d = [
<?php foreach ($annees as $annee): ?>
  [<?php echo $annee->getAnnee() ?>,
    <?php echo $annee->getNombreCotisations() ?>],
<?php endforeach ?>
    ];

   
    var options =  {
      xaxis: { minTickSize: 1 },
      yaxis: { minTickSize: 1 },
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
                            parseInt(x) + " : "+ parseInt(y) + " cotisations" );
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

});
</script>


  <a href="<?php echo url_for('cotisation/new') ?>">New</a>
