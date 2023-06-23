<?php
/**
 * If users @-mention this bot, it will invoke Clippy <https://github.com/Sainan/Clippy> to respond and/or react.
 *
 * @var Plugin $this
 */
use Clippy\
{Command, CommandDelete};
use DiscordBot\
{Event\MessageCreateEvent, Member, Role};
use hotswapp\
{Event, Plugin};
$this->on(function(MessageCreateEvent $event)
{
	if(!@$event->handled && $event->message->mentionsMe() && $event->message->getAuthor() instanceof Member)
	{
		if ($event->message->getGuild()->id != "956618713157763072")
		{
			return;
		}
		//$event->channel->indicateTyping();
		$command = Command::match($event->message->getContent(true));
		switch($command::class)
		{
			case CommandDelete::class:
				if(!$event->message->getAuthor()
								   ->hasPermission(Role::PERMISSION_MANAGE_MESSAGES, $event->message->channel))
				{
					$event->message->reply("Why don't you do it yourself? ;)");
					break;
				}
				if($command->amount < 1 || $command->amount > 99)
				{
					$event->message->reply("I'm sorry, I need a number between 1 and 99. :|");
					break;
				}
				$event->channel->getMessagesBefore($event->message, $command->amount, function($messages) use (&$event)
				{
					array_push($messages, $event->message);
					$event->channel->bulkDeleteMessages($messages);
				});
				break;

			default:
				$event->message->reply($command->getResponse());
		}
	}
}, Event::PRIORITY_LOWEST);
