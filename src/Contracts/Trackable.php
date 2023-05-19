<?php

namespace MixPanel\Contracts;

interface Trackable
{
	public function identify($userId): void;

	public function track(string $eventName, array $content = []): void;

    public function setPeopleProperties(string $userIdentify, array $properties = []): void;
}