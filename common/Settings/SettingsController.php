<?php namespace Common\Settings;

use Artisan;
use Common\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SettingsController extends Controller
{

    /**
     * Settings service instance.
     *
     * @var Settings;
     */
    private $settings;

    /**
     * Laravel Request instance.
     *
     * @var Request;
     */
    private $request;


    /**
     * SettingsController constructor.
     *
     * @param Request $request
     * @param Settings $settings
     */
    public function __construct(Request $request, Settings $settings)
    {
        $this->request = $request;
        $this->settings = $settings;

    }

    /**
     * Get all application settings.
     *
     * @return array
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Setting::class);

        $settings = $this->settings->all();

        return view('settings.index', compact('settings'));
    }

    /**
     * Persist given settings.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function persist()
    {
//        $this->authorize('update', Setting::class);

        $data = $this->settings->decodeSettingsString($this->request->get('settings'));

        if (Arr::get($data, 'server')) $this->dotEnv->write($data['server']);
        if (Arr::get($data, 'client')) $this->settings->save($data['client']);

        Artisan::call('cache:clear');
        Artisan::call('session:clear');
        return $this->success();
    }
}
