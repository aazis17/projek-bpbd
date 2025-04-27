<?php

namespace App\Filament\Widgets;

use App\Models\Submission;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ApplicationStatsOverview extends StatsOverviewWidget
{
    protected static ?string $pollingInterval = null;
    
    // Atur lebar widget agar pas di samping chart
    protected int|string|array $columnSpan = 1;
    
    // Mengatur grid stats menjadi 2x2
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $pendingCount = Submission::where('status', 'pending')->count();
        $approvedCount = Submission::where('status', 'approved')->count();
        $rejectedCount = Submission::where('status', 'rejected')->count();
        $totalCount = $pendingCount + $approvedCount + $rejectedCount;

        return [
            Stat::make('TOTAL PENGAJUAN', $totalCount)
                ->description('Total pengajuan yang diproses')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([5, 4, 7, 8, 4, $totalCount]),

            Stat::make('MENUNGGU', $pendingCount)
                ->description('Pengajuan yang menunggu')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->chart([2, 1, 3, 4, 2, $pendingCount]),

            Stat::make('DITERIMA', $approvedCount)
                ->description('Pengajuan yang diterima')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([1, 2, 3, 2, 1, $approvedCount]),

            Stat::make('DITOLAK', $rejectedCount)
                ->description('Pengajuan yang ditolak')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger')
                ->chart([10, 19, 61, 19, 18, $rejectedCount]),
        ];
    }

    // Tambahkan CSS kustom untuk card stats
    protected static function getCardClass(): array
    {
        return [
            'relative',
            'overflow-hidden',
            'p-4',
            'space-y-2',
            'rounded-xl',
            'shadow',
            'dark:bg-gray-800',
        ];
    }
}