<?php

namespace MixPanel\Foundation;

use Mixpanel;
use MixPanel\Contracts\Trackable;
use MixPanel\Exceptions\MixPanelDisabledException;
use Illuminate\Contracts\Config\Repository as Config;
class MixPanelWebAnalytics implements Trackable
{
	private Mixpanel $mixpanel;
	private Config $config;

	public function __construct(Mixpanel $mixpanel, Config $config)
	{
		$this->config = $config;
		$this->boostraping();
		$this->mixpanel = $mixpanel;
	}

	public function boostraping(): void
	{
		if (! $this->config->get('mixpanel.enabled')) {
			throw new MixPanelDisabledException;
		}
	}

	public function identify($userId): void
	{
		$this->mixpanel->identify($userId);
	}

	public function track(string $eventName, array $content = []): void
	{
		$this->mixpanel->track($eventName, $content);
	}

	public function setPeopleProperties(string $userIdentify, array $properties = []): void
	{
		$this->mixpanel->people->set($userIdentify, $properties);
	}
}
