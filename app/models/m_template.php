<?php

//Template class - handless all templating class (displaying views, alerts, errors, view data)

class Template 
{
    private $data;
    private $alert_types = array('success', 'alert', 'error');

    function __construct() {}
   
    /** Loads specific URL
    * @access public
    * @param string, string
    * @return null
    */
    public function load($url, $title = '')
    {
        if ($title != ''){$this->set_data('page_title', $title);}
        include($url);
    }

    /** Redirects to specified url
    * @access public
    * @param string
    * @return null
    */
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    /** Get / Set data 
    * Saves provided data for use by the view later 
    * @access public
    * @param string, string, bool
    * @return null
    */

    public function set_data($name, $value, $clean = FALSE)
    {
        if ($clean == TRUE)
        {
            $this->data[$name] = htmlentities($value, ENT_QUOTES);
        }
        else
        {
            $this->data[$name] = $value;
        }
    }
    /**
     * Retrieves data based on provided name for access by view
     * @access public
     * @param string, bool
     * @return string
     */
    public function get_data($name, $echo = TRUE)
    {
        if (isset($this->data[$name]))
        {
            if ($echo)
            {
                echo $this->data[$name];
            }
            else
            {
                return $this->data[$name];
            }
        }
        return '';
    }

    /**
     * Get/Set alerts
     */
    /**
     * Sets an alert message stored in the session
     * @access public
     * @param string, string (optional)
     * @return null
     */
    public function set_alert($value, $type='success')
    {
        $_SESSION[$type][] = $value;
    }

    /**
     * Reutrns string, containing multiple list items of alerts
     * @access public
     * @param
     * @return string
     */
    public function get_alerts()
    {
        $data = '';

        foreach($this->alert_types as $alert)
        {
            if(isset($_SESSION[$alert]))
            {
                foreach($_SESSION[$alert] as $value)
                {
                    $data .= '<li class="' . $alert . '">' . $value . '</li>';
                }
                unset($_SESSION[$alert]);
            }
        }
        echo $data;
    }
}