<?php

class TwitchConfiguration extends AppModel {
  public $useTable = 'twitch__twitch';

  public function getConfig() {
    $config = $this->find('first');
    if(empty($config)) {
      return true;
    }
  }
}
