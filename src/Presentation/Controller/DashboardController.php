<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Application\Service\DashboardService;
use App\Core\Auth;

final class DashboardController extends BaseController
{
    public function __construct(
        private DashboardService $dashboardService,
        private ContextService $contextService
    ) {
    }

    public function index(): void
    {
        Auth::requireAuth();

        $summary = $this->dashboardService->summary();
        $ctx = $this->contextService->topbar();

        $this->view('dashboard/index', [
            'summary' => $summary,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }
}
