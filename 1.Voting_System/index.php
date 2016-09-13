<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../css_3d/css/style.css">
  <title>Systeme voting - Bar de progession.</title>
</head>
<body>
  <script type="text/javascript">
  function getvoting(id,type)
	{
      $.ajax({
  	type : 'POST',
	url : 'voting_sys.php',
	data : {
		id:id,
		type:type
		},
	success : function(data){
			if(data)
			{
				if(type)
				{
					t_up = parseInt(data);
					var t_down = 0;
					var t_percent = (t_up*100)/(t_up+t_down);
					$(".vote_positif").css("width", t_percent + "%");
					$("#rate_pos").html(t_up);
				}
				else
				{
					t_down = parseInt(data);
					var t_up = 1;
					var t_percent = (t_up * 100) / (t_up + t_down);
					$(".vote_positif").css("width", t_percent + "%");
					$("#rate_neg").html(t_down);
				}
				$(".pourcentage").html('Merci !');
				/*$(".pourcentage").css("padding-top", "4px");*/
				$(".pourcentage").css("font-size", "1.4em");
			}
			else
			{

				$(".pourcentage").html('Déjà votez !');
				$(".vote_text").html('REVENEZ DANS 24 HEURS !');
				/*$(".pourcentage").css("padding-top", "4px");*/
				$(".pourcentage").css("font-size", "1.4em");
			}
	}
      });
    }

  </script>
  <div id="container">
    <div class="box_plus"><a id="rate_plus" href="#" onclick="getvoting(253678965,1); return false;"><span><img src="img/plus.png" height="60%" alt="" /></span><span>1</span></a></div>
    <div class="box_bar">
      <div id="progress" class="vote_positif"></div>
    </div>
    <div class="box_moins"><a href="#" id="rate_moins" onclick="getvoting(253678965,0); return false;"></a></div>
  </div>

</body>
</html>
