<?php namespace Common\Auth\Controllers;

use App\User;
use Common\Auth\Requests\ModifyUsers;
use Common\Auth\UserRepository;
use Common\Core\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * @var User
     */
    private $model;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * UsersController constructor.
     *
     * @param User $user
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(User $user, UserRepository $userRepository, Request $request)
    {
        $this->model = $user;
        $this->request = $request;
        $this->userRepository = $userRepository;

        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Return a collection of all registered users.
     *
     * @return LengthAwarePaginator
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', User::class);

        return $this->userRepository->paginateUsers($this->request->all());
    }

    /**
     * Return user matching given id.
     *
     * @param integer $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show($id)
    {
        $with = array_filter(explode(',', $this->request->get('with', '')));

        $user = $this->model->with(array_merge(['roles', 'social_profiles'], $with))->findOrFail($id);

        $this->authorize('show', $user);

        return $this->success(['user' => $user]);
    }

    /**
     * Create a new user.
     *
     * @param ModifyUsers $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ModifyUsers $request)
    {
        $this->authorize('store', User::class);

        $user = $this->userRepository->create($this->request->all());

        return $this->success(['user' => $user], 201);
    }

    /**
     * Update an existing user.
     *
     * @param integer $id
     * @param ModifyUsers $request
     *
     * @return JsonResponse | User
     * @throws AuthorizationException
     */
    public function update($id, ModifyUsers $request)
    {
        $user = $this->userRepository->findOrFail($id);

        $this->authorize('update', $user);

        $user = $this->userRepository->update($user, $this->request->all());

        return $this->success(['user' => $user]);
    }

    /**
     * Delete multiple users.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function deleteMultiple()
    {
        $this->authorize('destroy', User::class);

        $this->validate($this->request, [
            'ids' => 'required|array|min:1'
        ]);

        $this->userRepository->deleteMultiple($this->request->get('ids'));

        return $this->success([], 204);
    }
}
