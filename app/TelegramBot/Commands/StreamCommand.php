<?php

namespace App\TelegramBot\Commands;

use App\Models\SettingsBot as SB;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StreamCommand extends Command
{
	/**
	 * @var string Command Name
	 */
	protected $name = "stream";
	protected $params;

	/**
	 * @var string Command Description
	 */
	protected $description = "Game Streams";

	/**
	 * @inheritdoc
	 */
	public function handle()
	{
		$this->params = json_decode($this->getUpdate(), true);
		// This will send a message using `sendMessage` method behind the scenes to
		// the user/chat id who triggered this command.
		// `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
		// handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
		//$this->replyWithMessage(['text' => 'Hello! Welcome to our bot, Here are our available commands:']);

		// This will update the chat status to typing...
		$this->replyWithChatAction(['action' => Actions::TYPING]);
		$this->replyWithMessage(['text' => SB::getSetting('streams_area'), 'parse_mode' => 'html']);
		// This will prepare a list of available commands and send the user.
		// First, Get an array of all registered commands
		// They'll be in 'command-name' => 'Command Handler Class' format.

		// Reply with the commands list


		// Trigger another command dynamically from within this command
		// When you want to chain multiple commands within one or process the request further.
		// The method supports second parameter arguments which you can optionally pass, By default
		// it'll pass the same arguments that are received for this command originally.
		//$this->triggerCommand('subscribe');
	}
}
