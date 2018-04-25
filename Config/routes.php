<?php
Router::connect('/admin/twitch', ['controller' => 'Twitch', 'action' => 'index', 'plugin' => 'Twitch', 'admin' => true]);
