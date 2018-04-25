<?php
class TwitchController extends AppController{

  public function index(){
    $this->loadModel('Twitch.TwitchConfiguration');
    $geturl_player = $this->TwitchConfiguration->find('first')['TwitchConfiguration']['url_player'];

    $this->set(compact('geturl_player'));
  }
    public function admin_index(){

        if($this->isConnected && $this->User->isAdmin()){
            $this->layout = 'admin';
            $tracking = $this->loadModel('Twitch.TwitchConfiguration');
          	$url_player = (isset($tracking['url_player'])) ? $tracking['url_player'] : '';

            if ($this->request->is('post')) {
                $data_url_player = $this->request->data["url_player"];
                if(strlen($data_url_player) < 3 || strlen($data_url_player) > 100){
                    $this->Session->setFlash($this->Lang->get('TWITCH_FORM_LENGTH_ERROR'), 'default.error');
                    return $this->redirect($this->referer());
                }
                if(empty($url_player)){
                    $this->TwitchConfiguration->create();
                    if ($this->TwitchConfiguration->save($this->request->data)) {
                        $this->Session->setFlash($this->Lang->get('TWITCH_FORM_ADD_SUCCESS'), 'default.success');
                        return $this->redirect($this->referer());
                    }
                }else{
                    $this->TwitchConfiguration->read(null, $tracking['id']);
                    $this->TwitchConfiguration->set('url_player', $this->request->data['url_player']);
                    if ($this->TwitchConfiguration->save()){
                        $this->Session->setFlash($this->Lang->get('TWITCH_FORM_EDIT_SUCCESS'), 'default.success');
                        return $this->redirect($this->referer());
                    }
                }
                $this->Session->setFlash($this->Lang->get('TWITCH_FORM_EDIT_ERROR'), 'default.error');
                return $this->redirect($this->referer());
            }


            return $this->set(compact("url_player"));
        }else{
            return $this->redirect('/');

        }

    }
  }
