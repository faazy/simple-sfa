<?php

/**
 * @Author Faazy Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * @Date: 24/05/2017
 * @Time: 4:07 PM
 */

namespace Common\ViewComposers;

use App\ComponentRepository\ComponentRepositoryAgent;
use Common\Core\BootstrapData;
use Illuminate\View\View;

class TemplateComposer
{
    /**
     * @var BootstrapData
     */
    private $bootstrapData;


    /**
     * Template composer Constructor.
     *
     * @param BootstrapData $bootstrapData
     */
    public function __construct(BootstrapData $bootstrapData)
    {
        $this->bootstrapData = $bootstrapData;

    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['bootstrapData' => $this->bootstrapData->get()]);
    }

}
