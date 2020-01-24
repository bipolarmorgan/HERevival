<?php

namespace App\Traits;

trait BrowserSessionTrait {

    public $browser_ip = '1.2.3.4';

    /**
     * Create the browser session.
     * @return mixed
     */
    public function createBrowserSession() {
        if ($this->hasBrowserSession()) {
            return session()->get('browser_session');
        }

        session()->put(['browser_session' => [
            'ip_address' => $this->browser_ip,
            'auth'       => false
        ]]);

        return session()->get('browser_session');
    }

    public function getBrowserSession() {
        if (!$this->hasBrowserSession()) {
            return $this->createBrowserSession();
        }

        return session()->get('browser_session');
    }

    /**
     * Replace the browser session, used for when logging into another server.
     * @param array $browser
     * @return mixed
     */
    public function replaceBrowserSession(array $browser) {
        if (!$this->hasBrowserSession()) {
            return $this->createBrowserSession();
        }

        session()->replace(['browser_session' => $browser]);

        return session()->get('browser_session');
    }

    /**
     * Remove the browser session, if you've logged out for instance.
     */
    public function deleteBrowserSession() {
        session()->forget('browser_session');
    }

    /**
     * Check if the session exists
     * @return bool
     */
    public function hasBrowserSession() {
        return session()->exists('browser_session');
    }
}