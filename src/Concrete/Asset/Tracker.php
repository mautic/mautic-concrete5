<?php
namespace Concrete\Package\Mautic\Asset;

use Concrete\Core\Asset\Asset;

/**
 * Class Tracker
 */
class Tracker extends Asset
{
    /**
     * @var
     */
    private $url;
    /**
     * @var array
     */
    private $parameters = [];
    /**
     * @var string
     */
    private $onload = '';
    /**
     * @var string
     */
    private $onerror = '';

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function setParam($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getParam($key)
    {
        if ($this->hasParam($key)) {
            return $this->parameters[$key];
        }
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function hasParam($key)
    {
        return (isset($this->parameters[$key]) && $this->parameters[$key] != '');
    }

    /**
     * @return string
     */
    public function getOnLoadFunction()
    {
        return $this->onload;
    }

    /**
     * @param string $function
     */
    public function setOnLoadFunction($function)
    {
        $this->onload = $function;
    }

    /**
     * @return string
     */
    public function getOnErrorFunction()
    {
        return $this->onerror;
    }

    /**
     * @param string $function
     */
    public function setOnErrorFunction($function)
    {
        $this->onerror = $function;
    }

    /**
     * @return string
     */
    public function getAssetDefaultPosition()
    {
        return Asset::ASSET_POSITION_FOOTER;
    }

    /**
     * @return string
     */
    public function getAssetType()
    {
        return 'mautic-tracker';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->url) {
            $params = json_encode($this->parameters);
            $events = '{';
            if ($this->onload) {
                $events .= sprintf('onload: function() {%s}', $this->onload);
                if ($this->onerror) {
                    $events .= ',';
                }
            }
            if ($this->onerror) {
                $events .= sprintf('onerror: function() {%s}', $this->onerror);
            }
            $events .= '}';
            $js = <<<JS
<script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','{$this->url}/mtc.js','mt');
    mt('send', 'pageview', $params, $events);
</script>
JS;
            return $js;
        }

        return '';
    }
}