
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
					var t_down = <?php echo $verif_video['vt_neg']; ?>;
					var t_percent = (t_up*100)/(t_up+t_down);
					$(".vote_positif").css("width", t_percent + "%");
					$("#rate_pos").html(t_up);
				}
				else
				{
					t_down = parseInt(data);
					var t_up = <?php echo $verif_video['vt_pos']; ?>;
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
