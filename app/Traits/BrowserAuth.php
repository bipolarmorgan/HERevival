<?php

namespace App\Traits;

trait BrowserAuth {

    /**
     * Create the browser session.
     * @return mixed
     */
    public function createAuth () {
        if ( $this->hasAuth() ) {
            return session()->get('browser_session');
        }

        session()->put([
            'browser_session' => env('DEFAULT_GAME_IP')
        ]);

        return session()->get('browser_session');
    }

    public function getAuth () {
        if ( !$this->hasAuth() ) {
            return $this->createAuth();
        }

        return session()->get('browser_session');
    }

    /**
     * Replace the browser session, used for when logging into another server.
     * @param string $browser
     * @return mixed
     */
    public function replaceAuth ( string $browser ) {
        if ( !$this->hasAuth() ) {
            return $this->createAuth();
        }

        session()->replace([ 'browser_session' => $browser ]);

        return session()->get('browser_session');
    }

    /**
     * Remove the browser session, if you've logged out for instance.
     */
    public function deleteBrowserAuth () {
        session()->forget('browser_session');
    }

    /**
     * Check if the session exists
     * @return bool
     */
    public function hasAuth () {
        return session()->exists('browser_session');
    }
}
