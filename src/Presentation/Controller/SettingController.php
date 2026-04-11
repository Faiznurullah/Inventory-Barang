<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Application\Service\ContextService;
use App\Application\Service\SettingService;
use App\Domain\Repository\ProfileRepositoryInterface;
use App\Core\Auth;
use App\Core\Session;

final class SettingController extends BaseController
{
    public function __construct(
        private ProfileRepositoryInterface $profileRepository,
        private SettingService $settingService,
        private ContextService $contextService
    ) {
    }

    public function form(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $profileSetting = $this->profileRepository->findById($id);
        $ctx = $this->contextService->topbar();

        $this->view('profile/setting', [
            'profileSetting' => $profileSetting,
            'profile' => $ctx['profile'],
            'admin' => $ctx['admin'],
        ]);
    }

    public function update(): void
    {
        Auth::requireAuth();

        $id = (int) ($_GET['id'] ?? 0);
        $name = (string) ($_POST['name'] ?? '');
        $message = $this->settingService->update($id, $name, $_FILES['pict'] ?? []);

        if (str_contains($message, 'Sukses')) {
            Session::flash('success', $message);
        } else {
            Session::flash('error', $message);
        }

        $this->redirect('settings&id=' . $id);
    }
}
