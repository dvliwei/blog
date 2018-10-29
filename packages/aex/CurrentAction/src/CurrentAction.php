<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/6/25
 * Time: 上午11:35
 */
namespace Aex\CurrentAction;
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;
class CurrentAction
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = ''){
        $config_arr = $this->config->get('packagetest.options');
        return $msg.' <strong>from your custom develop package!</strong>>';
    }
}