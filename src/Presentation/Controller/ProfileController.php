<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Domain\Repository\ProfileRepositoryInterface;
use App\Core\Auth;

final class ProfileController extends BaseController
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
        private ContextService $contextService
    ) {
    }

    public function index(): void
    {
        Auth::requireAuth();

        $profile = $this->profileRepository->first();
        $ctx = $this->contextService->topbar();

        $this->view('profile/index', [
            'profileView' => $profile,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }
}
