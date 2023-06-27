<?php
/**
 * @var Plugin $this
 */
use DiscordBot\
{Event\MessageCreateEvent, Member};
use hotswapp\Plugin;
$this->on(function(MessageCreateEvent $event)
{
	if ($event->message->getAuthor() instanceof Member && !$event->message->getAuthor()->isMe())
	{
		if ($event->message->getGuild()->id != "956618713157763072")
		{
			return;
		}

		$cont = strtolower($event->message->getContent());
		$cont = str_replace("hiest", "heist", $cont);
		$cont = str_replace("casion", "casino", $cont);
		$cont = str_replace("cant", "can't", $cont);
		$cont = str_replace("unable to", "can't", $cont);
		$cont = str_replace(" 2 ", " to ", $cont);
		$cont = str_replace(" too ", " to ", $cont);
		$cont = str_replace("amke", "make", $cont);
		$cont = str_replace("limet", "limit", $cont);
		$relevant_answers = [];

		$res_tuners_rep = "Online > Quick Progress > LS Car Meet > Set Reputation Level";
		$res_cayo_limits = "Note that R* has implemented a limit that prevents you from earning more than $2.550.000 per run or more than $4.100.000 per hour from this heist.\n\nLearn more at <https://std.gg/money>";
		$res_h3_unscope = "Online > Quick Progress > Casino Heist > P.O.I. & Access Points > Unscope";
		$res_theme = "There's a step-by-step guide for installing themes located here: <https://support-docs.stand.gg/installing-themes/>";
		$res_keyboardscheme = "Stand > Settings > Input > Keyboard Input Scheme";
		$res_gift = "Learn more at <https://std.gg/gift>";
		$res_gift_veh = "A full upgraded `deathbike2`.\n\n".$res_gift;
		$res_editions = "Learn more at <https://std.gg/editions>";
		$res_money = "<https://std.gg/money>";

		$res_masturbate = "Please DO NOT announce to the server when you are going to masturbate. This has been a reoccurring issue, and I’m not sure why some people have such under developed social skills that they think that a server full of mostly male strangers would need to know that. No one is going to be impressed and give you a high five (especially considering where that hand has been). I don’t want to add this to the rules, since it would be embarrassing for new users to see that we have a problem with this, but it is going to be enforced as a rule from now on.\n\nIf it occurs, you will be warned, then additional occurrences will be dealt with at the discretion of modstaff. Thanks.";
		$res_masturbate_owo = "Pwease DWO NYWOT annywounce two teh serwer when u are gwoing two masturbate. This has been a reoccurring issue, and I’m nywot sure why swomwe peopwal have such under devewoped swociwl skiwws that they think that a serwer fuww of mwostwy male stwangers would nyeed two knywow that. Nywo onye is gwoing two be impwessed and give u a high fwive (especiawwy cwonsidering where that hand has been). I dwon’t want two add this two teh rules, since it would be embarrassing fwor nyew users two see that we have a pwoblem with this, but it is gwoing two be enfworced as a rule fwom nywow on.\n\nIf it occurs, u wiww be warnyed, then additionywl occurrences wiww be dealt with at teh discwetion of mwodstaff. Thanks.";

		$qa_data = [
			"tuner rep" => $res_tuners_rep,
			"ls tuners rep" => $res_tuners_rep,
			"rank in ls car meet" => $res_tuners_rep,
			"can't shoot anyone" => "Online > Protections > Block Blaming",
			"limits on cayo" => $res_cayo_limits,
			"limits for cayo" => $res_cayo_limits,
			"skip casino heist setup" => "Online > Quick Progress > Casino Heist",
			/*"cbt" => "Cock and ball torture\nFrom Wikipedia, the free encyclopedia\n\nCock and ball torture (CBT), occasionally known as penis torture, dick torture, or male genitorture/male genital torture, is a sexual activity involving the application of pain or constriction to the penis or testicles. This may involve directly painful activities, such as genital piercing, wax play, genital spanking, squeezing, ball-busting, genital flogging, urethral play, tickle torture, erotic electrostimulation, kneeing or kicking. The recipient of such activities may receive direct physical pleasure via masochism, or emotional pleasure through erotic humiliation, or knowledge that the play is pleasing to a sadistic dominant. Many of these practices carry significant health risks.",
			"owotorture" => "Cwock and baww tworture\nFwom Wikipedia, teh fwee encycwopedia\n\nCwock and baww tworture (CBT), occasionyawwy knywown as penyis tworture, dick tworture, or male genyitworture/male genyitwl tworture, is a sexuwl activity invowlving teh application of pain or cwonstwiction two teh penyis or testicles. This may invowlve directwy painfwl activities, such as genyitwl piercing, wax play, genyitwl spanking, squeezing, baww-busting, genyitwl fwogging, urethrwl play, tickle tworture, ewotic electwostimulation, knyeeing or kicking. Teh recipient of such activities may receive direct physicwl pweasure via maswochism, or emwotionywl pweasure thwough ewotic humiliation, or knywowaldge that teh play is pweasing two a sadistic dwominyant. Many of these pwactices carry signyifwicant health risks.",*/
			"going to masturbate" => $res_masturbate,
			"gonna masturbate" => $res_masturbate,
			"gonna go masturbate" => $res_masturbate,
			"gowoing to mastuwbate" => $res_masturbate_owo,
			"take a photo of the main entrance" => $res_h3_unscope,
			"add theme in stand" => $res_theme,
			"use stand with arrow keys" => $res_keyboardscheme,
			"change the navigation keys" => $res_keyboardscheme,
			"keybinds for controller" => "Stand > Settings > Input > Controller Input Scheme",
			"spawn cars maxed out" => "Vehicle > Spawner > Tune Spawned Vehicles > Fully",
			"how do i enable protections" => "Protections are enabled by default. Visit https://std.gg/protex for more information.",
			"unlock ls customs colors" => "Online > Quick Progress > Unlocks > Unlock Vehicle Customisations",

			"how do i gift vehicles" => $res_gift,
			"gift vehicles with stand" => $res_gift,

			"best vehicle to sell" => $res_gift_veh,
			"best vehicle to spawn and sell" => $res_gift_veh,
			"best vehicle to spawn to sell" => $res_gift_veh,
			"best car to sell" => $res_gift_veh,
			"best car to spawn and sell" => $res_gift_veh,
			"best car to spawn to sell" => $res_gift_veh,

			"sell limit if i gift cars" => "- Not more than 2 sales per 2 real-world hours.\n- Not more than 7 sales per 30 real-world hours.",

			"difference between basic and regular" => $res_editions,
			"difference between regular and basic" => $res_editions,
			"difference between regular and ultimate" => $res_editions,
			"difference between ultimate and regular" => $res_editions,
			"difference between basic and ultimate" => $res_editions,
			"difference between ultimate and basic" => $res_editions,
			"differences between basic and regular" => $res_editions,
			"differences between regular and basic" => $res_editions,
			"differences between regular and ultimate" => $res_editions,
			"differences between ultimate and regular" => $res_editions,
			"differences between basic and ultimate" => $res_editions,
			"differences between ultimate and basic" => $res_editions,

			"money options" => $res_money,
			/* how (do I use the menu) */ "to get money" => $res_money,
			/* how (do I use the menu) */ "to make money" => $res_money,
			"get money with stand" => $res_money,
			"make money with stand" => $res_money,
			"money method recommendations" => $res_money,
			"recoveries on stand" => $res_money,
			"do recoveries with stand" => $res_money,

			"how do i rank up" => "At rank 120, the last item is unlocked. At rank 200, your health regen speed is maxed out.",
			"what rank unlocks everything" => "At rank 120, the last item is unlocked. At rank 200, your health regen speed is maxed out.",
		];

		foreach($qa_data as $trigger => $response)
		{
			if(strpos($cont, $trigger) !== false)
			{
				$relevant_answers[$trigger] = $response;
			}
		}
		if (strpos($cont, "can't scope out") !== false && strpos($cont, "casino") !== false)
		{
			$relevant_answers["can't scope out casino"] = $res_h3_unscope;
		}
		if (strpos($cont, "how") !== false && strpos($cont, "theme") !== false)
		{
			$relevant_answers["how to install themes"] = $res_theme;
		}
		if (strpos($cont, "public session") !== false && strpos($cont, "with custom dlcs") !== false)
		{
			$relevant_answers["join public sessions with custom dlcs"] = "Game > Custom DLCs > Fix Asset Hashes";
		}
		
		if($relevant_answers)
		{
			$reply = "I have ".count($relevant_answers)." relevant answer".(count($relevant_answers) == 1 ? "" : "s").":\n";
			foreach($relevant_answers as $trigger => $response)
			{
				$reply .= "\n**".$trigger."**\n";
				foreach( explode("\n", $response) as $line)
				{
					$reply .= "> ".$line."\n";
				}
			}
			$event->message->reply($reply);
			$event->handled = true;
		}
	}
});
