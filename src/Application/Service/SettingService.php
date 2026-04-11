<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\ProfileRepositoryInterface;

final class SettingService
{
    public function __construct(private ProfileRepositoryInterface $profileRepository)
    {
    }

    public function update(int $id, string $name, array $file): string
    {
        if ($id <= 0 || trim($name) === '') {
            return 'Update Profile Gagal';
        }

        if (!isset($file['name'], $file['size'], $file['tmp_name'])) {
            return 'Hanya Boleh File Type Gambar Saja';
        }

        $fileName = (string) $file['name'];
        $size = (int) $file['size'];
        $tmp = (string) $file['tmp_name'];

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['png', 'jpg', 'jpeg', 'svg'];

        if (!in_array($ext, $allowed, true)) {
            return 'Hanya Boleh File Type Gambar Saja';
        }

        if ($size > 3044070) {
            return 'Ukuran File Terlalu Besar';
        }

        $newName = uniqid('profile_', true) . '.' . $ext;
        $targetDir = __DIR__ . '/../../../Admin/penampung/';

        if (!is_dir($targetDir)) {
            return 'Update Profile Gagal';
        }

        $moved = move_uploaded_file($tmp, $targetDir . $newName);
        if (!$moved) {
            return 'Update Profile Gagal';
        }

        $ok = $this->profileRepository->update($id, trim($name), $newName);
        return $ok ? 'Update Profile Sukses' : 'Update Profile Gagal';
    }
}
