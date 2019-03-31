<?php namespace Common\Core;

use Common\Settings\Settings;
use Illuminate\Http\Request;

class BootstrapData
{
    /**
     * @var Settings
     */
    private $settings;

    /**
     * @var Request
     */
    private $request;


    /**
     * BootstrapData constructor.
     *
     * @param Settings $settings
     * @param Request $request
     */
    public function __construct(
        Settings $settings,
        Request $request
    )
    {
        $this->request = $request;
        $this->settings = $settings;
    }

    /**
     * Get data needed to bootstrap the application.
     *
     * @return string
     */
    public function get()
    {
        $bootstrap = [];
        $bootstrap['settings'] = $this->settings->all();
        $bootstrap['url'] = url('') . '/';
        $bootstrap['base_url'] = url('') . '/';;
        $bootstrap['assets'] = asset('');
        $bootstrap['dateFormats'] = ['js_sdate' => 'mm-dd-yyyy', 'php_sdate' => 'm-d-Y', 'mysq_sdate' => '%m-%d-%Y',
            'js_ldate' => 'mm-dd-yyyy hh:ii:ss', 'php_ldate' => 'm-d-Y H:i:s', 'mysql_ldate' => '%m-%d-%Y %T'
        ];
        $bootstrap['csrf_token'] = csrf_token();

        $bootstrap['user'] = $this->getCurrentUser();

        if ($bootstrap['user']) {
            $bootstrap['user'] = $bootstrap['user']->toArray();
        }

        return json_encode($bootstrap);
    }

    /**
     * Load current user and his roles.
     */
    private function getCurrentUser()
    {
        $user = $this->request->user();

        return $user;
    }


}
