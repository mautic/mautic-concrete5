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
            $js = <<<JS
<script>
    (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
        w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
        m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
    })(window,document,'script','{$this->url}/mtc.js','mt');
    mt('send', 'pageview', $params);
</script>
JS;
            return $js;
        }

        return '';
    }
}