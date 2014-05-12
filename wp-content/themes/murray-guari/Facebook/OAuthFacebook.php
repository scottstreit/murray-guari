<?php

/* ------------------------------------------------
  eOS Engine v0.1.000

  Copyright (c) aClickAway, LLC. 2011

  OAuthFacebook - Facebook Open Authorization class

  Last updated 2011-08-01 by Alexander Kaltchev
  ------------------------------------------------ */


require_once dirname(__FILE__) . '/Facebook.php';

class OAuthFacebook extends Facebook
{
    private $uid = NULL;
    private $uinfo = NULL;
    private $ufriends = NULL;
    private $permissions = array('email' => TRUE, 'publish_stream' => TRUE);


    function __construct()
    {
        global $Settings;
        parent::__construct(array(
           // 'appId' => $Settings->OAuthFB['ApplicationID'],
            //'secret' => $Settings->OAuthFB['ApplicationSecret'],
            'appId' => '171880966213653',
            'secret' => '64f1814bdd3e22452c10f5187c757a0a',
            'cookie' => true
        ));
    }


    function GetUserID()
    {
        if ($this->uid == NULL)
        {
            try
            {
                $this->uid = $this->getUser();
            }
            catch (Exception $e)
            {

            }
        }

        if ($this->uid > 0)
        {
            return $this->uid;
        }
        else
        {
            return NULL;
        }
    }


    public function GetUserInfo()
    {
        if ($this->uinfo == NULL)
        {
            try
            {
                $this->uinfo = $this->api('/me');
            }
            catch (Exception $e)
            {

            }
        }

        if (is_array($this->uinfo))
        {
            return $this->uinfo;
        }
        else
        {
            //Error retrieveing user info
            return NULL;
        }
    }


    public function GetFriends()
    {
        if ($this->ufriends == NULL)
        {
            try
            {
                $this->ufriends = $this->api('/me/friends');
            }
            catch (Exception $e)
            {

            }
        }

        if (is_array($this->ufriends) and (array_key_exists('data', $this->ufriends)))
        {
            return $this->ufriends['data'];
        }
        else
        {
            //Error retrieveing user friends
            return NULL;
        }
    }


    public function Authenticate()
    {
        if ($this->GetUserID() > 0) // active session?
        {
            return $this->GetUserID();
        }
        else // there is no active session
        {
            $login_url = $this->getLoginLink();
            Redirect($login_url);
        }
    }


    public function getLoginLink()
    {
        $permissions = '';
        foreach ($this->permissions as $key => $value)
        {
            if ($value)
            {
                AddToList($permissions, $key);
            }
        }
        $params = array('scope' => $permissions);
        return $this->getLoginUrl($params);
    }


    public function SaveUserData($UID, $UserInfo)
    {
        $Data = array();
        $Data['UserID'] = $UID;

        // Store First Name if available
        if (!empty($UserInfo['first_name']))
        {
            $Data['Firstname'] = $UserInfo['first_name'];
        }

        // Store Last Name if available
        if (!empty($UserInfo['last_name']))
        {
            $Data['Lastname'] = $UserInfo['last_name'];
        }

        // Store Gender if available
        if (!empty($UserInfo['gender']))
        {
            $Data['Gender'] = ucfirst($UserInfo['gender']);
        }

        // Store Email if available
        if (!empty($UserInfo['email']))
        {
            $Data['PersonalEmail'] = $UserInfo['email'];
        }

        return DB_Build('Insert', $Data, 'eOS-UsersAdditional');
    }


    public function UpdateUserRelations($FBUID, $UserFriends)
    {
        $Data = array();
        $Data['UID'] = $FBUID;
        $Data['Provider'] = 'facebook';
        DB_Build('Delete', $Data, 'eOS-UserRelations', array('UID', 'Provider'));

        $Data['RType'] = 'Friend';

        foreach ($UserFriends as $Friend)
        {
            $Data['RID'] = $Friend['id'];
            $Data['RName'] = $Friend['name'];
            DB_Build('Insert', $Data, 'eOS-UserRelations');
        }
    }


    public function CheckPermissions($FBUID)
    {
        $permissions = array();
        foreach ($this->permissions as $key => $value)
        {
            if ($value)
            {
                $permissions[$key] = $this->CheckPermission($FBUID, $key);
            }
        }
        return $permissions;
    }


    public function CheckPermission($FBUID, $permission)
    {
        $Data = array();
        $Data['uid'] = $FBUID;
        $Data['method'] = 'users.hasAppPermission';
        $Data['ext_perm'] = $permission;
        return 0 != $this->api($Data);
    }


    public function PostToWall($FBUID, $Msg)
    {
        $result = FALSE;
        if ($this->CheckPermission($FBUID, 'publish_stream'))
        {
            $this->api('/' . $FBUID . '/feed', 'post', $Msg);
            $result = TRUE;
        }
        return $result;
    }


    public function GetFeed($ID)
    {
        try
        {
            $feed = $this->api("/$ID/feed");
        }
        catch (Exception $e)
        {

        }

        if (is_array($feed))
        {
            return $feed;
        }
        else
        {
            //Error retrieveing feed
            return NULL;
        }
    }


}

?>
