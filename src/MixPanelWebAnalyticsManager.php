<?php

namespace MixPanel;

use MixPanel;
use Illuminate\Support\Manager;
use MixPanel\Contracts\Trackable;
use MixPanel\Foundation\MixPanelWebAnalytics;
use MixPanel\Exceptions\MixPanelErrorCallbackException;

class MixPanelWebAnalyticsManager extends Manager
{
    public function createBusinessDriver(): Trackable
    {
        return new MixPanelWebAnalytics(
            $this->container->makeWith(MixPanel::class, [
                'token' => $this->config->get('mixpanel.business.token'),
                'options' => ['error_callback' => new MixPanelErrorCallbackException]
            ]),
            $this->config
        );
    }

    public function createWebDriver(): Trackable
    {
        return new MixPanelWebAnalytics(
            $this->container->makeWith(MixPanel::class, [
                'token' => $this->config->get('mixpanel.web.token'),
                'options' => ['error_callback' => new MixPanelErrorCallbackException]
            ]),
            $this->config
        );
    }

    public function createEverestDriver(): Trackable
    {
        return new MixPanelWebAnalytics(
            $this->container->makeWith(MixPanel::class, [
                'token' => $this->config->get('mixpanel.everest.token'),
                'options' => ['error_callback' => new MixPanelErrorCallbackException]
            ]),
            $this->config
        );
    }

    public function createOfficeDriver(): Trackable
    {
        return new MixPanelWebAnalytics(
            $this->container->makeWith(MixPanel::class, [
                'token' => $this->config->get('mixpanel.office.token'),
                'options' => ['error_callback' => new MixPanelErrorCallbackException]
            ]),
            $this->config
        );
    }

    public function getDefaultDriver(): ?string
    {
        return $this->config->get('mixpanel.driver');
    }
}