<?php

declare(strict_types=1);

namespace App\Presentation\Controller;

use App\Core\Auth;
use App\Domain\Repository\SaleRepositoryInterface;

final class ReportController extends BaseController
{
    public function __construct(private SaleRepositoryInterface $saleRepository)
    {
    }

    public function excel(): void
    {
        Auth::requireAuth();

        $rows = $this->saleRepository->allForExport();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=Data_Warung.xls');

        echo '<table border="1">';
        echo '<thead><tr><th>No</th><th>Tanggal</th><th>Nama</th><th>Jumlah Barang</th><th>Harga Satuan</th><th>Total</th></tr></thead><tbody>';

        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . (int) $row['id'] . '</td>';
            echo '<td>' . htmlspecialchars((string) $row['tanggal']) . '</td>';
            echo '<td>' . htmlspecialchars((string) $row['namabarang']) . '</td>';
            echo '<td>' . (int) $row['JumlahB'] . '</td>';
            echo '<td>' . number_format((int) $row['hargaJ']) . '</td>';
            echo '<td>' . number_format((int) $row['hargaU']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
}
