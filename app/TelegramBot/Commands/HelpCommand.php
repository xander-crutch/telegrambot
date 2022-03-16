<?php

namespace App\TelegramBot\Commands;

use App\TelegramBot\Traits\AccessTrait;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class HelpCommand extends Command
{
	use AccessTrait;

	/**
	 * @var string Command Name
	 */
	protected $name = 'help';

	/**
	 * @var array Command Aliases
	 */
	protected $aliases = ['listcommands'];

	/**
	 * @var string Command Description
	 */
	protected $description = 'Help command, Get a list of commands';

	/**
	 * {@inheritdoc}
	 */
	public function handle()
	{
		$commands = $this->telegram->getCommands();
		$group = json_decode($this->getUpdate(), true);

		$text = '';
		foreach ($commands as $name => $handler) {
			/* @var Command $handler */
			if ($name == 'bufera') {
				if ($this->accessCommand($group['message']['chat']['id'], $group['message']['from']['id']) !== true) continue;
			}
			$text .= sprintf('/%s - %s' . PHP_EOL, $name, $handler->getDescription());
		}

		$this->replyWithMessage(compact('text'));
	}
}
