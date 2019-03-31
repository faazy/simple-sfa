<?php namespace Common\Auth\Controllers;

use Common\Auth\UserRepository;
use Common\Core\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserPermissionsController extends Controller
{
    /**
     * UserRepository instance.
     *
     * @var UserRepository
     */
    private $repository;

    /**
     * Laravel request instance.
     *
     * @var Request
     */
    private $request;

    /**
     * @param UserRepository $repository
     * @param Request $request
     */
    public function __construct(UserRepository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    /**
     * Add specified permissions to user.
     *
     * @param int $userId
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function add($userId)
    {
        $user = $this->repository->findOrFail($userId);

        $this->authorize('update', $user);

        $this->validate($this->request, [
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|string'
        ]);

        return $this->success([
            'data' => $this->repository->addPermissions($user, $this->request->get('permissions'))
        ]);
    }

    /**
     * Remove specified permissions from user.
     *
     * @param int $userId
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function remove($userId)
    {
        $user = $this->repository->findOrFail($userId);

        $this->authorize('update', $user);

        $this->validate($this->request, [
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|string'
        ]);

        return $this->success([
            'data' => $this->repository->removePermissions($user, $this->request->get('permissions'))
        ]);
    }
}
